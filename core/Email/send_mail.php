<?php
	namespace Email;

	class send_mail {

		private $to = array();
		private $cc = array();
		private $bcc = array();
		private $from = null;
		private $subject = null;
		private $body = null;
		private $contentType = 'html';
		public $charSet = 'UTF-8';

		public function __construct() {}

		public function isPlain() {
			$this->contentType = 'plain';
		}

		/**
		 * @param string $email Email de celui qui envoie
		 * @param string $name nom de celui qui envoie (facultatif)
		 */
		public function setFrom($email, $name = null) {
			if($name !== null){
				$from = trim(strip_tags($name)) . ' <' . trim(strip_tags($email)) . '>';
			} else {
				$from = trim(strip_tags($email));
			}
			$this->from = $from;
		}

		/**
		 * @param $subject string sujet du mail
		 */
		public function setSubject($subject) {
			$this->subject = trim(strip_tags($subject));
		}

		/**
		 * @param $body string corp du message
		 */
		public function setBody($body) {
			$this->body = trim(strip_tags($body));
		}

		/**
		 * @param string $email ajout d'une adresse
		 * @param string $destType type de destination
		 * @param null   $name ajout d'un nom du destinataire (facultatif)
		 */
		private function addAddress($email, $destType, $name = null) {
			if ($name !== null) {
				$to = trim($name) . ' <' . trim(strip_tags($email)) . '>';
			} else {
				$to = $email;
			}
			$this->{$destType}[] = $to;
		}

		/**
		 * @param      $email
		 * @param null $name
		 * Ajout de destinataire
		 */
		public function addTo($email, $name = null) {
			$this->addAddress($email, 'to', $name);
		}

		/**
		 * @param      $email
		 * @param null $name
		 * Ajout de destinataire en copie
		 */
		public function addCC($email, $name = null) {
			$this->addAddress($email, 'cc', $name);
		}

		/**
		 * @param string $email
		 * @param null $name
		 * Ajout de destinataire en copie caché
		 */
		public function addBCC($email, $name = null) {
			$this->addAddress($email, 'bcc', $name);
		}

		/**
		 * @throws \Exception
		 * Envoie du mail
		 */
		public function send() {
			$error = '';
			if ($this->from === null) {
				$error .= '<li>Entrer l\'expéditeur d\'un message</li>';
			}
			if (count($this->to) === 0) {
				$error .= '<li>Entrer au moins un destinataire.</li>';
			}
			if ($this->subject === null) {
				$error .= '<li>Entrer le sujet du message</li>';
			}
			if ($this->body === null) {
				$error .= '<li>Entrer le message</li>';
			}
			if ($error !== '') {
				throw new \Exception('Email erreur(s): <ul>' . $error . '</ul>');
			}

			$headers = array();
			$headers[] = "MIME-Version: 1.0";
			$headers[] = "Content-type: text/{$this->contentType}; charset={$this->charSet}";
			$headers[] = "From: {$this->from}";

			if (count($this->cc) > 0) {
				foreach ($this->cc as $bcc) {
					$headers[] = 'Cc: ' . $bcc;
				}
			}
			if (count($this->bcc) > 0) {
				foreach ($this->bcc as $bcc) {
					$headers[] = 'Bcc: ' . $bcc;
				}
			}

			$to = implode(", ", $this->to);
			$header = implode("\r\n", $headers);

			if ($this->contentType === 'html') {
				$body = '<html><head><meta http-equiv=Content-Type content=text/html; charset=UTF-8></head>';
				$body .= '<body><table width="800" border="0"><tr><td><p align="justify" style="color:#000000;">';
				$body .=  nl2br($this->body);
				$body .= '</p></td></tr></table></body></html>';
			} else {
				$body = $this->body;
			}

			$boSend = @mail($to, $this->subject, $body, $header);
			if (!$boSend) {
				throw new \Exception('L\'envoie du mail a échoué');
			}
		}

		public function __destruct() {
			$this->to = array();
			$this->cc = array();
			$this->bcc = array();
		}


	}