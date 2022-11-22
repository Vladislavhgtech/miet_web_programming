<?php 

// подключаемся к БД

$connect=mysqli_connect("localhost", "root", "", "miet") or die("Error");

// $query=mysqli_query($connect, "SELECT * FROM users");

// while($row = mysqli_fetch_assoc($query)) echo "<h1>".$row['passport']."</h1><p>".$row['email']."</p><br>";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP search</title>
</head>
<body>
    <form method="post">
        <input type="text" name="search" class="search"><input type="submit" name="submit" value="поиск">
    </form>

    
<!-- Осуществляем поиск-->
 <!-- если нажата кнопка SUBMIT, то создаётся переменная в которую помещаются объеты и БД, удовлетворяющие условию -->
    <?php
    
   
      if (isset($_POST['submit'])){
        $search=$_POST['search'];
        $query=mysqli_query($connect, "SELECT * FROM users WHERE passport LIKE '%$search%' ");
        while($row = mysqli_fetch_assoc($query)) echo "<h1>".$row['passport']."</h1><p>".$row['email']."</p><br>";
      }

      ?>




</body>
</html>