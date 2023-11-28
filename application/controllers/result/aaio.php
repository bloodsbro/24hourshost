<?php

class aaioController extends Controller {
    public function index() {
        $this->load->model('users');
        $this->load->model('invoices');
        $this->load->model('waste');

        if($this->request->server['REQUEST_METHOD'] == 'POST') {
            $errorPOST = $this->validatePOST();
            if(!$errorPOST) {
                $ammount = $this->request->post['amount'];
                $invid = $this->request->post['order_id'];

                $invoice = $this->invoicesModel->getInvoiceById($invid);
                $userid = $invoice['user_id'];

                if($ammount >= 50){
                    $this->usersModel->updateUser($userid, $userData = array('user_promised_pay' => 0));
                }

                $wasteData = array(
                    'user_id'		=> $userid,
                    'waste_ammount'	=> $ammount,
                    'waste_status'	=> 0,
                    'waste_usluga'	=> "Пополнение баланса пользователя",
                );
                $this->wasteModel->createWaste($wasteData);

                $this->usersModel->upUserBalance($userid, $ammount);

                $bonus_percent = $this->config->bonus_percent;
                $getbonus = ($ammount * (1 + $bonus_percent / 100)) - $ammount;
                $this->usersModel->upUserBonuses($userid, $getbonus);

                $this->invoicesModel->updateInvoice($invid, array('invoice_status' => 1));

                http_response_code(200);
                return "YES";
            } else {
                http_response_code(403);
                return "Error: $errorPOST";
            }
        } else {
            http_response_code(403);
            return "Error: Invalid request!";
        }
    }

    private function validatePOST() {
        $result = null;

        $ammount = $this->request->post['amount'];
        $invid = $this->request->post['order_id'];
        $signature = $this->request->post['sign'];

        $login = $this->config->aaio_login;
        $password2 = $this->config->aaio_password2;

        if(!$this->invoicesModel->getTotalInvoices(array('invoice_id' => (int)$invid))) {
            $result = "Invalid invoice!";
        }
        elseif(!hash_equals($signature, hash('sha256', implode(':', [$_POST['merchant_id'], $_POST['amount'], $_POST['currency'], $password2, $_POST['order_id']])))) {
            $result = "Invalid signature!";
        }
        return $result;
    }
}
?>
