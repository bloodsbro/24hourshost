<?php

class loginController extends Controller
{
    private $limit = 6;

    public function index($page = 1)
    {
        $this->document->setActiveSection('account');
        $this->document->setActiveItem('login');
        $this->data['recaptcha'] = $this->config->recaptcha;

        if ($this->user->isLogged()) {
            $this->session->data['error'] = "Вы не авторизированы!";
            $this->response->redirect($this->config->url);
        }
        $this->load->library('pagination');
        $this->load->model('news');
        $sort = array(
            //'ticket_status'		=> 'DESC',
            'news_date_add' => 'DESC'
        );

        $options = array(
            'start' => ($page - 1) * $this->limit,
            'limit' => $this->limit
        );

        $total = $this->newsModel->getTotalNews();
        $tickets = $this->newsModel->getNews(array(), array(), $sort, $options);

        $paginationLib = new paginationLibrary();

        $paginationLib->total = $total;
        $paginationLib->page = $page;
        $paginationLib->limit = $this->limit;
        $paginationLib->url = $this->config->url . '/account/login/index/{page}';

        $pagination = $paginationLib->render();

        $this->data['tickets'] = $tickets;
        $this->data['pagination'] = $pagination;
        $this->getChild(array('common/loginheader', 'common/loginfooter'));
        return $this->load->view('account/login', $this->data);
    }

    public function ajax()
    {
        $this->load->model('users');
        if ($this->user->isLogged()) {
            $this->data['status'] = "error";
            $this->data['error'] = "Вы не авторизированы!";
            return json_encode($this->data);
        }

        if ($this->request->server['REQUEST_METHOD'] == 'POST') {
            $errorPOST = $this->validatePOST();
            if (!$errorPOST) {
                $type = @$this->request->post['type'];
                $service = @$this->request->post['service'] ?? "native";
                $user = null;
                $field = "user_password";

                switch ($type) {
                    case "password":
                    {
                        $email = @$this->request->post['email'];
                        $password = @$this->request->post['password'];

                        $user = @$this->usersModel->getUserByEmail($email);
                        break;
                    }
                    case "oauth":
                    {
                        switch ($service) {
                            case "telegram":
                            {
                                $user_id = @$this->request->post['data']['id'];
                                $field = "user_tg";
                                break;
                            }
                            default:
                            {
                                $this->data['status'] = "error";
                                $this->data['error'] = "Сервис oauth авторизации " . $service . " не найден!";
                                return json_encode($this->data);
                            }
                        }

                        $user = $this->usersModel->getUserByOAuthServiceId($field, $user_id);
                        if (!$user) {
                            $this->ajaxReg();

                            $this->data['status'] = "success";
                            $this->data['success'] = "Регистрация аккаунта";
                        }

                        break;
                    }
                    default:
                    {
                        $this->data['status'] = "error";
                        $this->data['error'] = "Хендлер авторизации для типа " . $type . " не найден!";
                        return json_encode($this->data);
                    }
                }

                if ($user and $user['user_activate'] != '1') {
                    $this->data['status'] = "error";
                    $this->data['error'] = "Данный аккаунт не активирован!";
                    return json_encode($this->data);
                }

                if ($user and $user['user_status'] != '1') {
                    $this->data['status'] = "error";
                    $this->data['error'] = "Данный аккаунт заблокирован!";
                    return json_encode($this->data);
                }

                if ($this->user->login($email, ($type === "password" ? md5($password) : $user_id), $field, (int)@$this->request->post['totp'])) {
                    // $userid = $this->usersModel->getIdByEmail($email);
                    $ip = $this->user->getRealIpAdress();
                    $this->usersModel->createAuthLog($this->user->getId(), $ip, '1', "$type($service)");
                    $this->data['status'] = "success";
                    $this->data['success'] = "Вы успешно вошли!";
                } else {
                    // $userid = $this->usersModel->getIdByEmail($email);
                    $ip = $this->user->getRealIpAdress();
                    $this->usersModel->createAuthLog($this->user->getId(), $ip, '0', "$type($service)");

                    $this->data['status'] = "error";
                    $this->data['error'] = "Вы ввели не верный логин или пароль!";
                }
            } else {
                $this->data['status'] = "error";
                $this->data['error'] = $errorPOST;
            }

        } else {
            $this->data['status'] = "error";
            $this->data['error'] = "Не POST запрос";
        }

        return json_encode($this->data);
    }

