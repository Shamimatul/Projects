<div class="nav-wrapper">
    <div class="topnav" id="theTopNav">
        <a href="index.php">HOME</a>
        <a href="">NEWS</a>
        <a href="">CONTACT</a>
        <a href="">ABOUT US</a>
        <?php
            if(isset($_SESSION['isValid']))
            {
                if($_SESSION['user_type']=='user')
                {
                    echo "<a href='profile.php'>PROFILE</a>";
                }
                else if($_SESSION['user_type']=='admin')
                {
                    echo "<a href='admin-page.php'>MANAGE</a>";
                }
                echo "<a href='logout.php'>LOGOUT</a>";
            }
            else
            {
                echo "<a href='login-page.php'>USER LOGIN</a>";
                echo "<a href='login-admin-page.php'>ADMIN LOGIN</a>";
                echo "<a href='user-register.php'>REGISTER</a>";
            }
        ?>
        <a href="javascript:void(0);" class="icon" onclick="respFunc()">&#9776;</a>
    </div>
    </div>

	<script>
		function respFunc() {
		    var x = document.getElementById("theTopNav");
		    console.log(x);

		    if (x.className === "topnav") {
		        x.className += " responsive";
		        return 0;
		    }

		    if (x.className === "topnav navbar-fixed") {
		        x.className += " responsive";
		        return 0;
		    }

		    if (x.className === "topnav responsive") {
		        x.className = "topnav";
		        return 0;
		    }

		    if (x.className === "topnav navbar-fixed responsive" || x.className === "topnav responsive navbar-fixed") {
		        x.className = "topnav navbar-fixed";
		        return 0;
		    }
		}

		$(document).ready(function() {
		  $(window).scroll(function () {
		    if ($(window).scrollTop() > 120) {
		      $("#theTopNav").addClass('navbar-fixed');
		    }
		    if ($(window).scrollTop() < 121) {
		      $("#theTopNav").removeClass('navbar-fixed');
		  }
		  });
		});
	</script>