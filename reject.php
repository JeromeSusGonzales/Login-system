
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="./css/style1.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
    <div class="Rpage"> 
    <?php
    include('functions.php');
    $id = $_GET['id'];
    
    $query = "DELETE FROM `requests` WHERE `requests`.`id` = '$id';";
        if(performQuery($query)){
            echo "<h2>Account has been rejected.</h2>";
        }else{
            echo "Unknown error occured. Please try again.";
        }

?>
<img src="./images/reject.png">
<a href="home.php"><button class="back">Back</button></a>
    </div>
</body>
</html>
