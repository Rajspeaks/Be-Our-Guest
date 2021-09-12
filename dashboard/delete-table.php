<!-- delete-table.php -->
<?php
	if (isset($_GET['table_name'])) {
		$id = $_GET['id'];
		$res = $_GET['res_id'];
		$sql ="DELETE FROM `restaurant_tables` WHERE id = '$id' AND res_id = '$res';";
		include_once 'dbCon.php';
		$con = connect();
		if ($con->query($sql) === TRUE) {
		echo '<script>alert("DELETED.")</script>'; ?>
		<script type="text/javascript">
			var dist = <?php echo $id; ?>;
		</script>
<?php		
		echo '<script>window.location.href ="delete.table.php?table_id=" + dist;</script>';
		header("Location: table-list.php");
	    } else {
			echo "Error: " . $sql . "<br>" . $con->error;
		} 
	}
?>