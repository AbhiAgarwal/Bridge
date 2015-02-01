<?php


class Connect {

	private $error;
	public static $dbh;

	/**
	 * Connect to mySQL and select a database.
	 *
	 * The credentials used to connect to the database are pulled from /classes/config.php.
	 *
	 * @return    string    Error message for any incorrect database connection attempts.
	 */
	public function dbConn() {

		include(dirname(__FILE__) . '/config.php');

		try {
			self::$dbh = new PDO("mysql:host={$host};dbname={$dbName}", $dbUser, $dbPass);
			self::$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
		} catch (PDOException $e) {
			return '<div class="alert alert-error">'._('Database error: '). $e->getMessage() . '</div>';
		}


	}

}

// Instantiate the Connect class
$connect = new Connect();