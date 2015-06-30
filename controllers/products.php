<?php

class Products extends Controller {

   public function __construct() {
      parent::__construct();
   }

   public function index() {
      $data['title'] = 'Splendr';
      $data['form_header'] = 'zuletzt hinzugefügte Produkte';
      $data['products'] = $this->_model->all();

      $this->_view->render('header', $data);
      $this->_view->render('home/jumbotron-header', $data);
      $this->_view->render('form_header', $data);
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

   public function board() {
      $data['title'] = 'Board';
      $data['form_header'] = 'Wünschprodukte';
      $data['products'] = $this->_model->all();
      $this->_view->render('header', $data);
      $this->_view->render('form_header', $data);
      $this->_view->render('products/list', $data);
      $this->_view->render('footer');
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

   public function edit($id) {
      $data['title'] = 'Produkt';
      $data['form_header'] = 'Produkt aktualiseren';
      $this->_view->render('header', $data);
      if($id){
         $pid = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
         //check if product with id = $pid already exists
         $data['product'] = $this->_model->select_where($pid);
         $this->_view->render('products/form', $data);
      }
      else {
         Message::set('Failed to edit','danger');
      }  
      $this->_view->render('footer');
   }
   
   public function delete($id) {
      if($id){
         $pid = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
         //check if product with id = $pid already exists
         $data['product'] = $this->_model->deleteProduct($pid);
          Message::set('<strong>Artikel gelöscht.</strong>','warning');
      }
      else {
         Message::set('Failed to edit','danger');
      }
      $this->index();
   }

   public function search() {
      $data['title'] = 'Search';
      $data['form_header'] = 'Gesuchte Produkte';
      $this->_view->render('header', $data);

      if($_GET['q']=="") {
         Message::set('Geben Sie bitte etwas ein.','warning');
         echo Message::show();
      }
      elseif (isset($_GET['q'])) {
         $find = filter_var($_GET['q'], FILTER_SANITIZE_STRING);

         // echo "<pre>";
         // echo $find;
         // echo "</pre>";

         $data['product'] = $this->_model->searchProduct($find);
         
         foreach ($data['product'] as &$daten) 
            $product['id'] = $daten['id'];
            $product['name'] = $daten['name'];
            $product['url'] = $daten['url'];
            $product['image'] = $daten['image'];
            $product['price'] = $daten['price'];
         
         echo "<pre>";
         echo $product['name'];
         echo "</pre>";

         if($product['name']){
            $this->_view->render('products/list', $data);
         }
         else {
            Message::set('Keine Produkte gefunden.','warning');
            echo Message::show();
         }
         
         
      }
      
      $this->_view->render('footer');
   }
}