<?php
session_start();
if(!isset($_SESSION['username'])){
	header('location:signup.php');
}


?>

<!DOCTYPE html>
<html>
<head>
<title> Home page for user
</title>
<?php include 'link.php' ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/yourcode.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="./css/home.css">
</head>
<body>
<div class = "welcome">
	

<h1> WELCOME <?php echo $_SESSION['username'] ; ?> this is your home page <button class ="btnregister btn1"> <a href="logout.php">Log Out ?</a></button>  </h1>

<h2> This id all the information you have provided !! <h2>
</div>

<div class="home">
 
  <div class="pic">
      
	<h3> hi <?php echo$_SESSION['fullname'];?> </h3>
	<img src="<?php echo $_SESSION['photo']; ?>" width = "200" height="200">
  </div>

  <br>
  <a href="update.php?id=<?php echo$_SESSION['id']; ?>"><i class="fa fa-address-book fa-2x" aria-hidden="true"></i></a>
  <div class = "info">
	<p1> Registration ID : <?php echo$_SESSION['id'];?>  </p1>
	<br><br>
    <p1> Full Name  :   <?php echo$_SESSION['fullname'];?>  </p1>
	<br>
	<br>
    <p1> Mobile No  :   <?php echo$_SESSION['phno']  ;?> </p1>
    <br><br>
	<p1> College Name  :  <?php echo$_SESSION['college'] ;?> </p1>
    <br><br>
    <p1> Major  :   <?php echo$_SESSION['major'] ;?> </p1>
    <br><br>
    <p1> Email ID :    <?php echo$_SESSION['email'] ;?> </p1>
    <br><br>
    <p1> Work Experience :  <?php echo $_SESSION['work'] ;?> </p1>
	<br>
	<br>
  </div>




</div>






</body>