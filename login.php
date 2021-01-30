<?php
	include("includes/config.php");
	include("includes/classes/Account.php");
	include("includes/classes/Constants.php");

	$account = new Account($con);

	include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");

	function getInputValue($name) {
		if(isset($_POST[$name])) {
			echo $_POST[$name];
		}
    }
    


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/loginstyle.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <title>Login</title>
</head>
<body>



<?php

	if(isset($_POST['registerButton'])) {
		echo '<script>
				$(document).ready(function() {
					$("#loginForm").hide();
					$("#registerForm").show();
				});
			</script>';
	}
	else {
		echo '<script>
				$(document).ready(function() {
					$("#loginForm").show();
					$("#registerForm").hide();
				});
			</script>';
	}

	?>

<div>

            <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
                <a class="navbar-brand" href="#">
                    <img src="image/logo.png" width="50" height="50" class="d-inline-block align-top" alt="logo">
                    <span class="banner-title">Musify</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0 banner-title">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php"><i class="fas fa-home"></i>Home <span class="sr-only">(current)</span></a>
                        </li>
                       
                        <li class="trending-track">
                            <span>Trending song: Tum Hi Ho...!</span>
                        </li>
                        <li class="button-top">
                            <button onclick="location.href = 'register.php';"  class="btn btn-sm custom-button" type="submit" style="background-color: #3bc8e7; border-radius: 25px; color: #fff;">Register</button>

                        </li>

                    </ul>

                </div>
            </nav>

        </div>


<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">

            
                <form id="loginForm" class="box" action="login.php" method="POST">
                    <h1>Login</h1>
                    <p id="loginFailed"><?php echo $account->getError(Constants::$loginFailed); ?>
                    <input id="loginUsername" name="loginUsername" type="text" name="" placeholder="Username" value="<?php getInputValue('loginUsername') ?>" required>
                    </p>
                    <input type="password" id="loginPassword" name="loginPassword" placeholder="Password">
                    <a class="text-muted" href="register.php">Don't have account?<br>Register here!</a>
                     <input type="submit" name="loginButton" value="Login">
                   
                    
                </form>
                
                   
            </div>
        </div>
    </div>
</div>
</body>
</html>