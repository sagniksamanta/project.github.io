<?php
 $username = "root";
 $password = "";
 $server = 'localhost';
 $db = 'login';
 $con = mysqli_connect($server,$username,$password,$db);

 if($con)
 {
     ?>
     <script>
         alert('Connection Successful !!');
     </script>
     <?php
 }else{
    ?>
    <script>
        alert(' Not Connected !!');
    </script>
    <?php
 }



?>