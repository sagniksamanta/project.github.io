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

    $email_search = "select * from jobregistration where email = '$email' ";
    $query = mysqli_query($con,$email_search);
    $email_count = mysqli_num_rows($query);

    if($email_count)
    {   
        $userdata = mysqli_fetch_array($query);
        $username = $userdata['username'];
        $id = $userdata['id'];

       
        
        $subject = "Password Reset !!";
        $body = "Hi, $username this mail is send by sagnik .
        If u want to reset your password plzz click the link below ...
        http://localhost/Intern_nhi_milrha/project/backend/email.php?id=$id";
        $headers = "From: sagnik2000samanta@gmail.com";

        if (mail($email, $subject, $body, $headers)) {
                    ?>
                    <script>
                        alert(' check your email !!');
                    </script>
                    <?php
        } else {
                    ?>
                    <script>
                        alert(' unable to send mail !!');
                    </script>
                    <?php
        }




    }else{
        ?>
        <script>
            alert(' No email found in our database !!');
        </script>
        <?php
    }




}

?>



<h1> Reset your Password</h1>
<h1> Enter your Email</h1>
<div class = "container">
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method = "POST" class="form">
        <div class="form-group">
            <label><i class="fa fa-envelope" aria-hidden="true"></i>enter Email <label>
            <br>
        </div>
        <div>
            <input type="text" name="email" class="form-control" required>
        </div>
        
        <div class="button">
        <input type="submit" class="btnregister" name="submit" value="Send Mail" required/>
        </div>
    </form>
    
</div>

</body>
</html>