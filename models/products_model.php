<?php

class Products_Model extends Model {

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
    * Fügt ein Produkt hinzu.
    * @param array $daten Liste aus name, url, image und price
    */
    public function addProduct($daten) {
      return $this->_db->insert('products',$daten);
    }

    /**
    * Bearbeitet ein bereits vorhandenes Produkt.
    * @param array $daten Liste aus name, url, image und price
    */

    public function editProduct($daten,$id) {
        return $this->_db->update('products', $daten, "id = $id");
    }

    /**
    * Löscht ein Produkt.
    * @param int $id ID
    */
    public function deleteProduct($id) {
     return $this->_db->delete('products',"id = $id");
    }

    public function select_where($id) {
      return $this->_db->select("SELECT * FROM products WHERE id = $id");

    }

    public function searchProduct($term){
      return $this->_db->select("SELECT * FROM products WHERE name LIKE '%$term%' ");

    }


}