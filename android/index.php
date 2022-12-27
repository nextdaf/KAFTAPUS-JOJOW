<?php
include "../includes/db.php";
if(function_exists($_GET['function'])) {
    $_GET['function']();
 }
 function get_produk()
 {
    global $connection;
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
 }

 function get_produk_id()
   {
      global $connection;
      if (!empty($_GET["id"])) {
         $id = $_GET["id"];      
      }            
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

function get_users_login_by_id()
   {
      global $connection;
      if (!empty($_GET["id"])) {
         $id = $_GET["id"];      
      }            
      $query ="SELECT * FROM users_login WHERE id_login = $id";      
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

function get_users_login_by_email()
   {
      global $connection;
      if (!empty($_GET["email"])) {
         $email = $_GET["email"];      
      }            
      $query ="SELECT * FROM users_login WHERE email = '$email'";      
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

function insert_produk()
      {
         global $connection;   
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
}
function update_produk()
      {
         global $connection;
         if (!empty($_GET["id"])) {
         $id = $_GET["id"];      
         }   
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

function delete_produk()
   {
      global $connection;
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
   }
?>