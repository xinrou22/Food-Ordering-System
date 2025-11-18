<?php 

include("../connect/config.php");

$id = $_GET['id'];
$sql = "DELETE FROM category_list WHERE id=$id";
$res = mysqli_query($db, $sql);
header("refresh:1; url=AdminCategory.php"); 

?>