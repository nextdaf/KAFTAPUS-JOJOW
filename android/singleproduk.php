<?php
include "../includes/db.php";
if (!empty($_GET["id"])) {
    $id = $_GET["id"];
    $query ="SELECT * FROM produk WHERE id_produk = $id";      
      $result = $connection->query($query);
      while($row = mysqli_fetch_object($result))
      {
         $data[] = $row;
      }            
      if($data)
      {
      $response = array(
                     'status' => 1,
                     'message' =>'Success',
                     'data' => $data
                  );               
      }else {
         $response=array(
                     'status' => 0,
                     'message' =>'No Data Found'
                  );
      }
      
      header('Content-Type: application/json');
      echo json_encode($response);   
 }