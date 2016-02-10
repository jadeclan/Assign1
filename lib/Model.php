<?php

namespace Framework;

use PDO;

/**
 * Abstract Model class used to create the database PDO
 *
 * Developed by: Bergeron, O'Donnell, Pitrolia, Walker
 * January - February, 2016
 *
 * Database Access Constants are set on the index.php page
 */
abstract class Model
{
	private static $instance;

	protected $db;

	public function __construct()
	{
		// Singleton pattern :(
		if (self::$instance == null) {

			// Connect to database
			self::$instance = new PDO(DB_TYPE.":dbhost=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);

			// Enable exceptions
			self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Set fetch mode
			self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		}

		$this->db = self::$instance;
	}


}