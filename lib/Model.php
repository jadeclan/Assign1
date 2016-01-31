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

	public function __construct()
	{
		// Singleton pattern :(
		if (self::$db == null) {

			// Connect to database
			self::$db = new PDO(DB_TYPE.":dbhost=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);

			// Enable exceptions
			self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Set fetch mode
			self::$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		}
	}
}