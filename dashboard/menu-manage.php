<!-- menu-manage.php -->
<?php
	if (isset($_GET['menu_id'])) {
		$id =$_GET['menu_id'];
		$sql ="DELETE FROM `menu_item` WHERE id = '$id';";
		include_once 'dbCon.php';
		$con = connect();
		if ($con->query($sql) === TRUE) {
		echo '<script>alert("DELETED.")</script>'; 
		echo '<script>window.location ="menu-list.php"</script>';
		//header("Location: view-chair-list.php?table_id=".$tbl_id."");
	    } else {
			echo "Error: " . $sql . "<br>" . $con->error;
		} 
	}
?>