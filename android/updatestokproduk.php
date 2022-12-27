<?php
include "../includes/db.php";
if (!empty($_GET["id"])) {
    $id = $_GET["id"];
    $check = array(
        'stok' => '',
     );
     $check_match = count(array_intersect_key($_POST, $check));         
     if($check_match == count($check)){
     
          $result = mysqli_query($connection, "UPDATE produk SET               
           stok = '$_POST[stok]' WHERE id_produk = $id");
     
        if($result)
        {
           $response=array(
              'status' => 1,
              'message' =>'Update Success'                  
           );
        }
        else
        {
           $response=array(
              'status' => 0,
              'message' =>'Update Failed'                  
           );
        }
     }else{
        $response=array(
                 'status' => 0,
                 'message' =>'Wrong Parameter',
                 'data'=> $id
              );
     }
     header('Content-Type: application/json');
     echo json_encode($response);   
}