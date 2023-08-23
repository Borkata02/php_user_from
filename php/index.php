<?php 
   session_start();
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
    <div class="container">
        <div class="form">
        <?php 

            include "config.php";
            if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
                
                $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE username = ?");
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);
            
                $result = mysqli_stmt_get_result($stmt);
                $row = mysqli_fetch_assoc($result);
            
                if(is_array($row) && password_verify($password, $row['password'])){
                    $_SESSION['valid'] = $row['email'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['age'] = $row['age'];
                    $_SESSION['id'] = $row['id'];
                    header("Location: home.php");
                    exit();
                } else {
                    echo "<div class='message'>
                         <p>Wrong Username or Password</p>
                         <a href='index.php'><button class='gbtn'>Go Back</button></a>
                      </div> <br>";
                }
            }


        ?>
            <h1>Login</h1>
            <form action="" method="POST">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" required> 
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Login" required> 
                </div>
                
                <div class="link">
                    Don't have account? <a href="register.php">Sign up.</a>
                </div>
                
            </form>
        </div>
    </div>
</body>
</html>