<?php
include "../includes/db.php";
   $query = $connection->query("SELECT * FROM `produk`");
   while($row = mysqli_fetch_assoc($query)){
       $data[] = $row;
   }
   $response = array(
       'status' => 1,
       'message' => 'Success',
       'data' => $data,
   );
   header('Content-Type: application/json');
   echo json_encode($response);