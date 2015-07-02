<?php

Class Users extends Controller{
	
	public function __construct() {
      parent::__construct();
   }

   public function profile() {
      $data['title'] = 'Profile';
      $data['form_header'] = 'Ihr Übersicht';
      $data['products'] = $this->_model->all();
      $this->_view->render('header', $data);
      $this->_view->render('form_header', $data);
      $this->_view->render('user/profile', $data);
      $this->_view->render('footer');
   }

   public function login() {
   		$data['title'] = 'Login';
      $data['form_header'] = 'Einloggen oder Anmelden';
      $data['products'] = $this->_model->all();
      $this->_view->render('header', $data);
      $this->_view->render('form_header', $data);
      $this->_view->render('user/login_form', $data);
      $this->_view->render('footer');
   }

   public function getLogin() {

      $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

      if(filter_var($_POST['username'], FILTER_VALIDATE_EMAIL)) {
         $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
         $data['users'] = $this->_model->getEmail($email);
         $user_db = $data['users'];
      }
      else {
         $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
         $data['users'] = $this->_model->getUser($username);
         $user_db = $data['users'];
      }

      if(isset($data['users'])) {
          foreach ($data['users'] as &$daten) 
            $user['id'] = $daten['id'];
            $user['username'] = $daten['username'];
            $user['firstname'] = $daten['firstname'];
            $user['lastname'] = $daten['lastname'];
            $user['email'] = $daten['email'];
            $user['password'] = $daten['password'];
            $user['city'] = $daten['city'];
            $user['country'] = $daten['country'];
      }
		else {
         echo "cannot connect to DB.";
      }

      if($user['username'] == $username xor $user['email'] == $email) {
         if($this->_model->validatePassword($password, $user['password'])) {
            echo "logged in.";
         }
         else {
            echo "wrong password";
         }
      }
      else {
         echo "wrong username or email.";
      }
   }

   public function signUp() {
      $daten['username'] = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
      $daten['password'] = filter_var($_POST['passwd'], FILTER_SANITIZE_STRING);
      $daten['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
      $daten['firstname'] = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
      $daten['lastname'] = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
      // $data = $this->
            
      $data = $this->_model->addAccount($daten);
      $data['products'] = $this->_model->all();

      $this->_view->render('header', $data);
      $this->_view->render('home/jumbotron-header', $data);
      $this->_view->render('form_header', $data);
      $this->_view->render('products/list', $data);
      $this->_view->render('footer');

      Message::set('<strong>Signing Up.</strong>');


   }

   public function insert() {

      if(isset($_POST['id'])){
         $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
      }
      $daten['name'] = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
      $daten['url'] = filter_var($_POST['url'], FILTER_SANITIZE_URL);
      $daten['image'] = filter_var($_POST['image'], FILTER_SANITIZE_URL);
      $daten['price'] = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION | FILTER_FLAG_ALLOW_THOUSAND);
   
      if ($id) {
         $data = $this->_model->editProduct($daten, $id);
         Message::set('<strong>Artikel aktualisiert.</strong>');
      }
      else {
         $data = $this->_model->addProduct($daten);
         Message::set('<strong>Artikel hinzugefügt.</strong>');
      }
      header("Refresh:0; url='../'");
   }

}