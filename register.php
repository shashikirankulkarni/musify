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
    <link rel="stylesheet" type="text/css" href="css/registerstyle.css">
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
                            <button onclick="location.href = 'login.php';"  class="btn btn-sm custom-button" type="submit" style="background-color: #3bc8e7; border-radius: 25px; color: #fff;">Login</button>

                        </li>

                    </ul>

                </div>
            </nav>

        </div>


<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form id="loginForm" class="box" action="register.php" method="POST">
                    <h1 id="heading">Register</h1>
                    <p>
                    <?php echo $account->getError(Constants::$usernameCharacters); ?>
					<?php echo $account->getError(Constants::$usernameTaken); ?>
                    <input id="username" name="username" type="text" name="" placeholder="Username" value="<?php getInputValue('username') ?>" required>
                    </p>

                    <p>
                    <?php echo $account->getError(Constants::$firstNameCharacters); ?>
                    <?php echo $account->getError(Constants::$firstNameCharacterOnly); ?>
                    <input id="firstName" name="firstName" type="text" name="" placeholder="First Name" value="<?php getInputValue('firstName') ?>" required>
                    </p>
                    
                    <p>
                    <?php echo $account->getError(Constants::$lastNameCharacters); ?>
                    <?php echo $account->getError(Constants::$lastNameCharacterOnly); ?>
                    <input id="lastName" name="lastName" type="text" name="" placeholder="Last Name" value="<?php getInputValue('lastName') ?>" required>
                    </p>

                    <p>
                    <?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
					<?php echo $account->getError(Constants::$emailInvalid); ?>
                    <?php echo $account->getError(Constants::$emailTaken); ?>
                    <input id="email" name="email" type="text" name="" placeholder="Email" value="<?php getInputValue('email') ?>" required>
                    </p>


                    <p>
                    <input id="email2" name="email2" type="text" name="" placeholder="Comfirm Email" value="<?php getInputValue('email') ?>" required>
                    </p>

                    <p>
                    <?php echo $account->getError(Constants::$passwordsDoNoMatch); ?>
						<?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
                        <?php echo $account->getError(Constants::$passwordCharacters); ?>
                        <input id="password" name="password" type="password" placeholder="Password" required>

                    </p>

                    <p>
                    <input id="password2" name="password2" type="password" placeholder="Comfirm Password" required>
                    </p>

                    <a class="text-muted" href="login.php">Already have account?<br>Login here!</a>
                     <input type="submit" name="registerButton" value="Register">
                    
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>