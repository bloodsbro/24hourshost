<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require dirname(__file__) . '/PHPMailer-6.8.1/src/Exception.php';
require dirname(__file__) . '/PHPMailer-6.8.1/src/PHPMailer.php';
require dirname(__file__) . '/PHPMailer-6.8.1/src/SMTP.php';

class mailLibrary {
	protected $to;
	protected $from;
	protected $sender;
	protected $subject;
	protected $text;
	
	public function setTo($to) {
		$this->to = $to;
	}
	
	public function setFrom($from) {
		$this->from = $from;
	}
	
	public function setSender($sender) {
		$this->sender = $sender;
	}
	
	public function setSubject($subject) {
		$this->subject = $subject;
	}
	
	public function setText($text) {
		$this->text = $text;
	}
	
	public function send() {
		if (!$this->to) {
			exit("Ошибка: Не указан E-Mail получателя!");
		}
		
		if (!$this->from) {
			exit("Ошибка: Не указан E-Mail отправителя!");
		}
		
		if (!$this->sender) {
			exit("Ошибка: Не указано имя отправителя!");
		}
		
		if (!$this->subject) {
			exit("Ошибка: Не указана тема сообщения!");
		}
		
		if (!$this->text) {
			exit("Ошибка: Не указан текст сообщения!");
		}
		
		if (is_array($this->to)) {
			$this->to = implode(',', $this->to);
		}
		
		/* $header = "";
		
		$header .= "MIME-Version: 1.0\n";
		
		$header .= "From: " . $this->sender . "<" . $this->from . ">\n";
		$header .= "Reply-To: " . $this->sender . "\n";
		$header .= "Return-Path: " . $this->sender . "\n";
		$header .= "Content-Type: text/html; charset=\"utf-8\"\n";

		return mail($this->to, $this->subject, $this->text, $header); */
		
		$mail = new PHPMailer();

		// Settings
		$mail->IsSMTP();
		$mail->CharSet = 'UTF-8';

		$mail->Host       = "smtp.yandex.ru";    // SMTP server example
		$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
		$mail->SMTPAuth   = true;                  // enable SMTP authentication
		$mail->SMTPSecure = "ssl";
		$mail->Port       = 465;                    // set the SMTP port for the GMAIL server
		$mail->Username   = "no-reply@24hours.host";            // SMTP account username example
		$mail->Password   = "yd6Pcd7M6weXJNE2xwn";            // SMTP account password example
		$mail->Timeout 	  = 5;

		// Content
		$mail->setFrom($this->from);   
		$mail->addAddress($this->to);

		$mail->isHTML(true);                       // Set email format to HTML
		$mail->Subject = $this->subject;
		$mail->Body    = $this->text;

		return $mail->send();
	}
}
?>
