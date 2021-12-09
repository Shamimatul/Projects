<?php
    $msg = "";
    
	if(isset($_POST['login']))
	{
						    
			$uname = mysqli_real_escape_string($conn, $_POST["uname"]);
		    $pwd = mysqli_real_escape_string($conn, $_POST["psw"]);
		    $bank = mysqli_real_escape_string($conn, $_POST["banks"]);

		    $sql0 =  "SELECT * FROM admins WHERE username='".$uname."' AND pass='".$pwd."' AND bank='".$bank."'";
			$result = $conn->query($sql0);
		    $row = $result->fetch_assoc();

			if (($result->num_rows) > 0) {
                session_start();
		    	$_SESSION['loggedIn_id'] = $row["uid"];
	        	$_SESSION['isValid'] = true;
                $_SESSION['user_type'] = 'manager';
                //$uid = $_SESSION['loggedIn_id'];
		        header("location:./manager-page.php");
		    }
		    else {
			    $msg = "Incorrect Informations. Try again!";
                }
    }
?>