<?php

class SingletonRequestData {

	private static $instance;

	private $requester_ip;
	private $connection_time;

	private $get_variables;
	private $post_variables;

	private function __construct() {
		$this->requester_ip    = $_SERVER['REMOTE_ADDR'];
		$this->connection_time = time();

		$this->get_variables = [];
		foreach ( $_GET as $key => $value ) {
			$this->get_variables[ $key ] = htmlspecialchars( $value );
		}

		$this->post_variables = [];
		foreach ( $_POST as $key => $value ) {
			$this->post_variables[ $key ] = htmlspecialchars( $value );
		}
	}

	public static function GetInstance() {
		if ( self::$instance ) {
			return self::$instance;
		}
		self::$instance = new SingletonRequestData();
	}

	public function GetRequesterIP() {
		return $this->requester_ip;
	}

	public function GetConnectionUnixTime() {
		return $this->connection_time;
	}

	public function GetConnectionISOTime() {
		return date( 'c', $this->connection_time );
	}

	public function GetConnectionAge() {
		return time() - $this->connection_time;
	}

	public function GetGetVariables() {
		return $this->get_variables;
	}

	public function GetPostVariables() {
		return $this->post_variables;
	}
}

SingletonRequestData::GetInstance();
