<?php

require_once('app/init.php');

$id =$_GET['id'];

   $deleteQuery = $db->prepare(
    "DELETE FROM  items WHERE id= :id ");

    $deleteQuery->execute([
        'id' => $id
    ]);


header('location:index.php');