    public function activate()
    {
        $this->document->setActiveSection('account');
        $this->document->setActiveItem('activate');

        if ($this->user->isLogged()) {
            $this->session->data['error'] = 'Вы уже авторизированы!';
            $this->response->redirect($this->config->url);
        }

        $this->load->model('users');
        $this->data['title'] = $this->config->title;
        $key = @$this->request->get['key'];
        $user = @$this->usersModel->getUserByKey($key);
        if ($key && $user && ($user['user_activate'] == 0)) {
            $this->usersModel->updateUser($user['user_id'], array('user_activate' => 1, 'key_activate' => 0));
            $this->data['user'] = $user;
        }

        $this->getChild(array('common/loginheader', 'common/loginfooter'));
        return $this->load->view('account/activate', $this->data);
    }

    public function complete()
    {
        $this->document->setActiveSection('account');
        $this->document->setActiveItem('activate');

        if ($this->user->isLogged()) {
            $this->session->data['error'] = 'Вы уже авторизированы!';
            $this->response->redirect($this->config->url);
        }

        $this->load->model('users');
        $this->data['title'] = $this->config->title;

        $this->getChild(array('common/loginheader', 'common/loginfooter'));
        return $this->load->view('account/complete', $this->data);
    }

    private function validatePOST()
    {

        $this->load->library('validate');

        $validateLib = new validateLibrary();

        $result = null;

        $type = @$this->request->post['type'];
        $email = @$this->request->post['email'];
        $password = @$this->request->post['password'];
        $recaptcha = @$this->request->post['g-recaptcha-response'];

        switch ($type) {
            case "password":
            {
                if (!$validateLib->email($email)) {
                    $result = "Укажите свой реальный E-Mail!";
                } elseif (!$validateLib->password($password)) {
                    $result = "Пароль должен содержать от 6 до 32 латинских букв, цифр и знаков <i>,.!?_-</i>!";
                }
                if (!$recaptcha) $result = "Подтвердите, что вы не робот!";
                $url = 'https://www.google.com/recaptcha/api/siteverify';
                $data = array('secret' => $this->config->secret_recaptcha, 'response' => $recaptcha);
                $options = array(
                    'http' => array(
                        'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                        'method' => 'POST',
                        'remoteip' => 'remoteip',
                        'content' => http_build_query($data),
                    )
                );

                $context = stream_context_create($options);
                $recaptcha_get = json_decode(file_get_contents($url, false, $context))->{'success'};
                if ($recaptcha_get != '1') $result = "Проверьте правильность капчи!";
                break;
            }
            case "oauth":
            {
                $service = @$this->request->post['service'];
                switch ($service) {
                    case "telegram":
                    {
                        $auth_data = $this->request->post['data'];

                        $check_hash = $auth_data['hash'];
                        unset($auth_data['hash']);
                        $data_check_arr = [];
                        foreach ($auth_data as $key => $value) {
                            $data_check_arr[] = $key . '=' . $value;
                        }
                        sort($data_check_arr);
                        $data_check_string = implode("\n", $data_check_arr);
                        $secret_key = hash('sha256', $this->config->telegram_token, true);
                        $hash = hash_hmac('sha256', $data_check_string, $secret_key);
                        if (strcmp($hash, $check_hash) !== 0) {
                            $result = "Data is NOT from Telegram";
                        }
                        if ((time() - $auth_data['auth_date']) > 86400) {
                            $result = "Data is outdated";
                        }
                        break;
                    }
                    default:
                    {
                        $result = "Сервис oauth авторизации " . $service . " не найден!";
                        break;
                    }
                }
                break;
            }
            default:
            {
                $result = "Хендлер авторизации для типа " . $type . " не найден!";
                break;
            }
        }
        return $result;
    }

    public function ajaxReg()
    {
        if ($this->user->isLogged()) {
            $this->data['status'] = "error";
            $this->data['error'] = "Вы уже авторизированы!";
            return json_encode($this->data);
        }
        $this->load->library('mail');
        $this->load->model('users');
        $this->load->model('waste');

        $type = @$this->request->post['type'];
        if ($type === "password") {
            $errorPOST = $this->validatePOSTReg();
        } else {
            $errorPOST = false;
        }

        if (!$errorPOST) {
            return json_encode($this->_internalReg());
        } else {
            $this->data['status'] = "error";
            $this->data['error'] = $errorPOST;
        }

        return json_encode($this->data);
    }

