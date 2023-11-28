<?php

class Notify {
    private $registry;

    public function __construct($registry) {
        $this->registry = $registry;
    }

    public function adminsTelegram($message) {
        $usersQuery = $this->registry->db->query("SELECT user_tg FROM users WHERE user_access_level >= 2");
        foreach($usersQuery->rows as $user) {
            $url = "https://api.telegram.org/bot" . $this->registry->config->telegram_token . "/sendMessage?chat_id=" . $user['user_tg'] . "&text=" . rawurlencode($message);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            $response = curl_exec($ch);
            if(curl_errno($ch))
                error_log('Curl error: ' . curl_error($ch));
            error_log(json_encode($response));
        }
    }

    public function user($userId, $message) {
        $dataQuery = $this->registry->db->query("SELECT user_tg, user_vk_id FROM users WHERE user_id = '$userId' LIMIT 1");
        if(count($dataQuery->rows) > 0) {
            $user = $dataQuery->rows[0];

            if($user['user_tg']) {
                $url = "https://api.telegram.org/bot" . $this->registry->config->telegram_token . "/sendMessage?chat_id=" . $user['user_tg'] . "&text=" . rawurlencode($message);

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_URL, $url);
                $response = curl_exec($ch);
                if(curl_errno($ch))
                    error_log('Curl error: ' . curl_error($ch));
                error_log(json_encode($response));
            }

            if($user['user_vk_id']) {
                $request_params = array(
                    'message' => $message,
                    'peer_id' => $user['user_vk_id'],
                    'access_token' => $this->config->VK_token,
                    'v' => '5.154',
                    'random_id' => rand(0, 2147483647)
                );

                $get_params = http_build_query($request_params);
                @file_get_contents('https://api.vk.com/method/messages.send?'.$get_params);
            }
        }
    }
}
?>
