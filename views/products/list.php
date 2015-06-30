<?php echo Message::show(); ?>

   <?php
      if (!sizeof($data['products'])) {
         echo '<div class="alert alert-info">Derzeit gibt es keine Produkte. <a href="' . DIR . 'products/add">Leg gleich welche an</a>!</div>';
      }
      else {
         echo '<div class="row text-center">';
         foreach ($data['products'] as $product) {
            echo
            '<div class="col-md-3 col-sm-6 hero-feature">
               <div class="thumbnail">
                  <a href="' . $product['url'] . '" title="' . $product['name'] . '"><img class="img-responsive" src="' . $product['image'] . '" alt="' . $product['name'] . '"></a>
                  <div class="caption">
                     <h3><a href="' . $product['url'] . '" title="' . $product['name'] . '">' . $product['name'] . '</a></h3>
                     <span class="lead">' . $product['price'] . '€</span>
                  </div>
                  <div class="buttons-edit">
                     <a class="btn btn-primary" href="' . DIR . 'products/edit/' .$product['id'] . '">Edit</a>
                     <!-- Trigger the modal with a button -->
                     <a class="btn btn-default" data-href="' . DIR . 'products/delete/' . $product['id'] . '" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                  </div>
                  
                  <!-- Modal -->
                     <div id="confirm-delete" class="modal fade" role="dialog">
                       <div class="modal-dialog">

                         <!-- Modal content-->
                         <div class="modal-content">
                           <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                             <h4 class="modal-title">Achtung!</h4>
                           </div>
                           <div class="modal-body">
                             <p>Wollen Sie wirklich <strong>'. $product['name'] .'</strong> löschen?</p>
                           </div>
                           <div class="modal-footer">
                              <a class="btn btn-danger btn-ok">Löschen</a>
                              <button type="button" class="btn btn-default" data-dismiss="modal">Nein</button>
                           </div>
                         </div>

                       </div>
                     </div>
               </div>
            </div>';
         }
      }
   ?>

</div> <!-- / .products -->