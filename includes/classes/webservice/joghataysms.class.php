<?php
	class joghataysms extends WP_SMS {
		private $wsdl_link = "http://185.4.28.180/class/sms/wssimple/server.php?wsdl";
		private $client = null;
		public $tariff = "http://joghataysms.ir/";
		public $unitrial = true;
		public $unit;
		public $flash = "enable";
		public $isflash = false;

		public function __construct() {
			parent::__construct();
			include_once dirname( __FILE__ ) . '/../nusoap.class.php';
			$this->client = new nusoap_client($this->wsdl_link);
			
			$this->client->soap_defencoding = 'UTF-8';
			$this->client->decode_utf8 = true;
		}

		public function SendSMS() {
			$result = $this->client->call("SendSMS", array('Username' => $this->username, 'Password' => $this->password, 'SenderNumber' => $this->from, 'RecipientNumbers' => $this->to, 'Message' => $this->msg, 'Type' => 'normal'));
			
			if($result) {
				$this->InsertToDB($this->from, $this->msg, $this->to);
				$this->Hook('wp_sms_send', $result);
			}
			
			return $result;
		}

		public function GetCredit() {
			$result = $this->client->call("GetCredit", array('Username' => $this->username, 'Password' => $this->password));
			
			return $result;
		}
	}
?>