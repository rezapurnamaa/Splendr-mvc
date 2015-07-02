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

    /**
    *gibt die Werte von Tabelle zurück, welche username gleich 'username' in Datenbank ist
    *@param $username
    */
    public function getUser($username) {
      return $this->_db->select("SELECT * FROM `users` WHERE username = '$username'");
    }

    /**
    *gibt die Werte von Tabelle zurück, welche email gleich 'email' in Datenbank ist
    *@param $email
    */
    public function getEmail($email) {
      return $this->_db->select("SELECT * FROM users WHERE email = $email");
    }

    /**
    *validiere Password
    *@param $inputPassword password, das vom user eingegeben
    *@param $password_db password in Datenbank
    */
    public function validatePassword($inputPassword, $password_db) {
      return $this->_pwd->validate($inputPassword, $password_db);
    }
}