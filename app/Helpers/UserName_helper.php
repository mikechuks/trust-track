<?php
function getUserName($user_id){

  $userModel = new \App\Models\UserModel;

  $data = $userModel->where('user_id', $user_id)->findAll();

foreach($data as $result){

    return $result['name'];
  }

}
?>