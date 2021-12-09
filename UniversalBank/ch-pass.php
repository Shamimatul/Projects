<?php
    session_start();
    if(!isset($_SESSION['loggedIn_id']))
    {
        header("location:./index.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Univeral Bank</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="CSS/style.css">
</head>
<body style="background-image: linear-gradient(#0A707D,white)">
	<?php
        include_once("connection.php");
        include("header.php");
        include("navbar.php");
        $uid = $_SESSION['loggedIn_id'];
        $sql0 =  "SELECT * FROM users WHERE uid = '".$uid."'";
        $result = $conn->query($sql0);
        $row = $result->fetch_assoc();
        $name = $row['fname'];
        $bank = $row['bank'];
        $pass = $row['pass'];
    
    ?>
    <div class="flex-item-1">
        <div class="flex-item">
            <h1 style="padding:10px 10px"><?php echo $name; ?> </h1>
            <h2> Bank Name : <?php echo $bank; ?></h2>
             
        </div>
    </div>
    <div class="flex-item-1" style="padding: 20px">
       <form method="post">
        <h2>Change Password</h2>
        <table>
            <tr>
                <td>
                    <h3>Old Password</h3>
                </td>
                <td style="padding: 0px 20px 0px 0px">
                    <h3><input type="password" name="old_pass" placeholder="********" style="width:100%"></h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>New Password</h3>
                </td>
                <td style="padding: 0px 20px 0px 0px">
                    <h3><input type="password" name="new_pass1" placeholder="********" style="width:100%"></h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>Confirm New Password</h3>
                </td>
                <td style="padding: 0px 20px 0px 0px">
                    <h3><input type="password" name="new_pass2" placeholder="********" style="width:100%"></h3>
                </td>
            </tr>
            <tr>
				<td style="padding: 20px">
				    <!--<input type="submit" name="ch_pass" value="Change">-->
				    <div style="float: right">
				    <button class="btn btn-primary btn-lg" type="submit" name="ch_pass">Submit</button>
				    </div>
				</td>
            </tr>
            <tr>
				<td colspan="2">
				    <?php
				        $msg = "";
				        if(isset($_POST['ch_pass']))
                        {
							$old_pass = $_POST['old_pass'];
                            $new_pass1 = $_POST['new_pass1'];
                            $new_pass2 = $_POST['new_pass2'];
                            if($old_pass==$pass)
                            {
                                if($old_pass != $new_pass1)
                                {
                                    $regex = "^(?=.*[a-z])(?=.*\d).{8,50}$^";
                                    if(preg_match($regex, $new_pass1))
								    {
								        if($new_pass1==$new_pass2)
								        {
												$sql = "UPDATE users SET pass = '$new_pass1' WHERE uid = '$uid';";
												$result = mysqli_query($conn,$sql);
												$msg = "<p style='color:white;background-color:green; padding: 0px 30px'>Password changed Successfully!!</p>";
								        }
								        else
								        {
												$msg = "<p style='color:white;background-color:red; padding: 0px 30px'>Confirm Password did not match!!</p>";
								        }
								    }
								    else
								    {
								        $msg = "<p style='color:white;background-color:red; padding: 0px 30px'>Password must contain<br> *At least 8 characters<br> *At least a number<br> *At least a letter</p>";
								    }
								}
								else
								{
								    $msg = "<p style='color:white;background-color:red; padding: 0px 30px'>Old Password cannot be new password</p>";
								}
				            }
				            else
				            {
								$msg = "<p style='color:white;background-color:red; padding: 0px 30px'>Password Incorrect!!</p>";
				            }
                        }
				        echo $msg;
				    ?>
				</td>
            </tr>
        </table>
        </form>
    </div>
</body>
