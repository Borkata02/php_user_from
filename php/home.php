<?php 
   session_start();

   include "config.php";
   if(!isset($_SESSION['valid'])){
    header("Location: index.php");
       exit();
    
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php">Logo</a></p>
        </div>

        <div class="right-links">
            
        <?php 

            include "config.php";
            if(isset($_SESSION['valid'])){
                $id = $_SESSION['id'];
                $query = mysqli_query($conn,"SELECT * FROM users WHERE id=$id");

                while($result = mysqli_fetch_assoc($query)){
                    $username = htmlspecialchars($result['username']);
                    $email = htmlspecialchars($result['email']);
                    $phone = htmlspecialchars($result['phone']);
                    $res_id = htmlspecialchars($result['id']);
                    
                    echo "<a href='edit.php?id=$res_id'>Change Profile</a>";
                }
            }
        ?>
            <a href="logout.php"><button class="btn">Log out</button></a>
        </div>
    </div>
    <div class="main">
        <div class="main-box top">
            <div class="top">
                
              <div class="box">
                  <p>Welcome home <?php echo "<span class='homemsg'>" . $username ." </span> "?>. </p>
              </div>
              <div class="box">
                  <p>Your email is <?php echo "<span class='homemsg'>" . $email ." </span> "?>.</p>
              </div>
            </div>
            <div class="bottom">
              <div class="box">
                  <p>Your Phone Number is <?php echo "<span class='homemsg'>" . $phone ." </span> "?>.</p> 
              </div>
            </div>
         </div>
    </div>

</body>
</html>