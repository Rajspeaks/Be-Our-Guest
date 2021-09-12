<!-- invoice.php -->
<?php include 'template/header.php'; 
if (!isset($_SESSION['isLoggedIn'])) {
	echo '<script>window.location="login.php"</script>';
}

?>
	<body>
		<section class="body">

			<!-- start: header -->
			<?php include 'template/top-bar.php'; ?>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<?php include 'template/left-bar.php'; ?>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Invoice</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Pages</span></li>
								<li><span>Invoice</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->

					<section class="panel">
						<div class="panel-body">
							<div class="invoice">
								<header class="clearfix">
									<div class="row">
										<div class="col-sm-4 mt-md">
											<h2 class="h2 mt-none mb-sm text-dark text-bold">INVOICE</h2>
											<h4 class="h4 m-none text-dark text-bold">
											#<?php echo $_GET['booking-number']; ?></h4>
										</div>
										<?php 
											include 'dbCon.php';
											$con = connect();
											$res_id = $_SESSION['id'];
											$sql = "SELECT * FROM `restaurant_info` where id = '$res_id';";
											$result = $con->query($sql);
											foreach ($result as $r) {
										?>
										<div class="col-sm-8 text-right mt-md mb-md">
											<address class="ib mr-xlg">
												<b class="text-capitalize"><?php echo $r['restaurent_name']; ?></b>
												<br/>
												<?php echo $r['address']; ?>
												<br/>
												Phone: +88 <?php echo $r['phone']; ?>
												<br/>
												<?php echo $r['email']; ?>
											</address>
											<div class="ib">
												<img style="width: 174px;height: 69px;" src="user-image/<?php echo $r['logo']; ?>" alt="OKLER Themes" />
											</div>
										</div>
										<?php } ?>
									</div>
								</header>
								<?php 
									$booking_number = $_GET['booking-number'];
									$sql2 = "SELECT * FROM `booking_details` where booking_id = '$booking_number';";
									$result2 = $con->query($sql2);
									foreach ($result2 as $r2) {
										$booking_date = $r2['booking_date'];
										$booking_time = $r2['booking_time'];
										$booking_name = $r2['name'];
										$booking_phone = $r2['phone'];
									} ?>
								<div class="bill-info">
									<div class="row">
										<div class="col-md-6">
											<div class="bill-to">
												<p class="h5 mb-xs text-dark text-semibold">To:</p>
												<address>
													<?php echo $booking_name; ?>
													<br/>
													Phone: +91 <?php echo $booking_phone; ?>
												
												</address>
											</div>
										</div>
										<div class="col-md-6">
											<div class="bill-data text-right">
												<p class="mb-none">
													<span class="text-dark">Booking Date:</span>
													<span class="value"><?php echo $booking_date; ?></span>
												</p>
												<p class="mb-none">
													<span class="text-dark">Booking Time:</span>
													<span class="value"><?php echo $booking_time; ?></span>
												</p>
											</div>
										</div>
									</div>
								</div>
								<div class="bill-info">
									<div class="row">
										<div class="col-md-6">
											<div class="bill-to">
												<p class="h5 mb-xs text-dark text-semibold">Table & chair:</p>
												<address>
													<?php 
													$booking_number = $_GET['booking-number'];
													$sql3 = "SELECT bc.booking_id,bc.chair_no,rt.table_name
														FROM booking_chair as bc, restaurant_chair as rc,restaurant_tables as rt
														WHERE bc.chair_id = rc.id
														AND rc.tbl_id = rt.id
														and bc.booking_id ='$booking_number';";
													$result3 = $con->query($sql3);
													foreach ($result3 as $r3) {
													?>
													<?php echo $r3['chair_no']; ?>, 
													<?php  } ?>
												</address>
											</div>
										</div>
									</div>
								</div>
								<div class="table-responsive">
									<table class="table invoice-items">
										<thead>
											<tr class="h4 text-dark">
												<th id="cell-id"     class="text-semibold">#</th>
												<th id="cell-item"   class="text-semibold">Item Name</th>
												<th id="cell-price"  class="text-left text-semibold">Price</th>
												<th id="cell-qty"    class="text-center text-semibold">Quantity</th>
												<th id="cell-total"  class="text-center text-semibold">Subtotal</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											$booking_number = $_GET['booking-number'];
											$sql4 = "SELECT bm.booking_id,bm.qty,mi.item_name,mi.price
												FROM booking_menus as bm, menu_item as mi
												WHERE bm.item_id = mi.id
												AND bm.booking_id ='$booking_number';";
											$result4 = $con->query($sql4);
											$count = 1;
											$grand_total = 0;
											foreach ($result4 as $r4) {
											$grand_total = $grand_total + $r4['price'] * $r4['qty'];
											?>
											<tr>
												<td><?php echo $count; ?></td>
												<td class="text-semibold text-dark"><?php echo $r4['item_name']; ?></td>
												<td><?php echo $r4['price']; ?> ₹</td>
												<td class="text-center"><?php echo $r4['qty']; ?></td>
												<td class="text-center">
												<?php echo $subtotal= $r4['price'] * $r4['qty']; ?> ₹
												</td>
											</tr>
											<?php $count++; } ?>
										</tbody>
									</table>
								</div>
							
								<div class="invoice-summary">
									<div class="row">
										<div class="col-sm-4 col-sm-offset-8">
											<table class="table h5 text-dark">
												<tbody>
													<tr class="h4">
														<td colspan="2">Grand Total</td>
														<td class="text-left"><?php echo $grand_total; ?> ₹</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>

							<div class="text-right mr-lg">	
							</div>
						</div>
					</section>

					<!-- end: page -->
				</section>
			</div>

			<?php include 'template/right-bar.php'; ?>
		</section>

		<!-- Vendor -->
		<script src="assets/vendor/jquery/jquery.js"></script>
		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>

	</body>
</html>