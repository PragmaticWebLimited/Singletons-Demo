<?php

class StaticRequestData {

	// A variable to denote if the singleton has already been initialized
	private static $initialized = false;

	// The data we are wrapping into a singleton
	private static $requester_ip;
	private static $connection_time;

	private static $get_variables;
	private static $post_variables;

	// A private __construct method means no-one can instantiate this class
	private function __construct() {
	}

	// Setup all our variables
	// This function must be called in the bottom of this file
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

	// The accessor functions for our data

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

// Call __init now, to ensure the data is populated.
// This must be called before anyone else uses our static class, so right after the class is declared is a good place
StaticRequestData::__init();
