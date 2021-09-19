<!-- nav-bar.php -->
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
  	<div class="container">
	    <a class="navbar-brand" href="index.php">Be Our Guest</a>
	    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="oi oi-menu"></span> Menu
	    </button>

	    <div class="collapse navbar-collapse" id="ftco-nav">
	      <ul class="navbar-nav ml-auto">
	        <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
	        <?php if(!isset($_SESSION['isLoggedIn'])){ ?>
	         <li class="nav-item"><a href="register.php" class="nav-link">Register</a></li>
	       	 <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
	        <?php }elseif (isset($_SESSION['isLoggedIn'])) { ?>
	        <li class="nav-item"><a href="logout.php" class="nav-link"><?php echo $_SESSION['name']; ?>(Logout)</a></li>
	        <?php } ?>
	      </ul>
	    </div>
  	</div>
</nav>