<?php

class LmsHelper
{	
	private static $host;
	private static $api_key;
	private static $api_version;
	private static $use_ssl;
	private static $debug;
	private static $port;

	public function __construct() {
		self::$host 		= Config::get('lms.host');
		self::$api_key 		= Config::get('lms.api_key');
		self::$api_version 	= Config::get('lms.api_version');
		self::$use_ssl		= Config::get('lms.use_ssl');
		self::$debug 		= Config::has('lms.debug') ? Config::get('lms.debug') : false;

		if (Config::has('lms.port')) {
			self::$port = Config::get('lms.port');
		} else {
			self::$port = self::$use_ssl ? 443 : 80;
		}
	}

	public static function get($method, $args=array()) 
	{
		if (strlen(self::$api_key)) {
			$args['api_key'] = self::$api_key;
		}

		if (strlen(self::$api_version)) {
			$args['api_version'] = self::$api_version;
		}

		$parts = array();

		foreach($args as $key=>$value) {
			if (is_array($value)) {
				foreach($value as $part) {
					$parts[] = urlencode($key).'[]='.urlencode($part);
				}
			}	else {
				$parts[] = urlencode($key).'='.urlencode($value);
			}
		}

		$path = (self::$use_ssl ? 'https://' : 'http://').self::$host.'/api/' . $method . '?' . implode('&amp;', $parts);
		$result = file_get_contents($path);

		return json_decode($result);
	}

	public static function toArray($ids) 
	{
		if (is_array($ids)) {
			return $ids;
		} else {
			return explode(',', $ids);
		}
	}
}