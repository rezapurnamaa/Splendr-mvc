<?php

class Model {

	protected $_db;
	protected $_pwd;
	protected $_session;

	function __construct() {
		//connect to PDO here.
		$this->_db = new Database();
		$this->_pwd = new Password();
		$this->_session = new Session();
	}
}