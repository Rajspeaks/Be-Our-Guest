<!-- select-menu.php -->
<?php 
if (isset($_POST['selectChair'])) {
  $res_id = $_POST['res_id'];
  $reservation_name = $_POST['reservation_name'];
  $reservation_phone = $_POST['reservation_phone'];
  $reservation_date = $_POST['reservation_date'];
  $reservation_time = $_POST['reservation_time'];

  $table = $_POST["table"];
  $chair = $_POST["chair"];

include 'template/header.php'; ?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <body>
    
     <?php include 'template/nav-bar.php'; ?>
    <!-- END nav -->
    
    <section class="home-slider owl-carousel" style="height: 400px;">
      <div class="slider-item" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
          <div class="row slider-text align-items-center justify-content-center">
            <div class="col-md-10 col-sm-12 ftco-animate text-center"  style="padding-bottom: 25%;">
              <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Menu</span></p>
              <h1 class="mb-3">Our Exclusive Menu</h1>
            </div>
          </div>
        </div>
      </div>
    </section>
    <form action="book.php" method="POST">
    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <span class="subheading">Our Menu</span>
            <h2>Discover Our Exclusive Menu</h2>
          </div>
        </div>
        <div class="row">
        <div class="col-md-8 dish-menu">

            <div class="nav nav-pills justify-content-center ftco-animate" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <a class="nav-link py-3 px-4 active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><span class="flaticon-meat"></span> Fast Food</a>
              <a class="nav-link py-3 px-4" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><span class="flaticon-cutlery"></span> Dessert</a>
              <a class="nav-link py-3 px-4" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false"><span class="flaticon-cheers"></span> Drinks</a>
            </div>

            <div class="tab-content py-5" id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <div class="row">
                  <div class="col-lg-12">
                    <?php 
                      include 'dbCon.php';
                      $con = connect();
                      $sql = "SELECT * FROM `menu_item` WHERE res_id = '$res_id' AND food_type = 'Fast Food';";
                      $result = $con->query($sql);
                      foreach ($result as $r) {
                    ?>
                    <div class="menus d-flex ftco-animate">
                      <div class="menu-img" style="background-image: url(dashboard/item-image/<?php echo $r['image']; ?>);"></div>
                      <div class="text d-flex">
                        <div class="one-half" style="width: calc(100% - 200px);">
                          <h3><?php echo $r['item_name']; ?></h3>
                          <p><span><?php echo $r['madeby']; ?></p>
                        </div>
                        <div class="one-forth" style="text-align: center;">
                          <span class="price"><?php echo $r['price']; ?></span><br>
                          <input type="checkbox" name="item[]" value="<?php echo $r['id']; ?>" id="menu[]"  class="menu">
                        </div>
                        <div class="one-forth" style="text-align: center;">
                          <input type="number" name="qty[]" min="1"  style="width: 100%;margin-left: 23px;margin-top: 18px;">
                        </div>
                      </div>
                    </div>
                    <?php } ?>
                  </div>
                </div>
              </div><!-- END -->

              <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                <div class="row">
                  <div class="col-lg-12">
                    <?php 
                      $sql2 = "SELECT * FROM `menu_item` WHERE res_id = '$res_id' AND food_type = 'Dessert';";
                      $result2 = $con->query($sql2);
                      foreach ($result2 as $r2) {
                    ?>
                    <div class="menus d-flex ftco-animate">
                      <div class="menu-img" style="background-image: url(dashboard/item-image/<?php echo $r2['image']; ?>);"></div>
                      <div class="text d-flex">
                        <div class="one-half">
                          <h3><?php echo $r2['item_name']; ?></h3>
                          <p><span><?php echo $r2['madeby']; ?></p>
                        </div>
                        <div class="one-forth">
                          <span class="price"><?php echo $r2['price']; ?></span><br>
                          <input type="checkbox" name="item[]" value="<?php echo $r2['id']; ?>" id="menu<?php echo $r2['id']; ?>" data-id="<?php echo $r2['id']; ?>" class="menu">
                        </div>
                        <div class="one-forth" style="text-align: center;">
                          <input type="number" name="qty[]" min="0"  style="width: 100%;margin-left: 23px;margin-top: 18px;">
                        </div>
                      </div>
                    </div>
                    <?php } ?>
                  </div>
                </div>
              </div><!-- END -->

            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                <div class="row">
                  <div class="col-lg-12">
                    <?php 
                      $sql3 = "SELECT * FROM `menu_item` WHERE res_id = '$res_id' AND food_type = 'Drink';";
                      $result3 = $con->query($sql3);
                      foreach ($result3 as $r3) {
                    ?>
                    <div class="menus d-flex ftco-animate">
                      <div class="menu-img" style="background-image: url(dashboard/item-image/<?php echo $r3['image']; ?>);"></div>
                      <div class="text d-flex">
                        <div class="one-half">
                          <h3><?php echo $r3['item_name']; ?></h3>
                          <p><span><?php echo $r3['madeby']; ?></p>
                        </div>
                        <div class="one-forth">
                          <span class="price"><?php echo $r3['price']; ?></span><br>
                          <input type="checkbox" name="item[]" value="<?php echo $r3['id']; ?>" id="menu<?php echo $r3['id']; ?>" data-id="<?php echo $r3['id']; ?>" class="menu"/>
                        </div>
                        <div class="one-forth" style="text-align: center;">
                          <input type="number" name="qty[]" min="0" value="1" style="width: 100%;margin-left: 23px;margin-top: 18px;">
                        </div>
                      </div>
                    </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
	            
          </div>
          <div class="col-md-4">
        		<h2 class="h4 mb-4">Reservation Information</h2>
            <div class="d-flex ftco-animate">
              <div class="col-md-12 flex-column">
                <div class="row d-block flex-row">
                  <div class="col mb-2 d-flex py-4 border" style="background: white;">
                    <div class="align-self-center">
                      <p class="mb-0"><span>Reservation Date:</span> <a href=""><?php echo $reservation_date; ?></a></p>
                    </div>
                  </div>
                  <div class="col mb-2 d-flex py-4 border" style="background: white;">
                    <div class="align-self-center">
                      <p class="mb-0"><span>Reservation Time:</span> <a href=""><?php echo $reservation_time; ?></a></p>
                    </div>
                  </div>
                  <div class="col mb-2 d-flex py-4 border" style="background: white;">
                    <div class="align-self-center">
                      <p class="mb-0"><span>Table No:</span>
                      <?php for($p = 0; $p < count($_POST["table"]); $p++){
                        $t_id = $_POST['table'][$p];  
                        $sql4 = "SELECT * FROM `restaurant_tables` WHERE id = '$t_id';";
                        $result4 = $con->query($sql4);
                        foreach ($result4 as $r4) {
                      ?>  
                       <a style="color: #FFB911;"><?php echo $r4['table_name']; ?></a>
                      <?php } } ?>
                      </p>
                      <p class="mb-0"><span>Chair No:</span>
                        <?php for($q = 0; $q < count($_POST["chair"]); $q++){
                        $c_id = $_POST['chair'][$q];  
                        $sql5 = "SELECT * FROM `restaurant_chair` WHERE id = '$c_id';";
                        $result5 = $con->query($sql5);
                        foreach ($result5 as $r5) {
                        ?> 
                       <a style="color: #FFB911;"><?php echo $r5['chair_no']; ?>,</a>
                       <?php } } ?>
                      </p>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12" style="text-align: center;">
                <input type="hidden" name="res_id" value="<?php echo $res_id; ?>">
                <input type="hidden" name="reservation_name" value="<?php echo $reservation_name; ?>">
                <input type="hidden" name="reservation_phone" value="<?php echo $reservation_phone; ?>">
                <input type="hidden" name="reservation_date" value="<?php echo $reservation_date; ?>">
                <input type="hidden" name="reservation_time" value="<?php echo $reservation_time; ?>">
                <?php for($r = 0; $r < count($_POST["table"]); $r++){
                        $tbl_id = $_POST['table'][$r]; ?>
                <input type="hidden" name="table[]" value="<?php echo $tbl_id; ?>">
                <?php } for($s = 0; $s < count($_POST["chair"]); $s++){ 
                        $chr_id = $_POST['chair'][$s]; ?>
                <input type="hidden" name="chair[]" value="<?php echo $chr_id; ?>">
                <?php } ?>
                <p style="display: none" id="confirm"><input type="submit" value="Confirm" name="confirm" class="btn btn-primary py-3 px-5" ></p>
                
              </div>
          </div>
      </div>
    </section>
    </form>

    <?php include 'template/instagram.php'; ?>

    <?php include 'template/footer.php'; ?>
    
    <?php include 'template/script.php'; ?>
    
  </body>
</html>
<?php } ?>

<script type="text/javascript">
 
$(document).ready(function(){
  $('input[type="checkbox"]').click(function(){
      // alert($('.menu:checked').length);

     var btnconfirm = document.getElementById("confirm");
     var maxchecked = $('.menu:checked').length;
     // alert(maxchecked) 
      if (maxchecked > 0 ) {
         btnconfirm.style.display = "block";
      } else {
         btnconfirm.style.display = "none";
      } 


  });
});

 </script>