<!DOCTYPE html>
<html>
<head>
<title> sign up page for my website
</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="./css/signup.css">
</head>
<body>

<h1> This is my Signup page </h1>
<div class = "container">
    <form action="" method = "POST" class="form" enctype="multipart/form-data">
        <div class="form-group">
            <label>username<label>
            <br>
        </div>
        <div>
            <input type="text" name="user" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Password<label>
                <br>
        </div>
        <div>
            <input type="text" name="password" class="form-control" required>

        </div>

        <div class="form-group">
            <label>Full Name<label>
                <br>
        </div>
        <div>
            <input type="text" name="name" class="form-control" required>

        </div>

        <div class="form-group">
            <label>Email<label>
                <br>
        </div>
        <div>
            <input type="text" name="mail" class="form-control" required>

        </div>

        <div class="form-group">
            <label>Ph No. <label>
                <br>
        </div>
        <div>
            <input type="text" name="phno" class="form-control" required>

        </div>

        <div class="form-group">
            <label>Major<label>
                <br>
        </div>
        <div>
            <input type="text" name="major" class="form-control" required>

        </div>

        <div class="form-group">
            <label>College Name<label>
                <br>
        </div>
        <div>
            <input type="text" name="collegename" class="form-control" required>

        </div>

        <div class="form-group">
            <label>Work Experience<label>
                <br>
        </div>
        <div>
            <input type="text" name="workexperience" class="form-control" required>

        </div>
        <div class="form-group">
            <label>Upload Your photo<label>
                <br>
        </div>
        <div>
            <input type="file" name ="photo" class="form-control" required>

        </div>

        <div class="button">
        <input type="submit" class="btnregister" name="submit" value="register"/>
        </div>
    </form>
   
    <div class="transfer">
        <p>Already have an account ?<a class="login" href="http://localhost/Intern_nhi_milrha/project/backend/login.php">Login ?</a>
    </div>
</div>

</body>
</html>

<?php

include 'connection.php';
if(isset($_POST['submit'])){

    $user = $_POST['user'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $phno = $_POST['phno'];
    $major = $_POST['major'];
    $collegename = $_POST['collegename'];
    $workexperience = $_POST['workexperience'];
    $photo = $_FILES['photo'];
    print_r($photo);

    $pass = password_hash($password,PASSWORD_BCRYPT);

    $filename = $photo['name'];
    $filepath = $photo['tmp_name'];
    $fileerror = $photo['error'];
    echo $filename;


    $emailquery = "select * from jobregistration where email = '$mail' ";
    $query = mysqli_query($con,$emailquery);
    $emailcount = mysqli_num_rows($query);

    if($emailcount > 0)
    {
        ?>
        <script>
            alert('Email already exists !!');
        </script>
        <?php
    }else{
        if($fileerror==0){
        $destinationfile = 'upload/'.$filename;
        move_uploaded_file($filepath, $destinationfile);


        $insertquery = " insert into jobregistration(photo,username,password,fullname,email,phno,major,college,work)
        values('$destinationfile','$user','$pass','$name','$mail','$phno','$major','$collegename','$workexperience') ";
    
        $res = mysqli_query($con,$insertquery);
        
    if($res){

        ?>
        <script>
            alert('data updated !!');
        </script>
        <?php

    }else{

        ?>
        <script>
            alert('data not updated!!');
        </script>
        <?php
    }

    }
        
    }
    
   



}


?>




