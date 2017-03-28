<?php

	class CustomerInfo {
		public $customer_id;
		public $customer_name;
		public $qos_profile_id;
		public $access_type;
		public $status;
		public $online_status;
		public $mobile;
		public $bras;
		public $access_node;
		public $rack;
		public $card;
		public $port;
		public $splitter_name;
		public $onu_id;
		public $offline_time;
		public $created_date;
		public $updated_date;
		public $online_framed_ip_address;
		public $online_time;
		public $access_vlan;
		public $circuit_id;
		public $termination_cause;
		public $line_id;
		public $first_time_flg;

		public function __construct($customer_id, $line_id) {
			#query
			$this->customer_id = $customer_id;
			$this->line_id = $line_id;
		}

		public function getCustomerId() {
			return $this->customer_id;
		}

		public function responseChat($message) {
			return true;
		}

		public function getFault() {
			return true;
		}

	}
?>