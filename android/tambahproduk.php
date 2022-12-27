<?php
include "../includes/db.php";
$check = array(
    'nama' => '',
    'deskripsi' => '',
    'harga' => '',
    'stok' => '',
    'url_gambar' => '',
 );
 $check_match = count(array_intersect_key($_POST, $check));
 if($check_match == count($check)){
 
       $result = mysqli_query($connection, "INSERT INTO produk SET
       nama = '$_POST[nama]',
       deskripsi = '$_POST[deskripsi]',
       harga = '$_POST[harga]',
       stok = '$_POST[stok]',
       url_gambar = '$_POST[url_gambar]'");
       
       if($result)
       {
          $response=array(
             'status' => 1,
             'message' =>'Insert Success'
          );
       }
       else
       {
          $response=array(
             'status' => 0,
             'message' =>'Insert Failed.'
          );
       }
 }else{
    $response=array(
             'status' => 0,
             'message' =>'Wrong Parameter'
          );
 }
 header('Content-Type: application/json');
 echo json_encode($response);