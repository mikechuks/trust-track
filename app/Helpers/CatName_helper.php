<?php
function getCatName($cat_id){

  $catModel = new \App\Models\CategoryModel;

  $data = $catModel->where('category_id', $cat_id)->findAll();

foreach($data as $result){

    return $result['category_name'];
  }

}
?>