<?php

  include "../../koneksi.php";

  $id = $_GET['id'];
  $query = "DELETE FROM profile WHERE id = $id";
  $result = mysqli_query($link, $query);
  if($result){
    header("location: ../tables.news.php");
  }

?>