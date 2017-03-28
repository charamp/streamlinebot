<?php

	class EventInfo {
		public $type;
		public $reply_token;
		public $source_user_id;
		public $source_type;
		public $timestamp;
		public $message_type;
		public $message_id;
		public $message_text;

		public function __construct($event) {
			$this->type = $event['type'];
			$this->reply_token = $event['replyToken'];
			$this->source_user_id = $event['source']['userId'];
			$this->source_type = $event['source']['type'];
			$this->timestamp = $event['timestamp'];
			$this->message_type = $event['message']['type'];
			$this->message_id = $event['message']['id'];
			$this->message_text = $event['message']['text'];
		}

		public function getType() {
			return $this->type;
		}

		public function getReplyToken() {
			return $this->reply_token;
		}

		public function getSourceUserId() {
			return $this->source_user_id;
		}

		public function getSourceType() {
			return $this->source_type;
		}

		public function getTimestamp() {
			return $this->timestamp;
		}

		public function getMessageType() {
			return $this->message_type;
		}

		public function getMessageId() {
			return $this->message_id;
		}

		public function getMessageText() {
			return $this->message_type;
		}

		public function responseChat($token, $message) {

			$messages = ['type' => 'text', 'text' => $message];
			$url = 'https://api.line.me/v2/bot/message/push';
 			$data = ['to' => $this->reply_token, 'messages' => [$messages]];

       		$post = json_encode($data);
	        $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $token);

	        $ch = curl_init($url);
	        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	        $result = curl_exec($ch);
	        curl_close($ch);
		}

	}

?>