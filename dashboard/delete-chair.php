<!-- delete-chair.php -->
<?php
	if (isset($_GET['chair_id'])) {
		$id =$_GET['chair_id'];
		$tbl_id = $_GET['tbl_id'];
		$sql ="DELETE FROM `restaurant_chair` WHERE id = '$id';";
		include_once 'dbCon.php';
		$con = connect();
		if ($con->query($sql) === TRUE) {
		echo '<script>alert("DELETED.")</script>'; ?>
		<script type="text/javascript">
			var dist = <?php echo $tbl_id; ?>;
		</script>
<?php		
		echo '<script>window.location.href ="view-chair-list.php?table_id=" + dist;</script>';
		header("Location: view-chair-list.php?table_id=".$tbl_id."");
	    } else {
			echo "Error: " . $sql . "<br>" . $con->error;
		} 
	}
?>