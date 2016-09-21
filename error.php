<?php

interface Log {

	public function debug($message, $line = -1);

	public function info($message, $line = -1);

	public function warn($message, $line = -1);
}

class LogImpl implements Log {

	//Error::logFactory(__FILE__)->

	private $destination;
	private $loggerName;

	public function __construct($loggerName) {

		if (empty($loggerName)) {
			trigger_error("Logger name cannot be empty!", E_USER_ERROR);
		}

		$this->loggerName = $loggerName;
		$this->destination = "/home/thiago/dev/crossover/wordpress/wp-instance/server.log";
	}

	private function _log($message, $type = "INFO", $line = -1) {

		$date = date('H:i:s d/m/Y');

		$fullMessage = "$date $type $this->loggerName";

		if (intval($line) >= 0) {
			$fullMessage .= ' :' . $line;
		}

		$fullMessage .= " - " . $message . "\n";

		error_log(print_r($fullMessage, TRUE), 3, $this->destination);
	}

	public function debug($message, $line = -1) {

		$this->_log($message, 'DEBUG', $line);
	}

	public function info($message, $line = -1) {

		$this->_log($message, 'INFO', $line);
	}

	public function warn($message, $line = -1) {

		$this->_log($message, 'WARN', $line);
	}
}

class LogUtil {

	public static function get($loggerName) {
		return new LogImpl($loggerName);
	}
}
?>