<!-- choose-table.php -->
<?php
if (isset($_POST['reservation'])) {


  $res_id = $_POST['res_id'];
  $reservation_name = $_POST['reservation_name'];
  $reservation_phone = $_POST['reservation_phone'];
  $reservation_date = $_POST['reservation_date'];
  $reservation_time = $_POST['reservation_time'];

include 'template/header.php'; ?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <body style="background-image:url('images/squares.png')">

   <?php include 'template/nav-bar.php'; ?>
    <!-- END nav -->

    <section class="home-slider owl-carousel" style="height: 400px;">
      <div class="slider-item" style="background-image: url('images/bg-1.jpg');" data-stellar-background-ratio="0.1">
        <div class="overlay"></div>
        <div class="container">
          <div class="row slider-text align-items-center justify-content-center">
            <div class="col-md-10 col-sm-12 ftco-animate text-center" style="padding-bottom: 25%;">
              <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Tables</span></p>
              <h1 class="mb-3">Choose Tables</h1>
            </div>
          </div>
        </div>
      </div>
    </section>



    <section class="ftco-section"  >
      <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <span class="subheading">Our Tables</span>
            <h2>Choose Your Table</h2>
          </div>
        </div>

        <form action="select-menu.php" method="POST">
          <div class="row">
            <div class="col-md-12 dish-menu">
              <div class="tab-content py-5" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                  <div class="row">
                      <?php
                        include 'dbCon.php';
                        $con = connect();
                        $sql = "SELECT * FROM `restaurant_tables` WHERE res_id = '$res_id';";
                        $result = $con->query($sql);
                        foreach ($result as $r) {
                          $table_id = $r['id'];
                      ?>
                      <div class="col-lg-3" style="min-height: 190px">
                        <p style="font-weight: bold; padding: ">Table <?php echo @$i += 1 ?></p>
                        <nav class="menu2">
                          <input type="checkbox" id="restTable<?php echo $table_id; ?>" name="table[]" value="<?php echo $table_id; ?>" class="menu-toggler2 restTable"  data-id="<?php echo $table_id; ?>">
                          <label for="menu-toggler2"></label>
                          <ul>
                            <?php
                              $sql2 = "SELECT * FROM `restaurant_chair` WHERE tbl_id = '$table_id';";
                              $result2 = $con->query($sql2);
                              foreach ($result2 as $r2) {
                                $c_id = $r2['id'];
                                $booked = false;
                                $cbbook = "SELECT bc.id,bc.booking_id,bc.chair_id,bc.chair_no,bd.booking_id,bd.res_id,bd.booking_date,bd.booking_time
                                  FROM booking_chair as bc, booking_details as bd
                                  WHERE bc.booking_id = bd.booking_id
                                  AND bd.res_id = '$res_id'
                                  AND bd.booking_date = '$reservation_date'
                                  AND bd.booking_time ='$reservation_time'
                                  AND bc.chair_id = '$c_id';";
                                $cbbookresult = $con->query($cbbook);
                                if ($cbbookresult->num_rows > 0) {
                                  $booked = true;
                                }
                                if ($booked == true) {
                                ?>
                            <li class="menu-item2">
                              <input type="checkbox"  disabled="">
                            </li>
                                <?php } else{ ?>
                            <li class="menu-item2">
                              <input type="checkbox" name="chair[]" id="chair" value="<?php echo $r2['id']; ?>">
                            </li>
                                <?php } ?>
                            <?php } ?>
                          </ul>
                        </nav>
                      </div>
                      <?php } ?>
                      <div class="col-lg-12" style="margin-top: 15%;text-align: center;">
                        <div class="form-group">
                          
                          <input type="hidden" name="res_id" value="<?php echo $res_id; ?>">
                          <input type="hidden" name="reservation_name" value="<?php echo $reservation_name; ?>">
                          <input type="hidden" name="reservation_phone" value="<?php echo $reservation_phone; ?>">
                          <input type="hidden" name="reservation_date" value="<?php echo $reservation_date; ?>">
                          <input type="hidden" name="reservation_time" value="<?php echo $reservation_time; ?>">
                          <p style="text-align: center;"  id="viewMenu">
                          <input type="submit" value="View Menu" name="selectChair" class="btn btn-primary py-3 px-5" >
                        </p>
                        </div>
                      </div>
                </div><!-- END -->
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>

    <?php include 'template/instagram.php'; ?>

    <?php include 'template/footer.php'; ?>

    <?php include 'template/script.php'; ?>

  </body>
</html>
<?php }else{

}
?>

<script type="text/javascript">
  // $(".restTable").click(function() {
  //   // body...
  //   var id = $(this).data("id");
  //   var tbl = document.getElementById("restTable"+id);
  //    var btnmenu = document.getElementById("viewMenu");

  //   // alert(tbl.checked);

  //    if (tbl.checked == true){
  //        btnmenu.style.display = "block";
  //     } else {
  //        btnmenu.style.display = "none";
  //     }

  // });

  $(document).ready(function(){
  $('input[type="checkbox"]').click(function(){
      // alert($('.menu:checked').length);

     var btnmenu = document.getElementById("viewMenu");
     var maxchecked = $('#chair:checked').length;
     // alert(maxchecked)
      if (maxchecked > 0 ) {
         btnmenu.style.display = "block";
      } else {
         btnmenu.style.display = "none";
      }


  });
});
</script>
