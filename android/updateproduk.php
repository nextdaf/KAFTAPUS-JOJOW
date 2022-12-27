<?php
include "../includes/db.php";
if (!empty($_GET["id"])) {
    $id = $_GET["id"];
    $check = array(
        'nama' => '',
        'deskripsi' => '',
        'harga' => '',
        'stok' => '',
        'url_gambar' => '',
     );
     $check_match = count(array_intersect_key($_POST, $check));         
     if($check_match == count($check)){
     
          $result = mysqli_query($connection, "UPDATE produk SET               
           nama = '$_POST[nama]',
           deskripsi = '$_POST[deskripsi]',
           harga = '$_POST[harga]',
           stok = '$_POST[stok]',
           url_gambar = '$_POST[url_gambar]' WHERE id_produk = $id");
     
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