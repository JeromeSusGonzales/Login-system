<?php
    session_start();  
    include("./functions.php");
    if($_SESSION['login']!==true){
        header('location:login.php');
    }
?>
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
  <div class="sidebar">
    <div class="logo-details">
      <i class = 'bx bx-bell icon'></i>
        <div class="logo_name">Admin</div>
        <i class="bx bx-menu" id="btn"></i>
    </div>
    <ul class="nav-list">
      <li>
        <a href="#">
          <i class='bx bx-user-voice' ></i>
          <span class="links_name">Requests</span>
        </a>
        <span class="tooltip">Requests</span>
      </li>
     <li class="profile">
         <div class="profile-details">
           <img src="./images/librarian.png" alt="profileImg">
           <div class="name_job">
             <div class="name"></div>
             <div class="job">Admin</div>
           </div>
         </div>
         <div class="log">
         <?php
                if(isset($_POST['logout'])){
                    session_destroy();
                    header('location:home.php');
                }
    
                ?>
        <form method="post">
         <a href="login.php" name ="logout"><i class = 'bx bx-log-out' id ="log_out"></i></a>
        </form>
        </div>
     </li>
    </ul>
  </div>
  <div class="container">
    <div class="banner">
      <div class="box">
        <h3>Pending Requests</h3>
      <?php
            
                $query = "select * from `requests`;";
                if(count(fetchAll($query))>0){
                    foreach(fetchAll($query) as $row){
                        ?>
                
                    <h1 class="email"><?php echo $row['email'] ?></h1>
                    <br>
                      <p class="message"><?php echo $row['message'] ?></p>
                      <br>
                      <small class="date"><i><?php echo $row['date'] ?></i></small>
                      <br>
                      <br>
                      <p>
                        <a href="accept.php?id=<?php echo $row['id'] ?>" ><button class="accept"> Accept</button></a>
                        <a href="reject.php?id=<?php echo $row['id'] ?>" ><button class="reject"> Reject</button></a>
                      </p>
                    <br>
                    <br>
                    <br>
            <?php
                    }
                }else{
                    echo "<h1>No Pending Requests!</h1>";
                }
            ?>
      </div>
  </div>
  </div>   
  <script src="./js/script.js"></script>
</body>
</html>