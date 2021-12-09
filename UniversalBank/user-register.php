<?php
	include_once("connection.php");
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Universal Bank - Register</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="CSS/style.css">
</head>
<body class="body">
	<?php
        include("header.php");
        include("navbar.php"); 
        $msg = "";
    ?>
    
    <div class="flex-container-background">
        <div class="flex-container">
            <div class="flex-item-0">
                <h1 id="form_header">New User Registration</h1>
            </div>
        </div>

        <div class="flex-container">
            <div class="flex-item-2">
                <form method="post">
                  <div class="flex-item-login">
                        <h2>Enter All Your Informations Correctly</h2>
                    </div>
                   <div class="row">
                       <div class="col-lg-6">
                           <div class="flex-item">
                                <input type="text" name="fname" placeholder="Enter your First Name" required>
                            </div>
                       </div>
                       <div class="col-lg-6">
                           <div class="flex-item">
                                <input type="text" name="lname" placeholder="Enter your Last Name" required>
                            </div>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-lg-6">
                           <div class="flex-item">
                                <select name="sex" required>
                                    <option value="" selected disabled hidden>Select Your Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                       </div>
                       <div class="col-lg-6">
                           <div class="flex-item">
                                <input type="text" name="phone" placeholder="Enter your Contact Number" required>
                            </div>
                       </div>
                   </div>
                   
                   <div class="row">
                       <div class="col-lg-6">
                           <div class="flex-item">
                                <input type="text" name="nid" placeholder="Enter 14 digit NID No." required>
                            </div>
                       </div>
                       <div class="col-lg-6">
                           <div class="flex-item">
                                <textarea name="addr" rows="4" cols="50" placeholder="Enter your Full Address" required></textarea>
                            </div>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-lg-6">
                           <div class="flex-item">
                                <select name="banks" required>
                                    <option value="" selected disabled hidden>Choose Your Prefered Bank</option>
                                    <option value="Sonali Bank">Sonali Bank</option>
                                    <option value="Rupali Bank">Rupali Bank</option>
                                    <option value="Janata Bank">Janata Bank</option>
                                    <option value="Agrani Bank">Agrani Bank</option>
                                </select>
                            </div>
                       </div>
                       <div class="col-lg-6">
                           <div class="flex-item">
                                <?php
                                    $characters = '0123456789';
                                    $charactersLength = strlen($characters);
                                    $length = 10;
                                    $acc = '';
                                    for ($i = 0; $i < $length; $i++) {
                                        $acc .= $characters[rand(0, $charactersLength - 1)];
                                    }
                                ?>
                                <input type="text" value= "ACC NO. UBBL-<?php echo $acc; ?>" readonly>
                            </div>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-lg-6">
                           <div class="flex-item">
                                <input type="text" name="email" placeholder="Enter your Email Address" required>
                            </div>
                       </div>
                       <div class="col-lg-6">
                           <div class="flex-item">
                                <input type="text" name="uname" placeholder="Enter your User Name" required>
                            </div>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-lg-6">
                           <div class="flex-item">
                                <input type="password" name="pass" placeholder="Select a Strong Password" required>
                            </div>
                       </div>
                       <div class="col-lg-6">
                           <div class="flex-item">
                                <input type="password" name="cpass" placeholder="Re-enter your password" required>
                            </div>
                       </div>
                   </div>
                    <?php echo "<p style='color: red; padding: 0px 10px;'>".$msg."</p>"; ?>
                    <div class="flex-item">
                        <button type="Register" name="reg">Register</button>
                    </div>
                    <?php

                    ?>

                </form>
            </div>
        </div>

    </div>
    
    
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>