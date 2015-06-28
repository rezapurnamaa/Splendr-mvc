<?php

class Products extends Controller {

   public function __construct() {
      parent::__construct();
   }

   public function index() {
      $data['title'] = 'Splendr';
      $data['products'] = $this->_model->all();

      $this->_view->render('header', $data);
      $this->_view->render('home/jumbotron-header', $data);
      $this->_view->render('products/list', $data);
      $this->_view->render('footer');
   }

   public function add() {
      $data['title'] = 'Neues Produkt';
      $data['form_header'] = 'Neues Produkt anlegen';

      $this->_view->render('header', $data);
      $this->_view->render('products/form', $data);
      $this->_view->render('footer');
   }

   public function insert() {

      if(isset($_POST['id'])){
         $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
      }
      $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
      $url = filter_var($_POST['url'], FILTER_SANITIZE_URL);
      $image = filter_var($_POST['image'], FILTER_SANITIZE_URL);
      $price = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION | FILTER_FLAG_ALLOW_THOUSAND);

      if ($id) {
         $data = $this->_model->editProduct(array($name, $url, $image, $price, $id));
         $message = '<strong>Artikel aktualisiert.</strong>';
      }
      else {
         $data = $this->_model->addProduct(array($name, $url, $image, $price));
         $message = '<strong>Artikel hinzugefügt.</strong>';
      }
   }

}