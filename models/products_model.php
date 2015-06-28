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
    public function addProduct(array $daten) {
         $this->_db->insert('INSERT INTO products (id, timestamp, name, url, image, price) VALUES (NULL, CURRENT_TIMESTAMP, ?, ?, ?, ?)');
    }

    /**
    * Bearbeitet ein bereits vorhandenes Produkt.
    * @param array $daten Liste aus name, url, image und price
    */

    public function editProduct(array $daten) {
        $this->_db->update('UPDATE products SET name = ?, url = ?, image = ?, price = ? WHERE id = ?');
    }

    /**
    * Löscht ein Produkt.
    * @param int $id ID
    */
    public function delete($id) {
        $statement = $this->connection->prepare('DELETE FROM products WHERE id = ?');
        return $statement->execute(array($id));
    }


}