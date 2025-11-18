<?php 

    include("../connect/config.php"); 
    $id = $_GET['id'];
    $sql = "DELETE FROM menu_list WHERE id=$id";

    $query = mysqli_query($db, $sql);


	if($query==TRUE)
	{
		header("refresh: 0; url=AdminProduct.php");
	}
	else
	{
		echo "<script type='text/javascript'> alert('Failed to Delete Product')</script>" . $sql . "<br>" . $connector->error;
	}

?>