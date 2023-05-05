<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="homeStyle.css">
</head>
<body>


	
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

   
		<div id="header">
        <div class="container">
            <nav>
                <ul>
                    <li><a href="#header">Home</a></li>
                    <li><a href="#about">What is?</a></li>
                    <li><a href="#picks">My calculation</a></li>
                    <li><a href="#contact">Donate</a></li>
                </ul>
            </nav>
            <div class="header-text">
                <h1>Allah Made Zakat <br> <span>Obligatory</span> </h1>

            </div>
        </div>
    </div>
    <!----------about---------->
    <div id="about">
        <div class="container">
            <div class="row">
                <div class="about-col-1">
                    <img src="images/p.jpg" alt="">
                </div>
                <div class="about-col-2">
                    <h1 class="sub">What is?</h1>
                    <p>Zakat is an Islamic finance term referring to the obligation that an individual has to donate a
                        certain proportion of wealth each year to charitable causes. Zakat is mandatory for all Muslims
                        in most countries and is considered to be a form of worship. Giving away money to the poor is
                        said to purify yearly earnings that are over and above what is required to provide a person and
                        their family with their essential needs.<br>Zakat is based on income and the value of
                        possessions. The common minimum amount for those who qualify is 2.5% or 1/40 of a Muslim's total
                        savings and wealth. </p>
                </div>
            </div>
        </div>
    </div>
    <!-----------my picks-->
    <div id="picks">
        <div class="container">
            <div class="row">
                <div class="about-col-1">
                    <img src="images/calculation.jpg" alt="">

</div>

                <div class="about-col-2">
                <h1>My Calculations</h1>
            
            <form method="post">
		<label for="gold">Value of Gold (in grams):</label>
		<input type="number" name="gold" id="gold" required><br><br>
		
		<label for="silver">Value of Silver (in grams):</label>
		<input type="number" name="silver" id="silver" required><br><br>

		<label for="cash">Value of Cash on Hand (in BDT):</label>
		<input type="number" name="cash" id="cash" required><br><br>

		<button type="submit" name="submit">Calculate Zakat</button><br> 
        <?php
        $zakat=" ";
if(isset($_POST['submit'])) {
	$gold = $_POST['gold'];
	$silver = $_POST['silver'];
	$cash = $_POST['cash'];

	$total_wealth = $gold + $silver + $cash;

	if($total_wealth >= 85 * 14) {
		$zakat = $total_wealth * 0.025;
        
	} else {
        $zakat=0;
	
	}
}

?>
        <label for="result">Your zakat is :<label>
            <input type = "text" name ="result" value="<?php echo $zakat; ?> ">
        
	</form>
  
        </div>
    </div>
    </div>
    <!------------Contact---------->
    <div id="contact">
        <div class="container">
            <div class="row">
                <div class="about-col-1">
                    <img src="images/donation-1.jpg" alt="">
                    </div>
                    
                    <div class="about-col-2">
                        <h1>Make Donation</h1>
           
        <form action="userinfo.php" method="post">
                <div class="form-group">
                    <label> username</label>
                    <input type="text" name="user" autocomplete="off
                    " class="form-control">
                </div>
                <div class="form-group">
                    <label> Email</label>
                    <input type="text" name="email" autocomplete="off
                    " class="form-control">
                </div>
                <div class="form-group">
                    <label> Amount</label>
                    <input type="text" name="amount" autocomplete="off
                    " class="form-control">
                </div>
                <div class="form-group">
                    <label> Message </label>
                    <textarea class="form-control" name="message"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form> 
            
		
		 <!-- logged in user information -->
		 <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>

</body>
</html>