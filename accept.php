
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
    <div class="Apage">
    <?php
    include('functions.php');
    $id = $_GET['id'];
    $query = "select * from `requests` where `id` = '$id'; ";
    if(count(fetchAll($query)) > 0){
        foreach(fetchAll($query) as $row){
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $email = $row['email'];
            $password = $row['password'];
            $query = "INSERT INTO `accounts` (`id`, `firstname`, `lastname`, `email`, `type`, `password`) VALUES (NULL, '$firstname', '$lastname', '$email', 'user', '$password');";
        }
        $query .= "DELETE FROM `requests` WHERE `requests`.`id` = '$id';";
        if(performQuery($query)){
            echo "<h2>Account has been accepted.</h2>";
        }else{
            echo "Unknown error occured. Please try again.";
        }
    }else{
        echo "Error occured.";
    }
    
?>
<img src="./images/accept.png">
<a href="home.php"><button class="back">Back</button></a>
    </div>
</body>
</html>