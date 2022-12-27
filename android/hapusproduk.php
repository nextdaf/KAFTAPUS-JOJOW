<?php
include "../includes/db.php";
$id = $_GET['id'];
      $query = "DELETE FROM produk WHERE id_produk = ".$id;
      if(mysqli_query($connection, $query))
      {
         $response=array(
            'status' => 1,
            'message' =>'Delete Success'
         );
      }
      else
      {
         $response=array(
            'status' => 0,
            'message' =>'Delete Fail.'
         );
      }
      header('Content-Type: application/json');
      echo json_encode($response);