<?php

namespace Framework;

use PDO;

/**
 * PDO wrapper? To much work for too little payoff. There are a lot of
 * elegant libraries out there that are worth looking into...
 *
 * @author mark
 *
 */
abstract class Model
{
	protected static $db;

	public function __construct($type, $host, $name, $user, $pass)
	{
		// Singleton pattern :(
		if (self::$db == null) {

			// Connect to database
			self::$db = new PDO("$type:dbhost=$host;dbname=$name", $user, $pass);

			// Enable exceptions
			self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Set fetch mode
			self::$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		}
	}
}