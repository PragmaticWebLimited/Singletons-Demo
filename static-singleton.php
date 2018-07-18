<?php

class StaticRequestData {

	private static $initialized = false;

	private static $requester_ip;
	private static $connection_time;

	private static $get_variables;
	private static $post_variables;

	private function __construct() {
	}

	public static function __init() {

		if ( self::$initialized ) {
			return;
		}
		self::$initialized = true;

		self::$requester_ip    = $_SERVER['REMOTE_ADDR'];
		self::$connection_time = time();

		self::$get_variables = [];
		foreach ( $_GET as $key => $value ) {
			self::$get_variables[ $key ] = htmlspecialchars( $value );
		}

		self::$post_variables = [];
		foreach ( $_POST as $key => $value ) {
			self::$post_variables[ $key ] = htmlspecialchars( $value );
		}
	}

	public static function GetRequesterIP() {
		return self::$requester_ip;
	}

	public static function GetConnectionUnixTime() {
		return self::$connection_time;
	}

	public function GetConnectionISOTime() {
		return date( 'c', self::$connection_time );
	}

	public static function GetConnectionAge() {
		return time() - self::$connection_time;
	}

	public static function GetGetVariables() {
		return self::$get_variables;
	}

	public static function GetPostVariables() {
		return self::$post_variables;
	}
}

StaticRequestData::__init();
