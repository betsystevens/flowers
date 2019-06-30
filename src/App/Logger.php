<?php
namespace App;

class Logger {

	private $logFile;

	public function __construct($logFile) {
		$this->logFile = $logFile;
	}

	public function write($message)
		{
			ob_start();
			print_r($message);
			echo "\n";
			$output = ob_get_clean();
			error_log($output, 3, __DIR__ . '/' . $this->logFile);

		}
}	