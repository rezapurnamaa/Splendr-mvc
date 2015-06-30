<div class="panel panel-default">

   <div class="panel-heading">
      <h3 class="panel-title"><?= $data['form_header'] ?></h3>
   </div>

   <div class="panel-body">

      <?php echo Message::show(); ?>

      <?php
         //$product = $data['product'];
         // echo "<pre>";
          foreach ($data['product'] as &$daten) 
            $product['id'] = $daten['id'];
            $product['name'] = $daten['name'];
            $product['url'] = $daten['url'];
            $product['image'] = $daten['image'];
            $product['price'] = $daten['price'];
         // echo "<pre>";
         if (isset($product['id'])) :
      ?>

      <form class="form-horizontal" role="form" action="<?= DIR ?>products/insert" method="POST">
         <div class="form-group">
             <label class="control-label col-sm-2" for="name">Name</label>
             <div class="col-sm-8">
               <input type="text" class="form-control" name = "name" id="name" placeholder="Produktname" value="<?= $product['name'] ?>">
             </div>
         </div>
         <div class="form-group">
             <label class="control-label col-sm-2" for="price">Preis</label>
             <div class="col-sm-8"> 
               <input type="number" class="form-control" name = "price" id="price" placeholder="Preis" value="<?= $product['price'] ?>">
             </div>
         </div>
         <div class="form-group">
             <label class="control-label col-sm-2" for="product-url">Link</label>
             <div class="col-sm-8"> 
               <input type="url" class="form-control" name = "url" id="url" placeholder="Produkt URL" value="<?= $product['url'] ?>">
             </div>
         </div>
         <div class="form-group">
             <label class="control-label col-sm-2" for="image-url">Bild</label>
             <div class="col-sm-8"> 
               <input type="url" class="form-control" name = "image" id="img" placeholder="Bild URL" value="<?= $product['image'] ?>">
             </div>
         </div>
         
         <div class="form-group"> 
             <div class="col-sm-offset-2 col-sm-8">
               <button type="submit" class="btn btn-success">Update</button>
             </div>
         </div>
            <input type="hidden" name="id" value="<?= $product['id'] ?>">
      </form>

      <?php else : ?>

      <form class="form-horizontal" role="form" action="<?= DIR ?>products/insert" method="POST">
         <div class="form-group">
             <label class="control-label col-sm-2" for="name">Name</label>
             <div class="col-sm-8">
               <input type="text" class="form-control" id="name" placeholder="Produktname" name="name">
             </div>
         </div>
         <div class="form-group">
             <label class="control-label col-sm-2" for="price">Preis</label>
             <div class="col-sm-8"> 
               <input type="number" class="form-control" id="price" placeholder="Preis" name="price">
             </div>
         </div>
         <div class="form-group">
             <label class="control-label col-sm-2" for="product-url">Link</label>
             <div class="col-sm-8"> 
               <input type="url" class="form-control" id="url" placeholder="Produkt URL" name="url">
             </div>
         </div>
         <div class="form-group">
             <label class="control-label col-sm-2" for="image-url">Bild</label>
             <div class="col-sm-8"> 
               <input type="url" class="form-control" id="image" placeholder="Bild URL" name="image">
             </div>
         </div>
         
         <div class="form-group"> 
             <div class="col-sm-offset-2 col-sm-8">
               <button type="submit" class="btn btn-success">Anlegen</button>
             </div>
         </div>
      </form>

   <?php endif; ?>

   </div> <!-- / .panel-body -->
</div> <!-- / .panel -->