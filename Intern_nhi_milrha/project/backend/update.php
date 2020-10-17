<!DOCTYPE html>
<html>
<head>
<title> sign up page for my website
</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="./css/signup.css">
</head>
<body>

<h1> Update your data </h1>
<div class = "container">
 <form action="" method = "POST" class="form" enctype="multipart/form-data">
    <div class="registrationform">

                                            
                <?php

                        include 'connection.php';

                        $ids = $_GET['id'];
                        $showquery = "select * from jobregistration where id =($ids)";
                        $showdata = mysqli_query($con , $showquery);
                        $arraydata = mysqli_fetch_array($showdata);


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

                            $pass = password_hash($password,PASSWORD_BCRYPT);

                            $filename = $photo['name'];
                            $filepath = $photo['tmp_name'];
                            $fileerror = $photo['error'];
                            

                                $idupdate = $_GET['id'];
                                if($fileerror==0){
                                $destinationfile = 'upload/'.$filename;
                                move_uploaded_file($filepath, $destinationfile);


                                $query = " update jobregistration set username='$user',password='$pass',fullname='$name',college='$collegename'
                                ,phno='$phno',work='$workexperience',email='$mail',photo='$destinationfile',major='$major' where id=$idupdate";
                            
                                $res = mysqli_query($con,$query);
                                
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


                ?>





        <div class="form-group">
            <label>username<label>
            <br>
        </div>
        <div>
            <input type="text" name="user" value="<?php echo$arraydata['username']; ?>" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Password<label>
                <br>
        </div>
        <div>
            <input type="text" name="password" value="<?php echo$arraydata['password']; ?>"class="form-control" required>

        </div>

        <div class="form-group">
            <label>Full Name<label>
                <br>
        </div>
        <div>
            <input type="text" name="name" value="<?php echo$arraydata['fullname']; ?>"class="form-control" required>

        </div>

        <div class="form-group">
            <label>Email<label>
                <br>
        </div>
        <div>
            <input type="text" name="mail" value="<?php echo$arraydata['email']; ?>"class="form-control" required>

        </div>

        <div class="form-group">
            <label>Ph No. <label>
                <br>
        </div>
        <div>
            <input type="text" name="phno" value="<?php echo$arraydata['phno']; ?>"class="form-control" required>

        </div>

        <div class="form-group">
            <label>Major<label>
                <br>
        </div>
        <div>
            <input type="text" name="major" value="<?php echo$arraydata['major']; ?>"class="form-control" required>

        </div>

        <div class="form-group">
            <label>College Name<label>
                <br>
        </div>
        <div>
            <input type="text" name="collegename" value="<?php echo$arraydata['college']; ?>"class="form-control" required>

        </div>

        <div class="form-group">
            <label>Work Experience<label>
                <br>
        </div>
        <div>
            <input type="text" name="workexperience" value="<?php echo$arraydata['work']; ?>"class="form-control" required>

        </div>
        <div class="form-group">
            <label>Upload Your photo<label>
                <br>
        </div>
        <div>
            <input type="file" name ="photo" class="form-control" required>

        </div>

        <div class="button">
        <input type="submit" class="btnregister" name="submit" value="Update Data"/>
        </div>
    <div>
 </form>
   
    <div class="transfer">
        <p>Already have an account ?<a class="login" href="http://localhost/Intern_nhi_milrha/project/backend/login.php">Login ?</a>
    </div>
</div>

</body>
</html>





