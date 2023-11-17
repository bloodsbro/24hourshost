<?php
class indexController extends Controller {
	//public function index() {
		//return "Error:";
	//}
	
	public function index() {
		if (!isset($_REQUEST)) {
			return;
		}
		
		$confirmationToken = $this->config->VK_confirmationToken;
		$token = $this->config->VK_token;
		$secretKey = $this->config->VK_secretKey;
		
		$this->load->model('users');
		$this->load->model('servers');
		$this->load->library('query');

		$data = json_decode(file_get_contents('php://input'));

		if (strcmp($data->secret, $secretKey) !== 0 && strcmp($data->type, 'confirmation') !== 0)
			return;
		
		switch($data->type) {
			case 'confirmation': {
					echo $confirmationToken;
				break;
			}
			case 'message_new': {
					$userId = $data->object->message->peer_id;
					$message = $data->object->message->text;
					$users = $this->usersModel->getUserByUser_vk_id($userId);
					$date = date("d.m.Y H:i",  time());
				
					switch($message) {
						case '/help': {
								$mes = '
									Добро пожаловать! Я знаю такие команды как:
									- /ping - Проверить доступность сайта
									- /date - Узнать дату
								';
							break;
						}
						case '/date': {
							$mes = $date;
						break;
						}
					}

					$request_params = array(
						'message' => $mes,
						'peer_id' => $userId,
						'access_token' => $token,
						'v' => '5.154',
						'random_id' => rand(0, 2147483647)
					);

					$get_params = http_build_query($request_params);
					file_get_contents('https://api.vk.com/method/messages.send?'.$get_params);
					error_log('https://api.vk.com/method/messages.send?'.$get_params);
					echo('ok');
				break;
			}
		}
	}
}
?>
