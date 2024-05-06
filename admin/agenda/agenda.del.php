<?php

  include "../../koneksi.php";

  $id = $_GET['id'];
  $query = "DELETE FROM posts WHERE id = $id";
  $result = mysqli_query($link, $query);
  if($result){
    header("location: ../tables.php");
  }

?>