    private function _internalReg()
    {
        $type = @$this->request->post['type'];
        $ref = @$this->request->post['ref'];

        $lastname = '';
        $firstname = '';
        $email = null;
        $password = null;
        $ref = 0;
        $extra_rows = [];

        switch ($type) {
            case "password":
            {
                $lastname = @$this->request->post['lastname'];
                $firstname = @$this->request->post['firstname'];
                $email = @$this->request->post['email'];
                $password = @$this->request->post['password'];

                break;
            }
            case "oauth":
            {
                $service = @$this->request->post['service'];
                switch ($service) {
                    case "telegram":
                    {
                        $auth_data = $this->request->post['data'];

                        $lastname = $auth_data['last_name'];
                        $firstname = $auth_data['first_name'];

                        $extra_rows = [
                            "user_tg" => $auth_data['id'],
                        ];
                        break;
                    }
                }
                break;
            }
            default: {
                $this->data['status'] = "error";
                $this->data['error'] = "Хендлер авторизации для типа " . $type . " не найден!";

                return $this->data;
            }
        }

        if (@$firstname) {
            $firstname = @strtoupper($firstname[0]) . substr($firstname, 1);
        }

        if (@$lastname) {
            $lastname = @strtoupper($lastname[0]) . substr($lastname, 1);
        }

        if ($this->config->register && $type === "password") {
            $random = md5(uniqid(rand(), true));
            $user_activate = 0;
        } else {
            $random = 0;
            $user_activate = 1;
        }

        $userData = array(
            'user_email' => $email,
            'user_password' => $type === "password" ? md5($password) : null,
            'user_firstname' => $firstname,
            'user_lastname' => $lastname,
            'user_status' => 1,
            'user_balance' => 0,
            'user_access_level' => 1,
            'rmoney' => 0,
            'user_activate' => $user_activate,
            'key_activate' => $random,
            'extra_rows' => $extra_rows
        );
        $userid = $this->usersModel->createUser($userData);
        if ($userid != $ref) {
            if ($ref != 0) {
                $this->usersModel->upUserBalance($ref, 0.25);
                $this->usersModel->upUserRMoney($ref, 0.25);
                $userData = array(
                    'ref' => $ref
                );
                $this->usersModel->updateUser($userid, $userData);

                $wasteData = array(
                    'user_id' => $ref,
                    'waste_ammount' => 0.25,
                    'waste_status' => 0,
                    'waste_usluga' => "Бонус за приглашенного реферала ID-$userid"
                );
                $this->wasteModel->createWaste($wasteData);
            }
        }

        if ($email) {
            if($random > 0) {
                $mailLib = new mailLibrary();

                $mailLib->setFrom($this->config->mail_from);
                $mailLib->setSender($this->config->mail_sender);
                $mailLib->setTo($email);
                $mailLib->setSubject('Регистрация аккаунта');

                $mailData = array();

                $mailData['firstname'] = $firstname;
                $mailData['lastname'] = $lastname;
                $mailData['email'] = $email;
                $mailData['password'] = $password;
                $mailData['key'] = $random;
                $mailData['url'] = $this->config->url;
                $mailData['title'] = $this->config->title;

                $text = $this->load->view('mail/account/register_activate', $mailData);
            } else {
                $text = $this->load->view('mail/account/register', $mailData);
            }

            $mailLib->setText($text);
            $mailLib->send();
        }

        if ($type !== "password") {
            $this->ajax();

            $this->data['status'] = "success";
            $this->data['success'] = "Вы успешно зарегистрировались!";
        } else {
            $this->data['status'] = "success";
            $this->data['success'] = "Вы успешно зарегистрировались!";
            $this->data['user_activate'] = $user_activate;

            return $this->data;
        }
    }

