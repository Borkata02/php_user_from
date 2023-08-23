<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="form">
            <?php
                include "config.php";
                if(isset($_POST['submit'])){
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $password = $_POST['password'];

                    $verify_query = mysqli_query($conn,"SELECT email FROM users WHERE email='$email'");

                    if(mysqli_num_rows($verify_query) !=0 ){
                       echo "<div class='message'>
                                 <p>This email is used, Try another One Please!</p>
                             </div> <br>";
                       echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
                    }
                    else{
                        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                        $sql = "INSERT INTO users (username, email, phone, password)
		VALUES ('$username', '$email', '$phone', '$hashedPassword')";
		$result = mysqli_query($conn,$sql);
		if (!$result)
		{
			die('Error!');
		}
		else {
			echo "  <p class='messagegreen'> Registration successful!.<br>";
            echo "<a href='index.php'><button class='btn'>Log in</button></a>";
		}

		$conn->close();
    }
		
                }
            ?>
            <h1>Sign Up</h1>
            <form id="regform" action="register.php" method="POST">
                <div class="field input">
                    <label for="username">Username</label>
                <input type="text" name="username" id="username" required> 
                </div>
               
                <div class="field input">
                    <label for="email">Email</label>
                <input type="text" name="email" id="email" required> 
                </div>

                <div class="field input">
                    <label for="phone">Phone</label>
                <input type="number" name="phone" id="phone" required> 
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
                </div>

                <div class="field input">
                    <label for="cpassword">Confrim Password</label>
                <input type="password" name="cpassword" id="cpassword" required>
                </div>

                <div class="field">
                   <input type="submit" class="btn" name="submit" value="Sign Up"  required> 
                </div>

                <div class="link">
                    Already have an account? <a href="index.php">Sign in.</a>
                </div>

            </form>
        </div>
    </div>

   <script src="../js/index.js"></script>
</body>
</html>