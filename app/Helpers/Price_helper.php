<?php
function getPrice($user_id){

  $proModel = new App\Models\ProductModel;;

  $data = $proModel->where('product_id', $user_id)->findAll();

foreach($data as $result){

    return $result['product_amount'];
  }

}
?>