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

    $id = $_SESSION['id'];
    echo $id;
    if(isset($_SESSION['id']))
    {
       
            $newpassword = $_POST['password'];
            $repassword = $_POST['repassword'];

            $pass = password_hash($newpassword, PASSWORD_BCRYPT);

        
            

            if($newpassword == $repassword)
            {
                $updatequery = " update jobregistration set password = '$pass' where id = '$id' ";
                $isquery = mysqli_query($con, $updatequery);
                if($isquery)
                {
                    ?>
                    <script>
                        alert(' password updated !!');
                    </script>
                    <?php
                }else{
                    ?>
                    <script>
                        alert(' password not updated !!');
                    </script>
                    <?php

                }
            }else{

                ?>
                <script>
                    alert(' password not matching !!');
                </script>
                <?php
            }
        

    }


}

?>



<h1> This is your password reset page </h1>
<div class = "container">
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method = "POST" class="form">
        <div class="form-group">
            <label><i class="fa fa-lock" aria-hidden="true"></i>Enter New password<label>
            <br>
        </div>
        <div>
            <input type="text" name="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label><i class="fa fa-lock" aria-hidden="true"></i>Re-enter Password<label>
                <br>
        </div>
        <div>
            <input type="text" name="repassword" class="form-control">

        </div>

        
        <div class="button">
        <input type="submit" class="btnregister" name="submit" value="Update Password" required/>
        </div>
    </form>
    

    <div class="transfer">
        <p>Go to login page </p>
    <a class="signup" href="http://localhost/Intern_nhi_milrha/project/backend/login.php">log in ?</a>
    </div>
</div>

</body>
</html>