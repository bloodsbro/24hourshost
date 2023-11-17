<?php
class vk_api{
	
    public function sendMessage($userId,$message){
        if ($userId != 0 and $userId != '0') {
            return $this->request('messages.send',array('message'=>$message, 'peer_id'=>$userId));
        } else {
            return true;
        }
    }
}
