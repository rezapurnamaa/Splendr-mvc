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

		$daten['username'] = filter_var($_POST['login-name'], FILTER_SANITIZE_STRING);
		$daten['login-password'] = filter_var($_POST['login-password'], FILTER_SANITIZE_STRING);


   

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