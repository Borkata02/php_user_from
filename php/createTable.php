<?php
					include "config.php";
					$tableName = "users";
					$sqlCheck = "SHOW TABLES LIKE '$tableName'";
					$result = $conn->query($sqlCheck);
					if ($result->num_rows > 0) {
						echo "Table '$tableName' already exists\n";
					} else {
						$sql = "CREATE TABLE users (
						id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
						username VARCHAR(200) NOT NULL,
						email VARCHAR(200) NOT NULL,
                        phone VARCHAR(50) NOT NULL,
                        password VARCHAR(200) NOT NULL    
						)";
					if (mysqli_query($conn, $sql)) {
						echo "Table 'users' created successfully\n";
					} else {
						echo 'Error creating table: ' . mysqli_error($conn) . "\n";
					}
						mysqli_close($conn);
					}
				?>