    private function validatePOSTReg()
    {
        $this->load->library('validate');

        $validateLib = new validateLibrary();

        $result = null;

        $lastname = @$this->request->post['lastname'];
        $firstname = @$this->request->post['firstname'];
        $email = @$this->request->post['email'];
        $password = @$this->request->post['password'];
        $password2 = @$this->request->post['password2'];
        $recaptcha = @$this->request->post['g-recaptcha-response'];

        if (@$firstname) {
            $firstname = @strtoupper($firstname[0]) . substr($firstname, 1);
        }

        if (@$lastname) {
            $lastname = @strtoupper($lastname[0]) . substr($lastname, 1);
        }

        if (!$validateLib->check_for_number($lastname)) {
            $result = "Укажите свою реальную фамилию!";
        } elseif (!$validateLib->check_for_number($firstname)) {
            $result = "Укажите свое реальное имя!";
        } elseif (!$validateLib->email($email)) {
            $result = "Укажите свой реальный E-Mail!";
        } elseif (!$validateLib->password($password)) {
            $result = "Пароль должен содержать от 6 до 32 латинских букв, цифр и знаков <i>,.!?_-</i>!";
        } elseif ($password != $password2) {
            $result = "Введенные вами пароли не совпадают!";
        } elseif ($captcha != $captchahash) {
            $result = "Укажите правильный код с картинки! Попробуйте нажать на картинку, чтобы обновить ее.";
        } elseif ($this->usersModel->getTotalUsers(array('user_email' => $email))) {
            $result = "Указанный E-Mail уже зарегистрирован!";
        }

        error_log(json_encode($_GET) . '\n');
        error_log(json_encode($_POST) . '\n');

        if (!$recaptcha) return 'Подтвердите, что вы не робот!';
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = array('secret' => $this->config->secret_recaptcha, 'response' => $recaptcha);
        $options = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'remoteip' => 'remoteip',
                'content' => http_build_query($data),
            )
        );

        $context = stream_context_create($options);
        $recaptcha_get = json_decode(file_get_contents($url, false, $context))->{'success'};
        if ($recaptcha_get != '1') return 'Проверьте правильность капчи!';
        return $result;
    }

    public function ajax_infobox()
    {
        if ($this->request->server['REQUEST_METHOD'] == 'POST') {
            $errorPOST = $this->validatePOSTInfo();
            if (!$errorPOST) {
                if (@$this->request->post['msg'] == "") {
                    $this->data['status'] = "error";
                    $this->data['error'] = "Введите команду!";
                } elseif (@$this->request->post['msg'] != "") {
                    $this->load->model('mail');
                    $firstname = @$this->request->post['firstname'];
                    $lastname = @$this->request->post['lastname'];
                    $email = @$this->request->post['email'];
                    $subject = @$this->request->post['subject'];
                    $msg = @$this->request->post['msg'];
                    $msgData = array(
                        'user_email' => $email,
                        'user_firstname' => $firstname,
                        'user_lastname' => $lastname,
                        'category' => $subject,
                        'text' => $msg,
                        'status' => 1
                    );

                    $msg_id = $this->mailModel->createInbox($msgData);

                    $this->data['status'] = "success";
                    $this->data['success'] = "Ваше письмо отправлено! Номер IN" . $msg_id . "";
                }

            } else {
                $this->data['status'] = "error";
                $this->data['error'] = $errorPOST;
            }
        }

        return json_encode($this->data);
    }

    private function validatePOSTInfo()
    {
        $this->load->library('validate');

        $validateLib = new validateLibrary();

        $result = null;

        $firstname = @$this->request->post['firstname'];
        $lastname = @$this->request->post['lastname'];
        $email = @strtolower($this->request->post['email']);
        $subject = @$this->request->post['subject'];
        $msg = @$this->request->post['msg'];
        $recaptcha = @$this->request->post['g-recaptcha-response'];

        if (@$firstname) {
            $firstname = @strtoupper($firstname[0]) . substr($firstname, 1);
        }

        if (@$lastname) {
            $lastname = @strtoupper($lastname[0]) . substr($lastname, 1);
        }

        if (!$validateLib->check_for_number($lastname)) {
            $result = "Укажите свою реальную фамилию!";
        } elseif (!$validateLib->check_for_number($firstname)) {
            $result = "Укажите свое реальное имя!";
        } elseif (!$validateLib->email($email)) {
            $result = "Укажите свой реальный E-Mail!";
        }

        if (!$recaptcha) return 'Подтвердите, что вы не робот!';
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = array('secret' => $this->config->secret_recaptcha, 'response' => $recaptcha);
        $options = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'remoteip' => 'remoteip',
                'content' => http_build_query($data),
            )
        );

        $context = stream_context_create($options);
        $recaptcha_get = json_decode(file_get_contents($url, false, $context))->{'success'};
        if ($recaptcha_get != '1') return 'Проверьте правильность капчи!';
        return $result;
    }
}

?>
