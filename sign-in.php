<?php
include('dbcon.php');
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $emailsearch="select * from registration where email='$email'";
    $query=mysqli_query($conn,$emailsearch);

    $emailcount=mysqli_num_rows($query);
    if($emailcount){
        $emailpass=mysqli_fetch_assoc($query);
        $dbpass=$emailpass['pass'];
        $passdecode=password_verify($password,$dbpass);
        if($passdecode){


            ?>
		<script>
			alert("login successful")
			</script>
		<?php

        }
        else
        {
            ?>
		<script>
			alert("password incorrect")
			</script>
		<?php

        }
    }
    else
    {
        ?>
		<script>
			alert("invalid email or signup")
			</script>
		<?php

    }
    }





?>



<!DOCTYPE html>
<html lang="en">

<head>
		<meta charset="utf-8">
		<title>Sign In</title>
		<meta name="description" content="#">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap core CSS -->
		<link href="dist/css/lib/bootstrap.min.css" type="text/css" rel="stylesheet">
		<!-- Swipe core CSS -->
		<link href="dist/css/swipe.min.css" type="text/css" rel="stylesheet">
		<!-- Favicon -->
		<link href="dist/img/favicon.png" type="image/png" rel="icon">
	</head>
	<body class="start">
		<main>
			<div class="layout">
				<!-- Start of Sign In -->
				<div class="main order-md-1">
					<div class="start">
						<div class="container">
							<div class="col-md-12">
								<div class="content">
									<h1>Sign in to Swipe</h1>
									
									<p>or use your email account:</p>
									<form method="post">
										<div class="form-group">
											<input type="email" id="inputEmail" class="form-control" placeholder="Email Address" name="email"required>
											<button class="btn icon"><i class="material-icons">mail_outline</i></button>
										</div>
										<div class="form-group">
											<input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
											<button class="btn icon"><i class="material-icons">lock_outline</i></button>
										</div>
										<input type="submit" class="btn button" name="submit">
										<div class="callout">
											<span>Don't have account? <a href="sign-up.php">Create Account</a></span>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End of Sign In -->
				<!-- Start of Sidebar -->
				<div class="aside order-md-2">
					<div class="container">
						<div class="col-md-12">
							<div class="preference">
								<h2>Hello, Friend!</h2>
								<p>Enter your personal details and start your journey with Swipe today.</p>
								<a href="sign-up.php" class="btn button">Sign Up</a>
							</div>
						</div>
					</div>
				</div>
				<!-- End of Sidebar -->
			</div> <!-- Layout -->
		</main>
		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="dist/js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script>window.jQuery || document.write('<script src="dist/js/vendor/jquery-slim.min.js"><\/script>')</script>
		<script src="dist/js/vendor/popper.min.js"></script>
		<script src="dist/js/bootstrap.min.js"></script>
	</body>

</html>
