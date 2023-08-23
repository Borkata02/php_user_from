<?php 
   session_start();

   include "config.php";
   if(!isset($_SESSION['valid'])){
    header("Location: index.php");
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
            <a href="edit.php">Change Profile</a>
            <a href="index.php"><button class="btn">Log out</button></a>
        </div>
    </div>

    <div class="container">
        <div class="form">
        <?php 
               if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $password = $_POST['password'];

                $hashedNewPassword = password_hash($password, PASSWORD_DEFAULT);

                $id = $_SESSION['id'];

                $edit_query = mysqli_query($conn,"UPDATE users SET username='$username', email='$email', phone='$phone', password='$hashedNewPassword' WHERE id=$id ") or die("error occurred");

                if($edit_query){
                    echo "<div class='messagegreen'>
                    <p>Profile Updated!</p>
                    <a href='home.php'><button class='btn'>Go Home</button></a>
                </div> <br>";
       
                }
               }else{

                $id = $_SESSION['id'];
                $query = mysqli_query($conn,"SELECT * FROM users WHERE id=$id ");

                while($result = mysqli_fetch_assoc($query)){
                    $username = $result['username'];
                    $email = $result['email'];
                    $phone = $result['phone'];
                    $password = $result['password'];
                }
            ?>
            <h1>Change Profile</h1>
            <form action="" method="POST">
                <div class="field input">
                    <label for="username">Username</label>
                <input type="text" name="username" id="username" value="<?php echo $username; ?>" autocomplete="off" required> 
                </div>
               
                <div class="field input">
                    <label for="email">Email</label>
                <input type="text" name="email" id="email" value="<?php echo $email; ?>" autocomplete="off" required> 
                </div>

                <div class="field input">
                    <label for="phone">Phone</label>
                <input type="number" name="phone" id="phone" value="<?php echo $phone; ?>" autocomplete="off" required> 
                </div>

                <div class="field input">
                    <label for="phone">Password</label>
                <input type="password" name="password" id="password"  autocomplete="off" required>
                </div>

                <div class="field">
                   <input type="submit" class="btn" name="submit" value="Update" required> 
                </div>

            </form>
        </div>
        <?php } ?>
    </div>

    <script src="../js/index.js"></script>
</body>
</html>