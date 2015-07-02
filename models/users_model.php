<?php

class Users_Model extends Model {

   public function __construct(){
      parent::__construct();
   }

   /**
   * Gibt die letzten 20 Einträge im Archiv zurück.
   * @return array Liste aus Produkten mit id, timestamp, name, url, image und price
   */
   public function all() {
      return $this->_db->select('SELECT * FROM products ORDER BY id DESC LIMIT 0, 20');
   }

   /**
    * Fügt ein Konto hinzu.
    * @param array $daten Liste aus username, Vorname, Nachname, email, Stadt, Staat
    */
    public function addAccount($daten) {
      $daten['password'] = $this->_pwd->hash($daten['password']);
      return $this->_db->insert('users',$daten);
    }

    public function getUser($username) {
      return $this->_db->select("SELECT * FROM `users` WHERE username = '$username'");
    }

    public function getEmail($email) {
      return $this->_db->select("SELECT * FROM users WHERE email = $email");
    }

    public function validatePassword($inputPassword, $password_db) {
      return $this->_pwd->validate($inputPassword, $password_db);
    }
}