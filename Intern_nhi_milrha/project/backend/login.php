<?php

session_start();

?>


<!DOCTYPE html>
<html>
<head>
<title> login page for my website
</title>
<?php include 'link.php' ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="./css/log_in.css">
</head>
<body>

<?php

include 'connection.php';
if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $email_search = "select * from jobregistration where email = '$email' ";
    $query = mysqli_query($con,$email_search);
    $email_count = mysqli_num_rows($query);

    if($email_count)
    {
        $email_pass = mysqli_fetch_assoc($query);
        $db_pass = $email_pass['password'];
        $_SESSION['id']  = $email_pass['id'];
        $_SESSION['photo'] = $email_pass['photo'];
        $_SESSION['username'] = $email_pass['username'];
        $_SESSION['fullname'] = $email_pass['fullname'];
        $_SESSION['email'] = $email_pass['email'];
        $_SESSION['phno'] = $email_pass['phno'];
        $_SESSION['major'] = $email_pass['major'];
        $_SESSION['college'] = $email_pass['college'];
        $_SESSION['work'] = $email_pass['work'];
        





        $pass_decode = password_verify($password, $db_pass);

        if($pass_decode){

            ?>
            <script>
                location.replace("home.php");
            </script>
            <?php
        }else{
            ?>
            <script>
                alert(' Wrong Password !!');
            </script>
            <?php
        }



    }else{
        ?>
        <script>
            alert('User Not found !!  plz Go to registration page .');
        </script>
        <?php
    }




}

?>



<h1> This is my login page </h1>
<div class = "container">
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method = "POST" class="form">
        <div class="form-group">
            <label><i class="fa fa-user" aria-hidden="true"></i>enter Email as Username<label>
            <br>
        </div>
        <div>
            <input type="text" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label><i class="fa fa-lock" aria-hidden="true"></i>Password<label>
                <br>
        </div>
        <div>
            <input type="text" name="password" class="form-control">

        </div>

        
        <div class="button">
        <input type="submit" class="btnregister" name="submit" value="LogIn" required/>
        </div>
    </form>
    

    <div class="transfer">
        <p>Not have an account ?</p>
    <a class="signup" href="http://localhost/Intern_nhi_milrha/project/backend/signup.php">Sign up?</a>
    <p>Forgot your Password ? </p>
    <a href="recover_email.php">clik here </a>
    </div>
</div>

</body>
</html>