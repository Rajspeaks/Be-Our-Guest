<!-- restaurant-list.php -->

<?php 
if (isset($_POST['find'])) {
  $area_id = $_POST['area'];

                        include 'dbCon.php';
  include 'template/header.php'; ?>
  <body>
    
   <?php include 'template/nav-bar.php'; ?>
    <!-- END nav -->
    
    <section class="home-slider owl-carousel" >
      <div class="slider-item" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
          <div class="row slider-text align-items-center justify-content-center">
            <div class="col-md-10 col-sm-12 ftco-animate text-center" >
              <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Restaurants</span></p>
              <h1 class="mb-3">Restaurants List</h1>
            </div>
          </div>
        </div>
      </div>


    </section>

  <div class="ftco-section-reservation"   >
      <div class="container">
        <div class="row">
          <div class="col-md-12 reservation pt-5 px-5">
              <p style="font-size: 20px; color: #000;font-weight: bold;margin-top: -30px">Make a Reservation</p>
            <div class="block-17" style="min-height: 100px;">
              
              <form action="restaurant-list.php" method="POST" class="d-block d-lg-flex">
                <div class="fields d-block d-lg-flex">
                  <p style="font-size: 20px;color: #000">City</p>
                  <div class="select-wrap one-half">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                    <select name="location" id="" class="form-control" disabled="">
                      <option value="Kolkata">Kolkata</option>
                    </select>
                  </div>
                    <p style="font-size: 20px;color: #000">Location</p>
                  <div class="select-wrap one-half">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                    <select data-plugin-selectTwo class="form-control populate" name="area" required=""  style="cursor: pointer;">
                      <option value=""> -Select- </option>
                      <?php 
                        $con = connect();
                        $sql = "SELECT * FROM `locations`;";
                        $result = $con->query($sql);
                        foreach ($result as $r) {
                      ?>
                        <option value="<?php echo $r['id']; ?>"><?php echo $r['location_name']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <input type="submit" class="search-submit btn btn-primary" name="find" value="Find">  
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    

    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <span class="subheading">Our Restaurants</span>
            <h2>Discover Our Exclusive Restaurants</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 dish-menu">

            <div class="nav nav-pills justify-content-center ftco-animate" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <a class="nav-link py-3 px-4 active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><span class="flaticon-meat"></span> Main</a>
            </div>

            <div class="tab-content py-5" id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <div class="row">
                  <?php  
                    $con = connect();
                    $sql = "SELECT * FROM `restaurant_info` WHERE location = '$area_id';";
                    $result = $con->query($sql);
                    foreach ($result as $r) {
                  ?>
                  <div class="col-lg-12">
                    <div class="menus d-flex ftco-animate">
                      <div class="menu-img" style="background-image: url(dashboard/user-image/<?php echo $r['logo']; ?>)"></div>
                      <div class="text d-flex">
                        <div class="row one-half">
                        	<div class="col-lg-12">
                          	<h3><?php echo $r['restaurent_name']; ?></h3>
                      		</div>
                          <div class="col-lg-12">
                            <p><?php echo $r['address']; ?></p>
                          </div>
                        </div>
                        <div class="one-third">
                        	<a href="reservation.php?res_id=<?php echo $r['id']; ?>" class="btn btn-info" style="width: 100%;margin-left: 23px;margin-top: 18px;">Book Table</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php } ?>
              </div><!-- END -->
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php include 'template/instagram.php'; ?>

    <?php include 'template/footer.php'; ?>
    
    <?php include 'template/script.php'; ?>
    
  </body>
</html>
<?php 
  }else{

  }
 ?>