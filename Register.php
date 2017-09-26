<?php





session_start();
include ('connection_config.php');
//include ('include_login.php');



if(isset($_POST['Register'])){

	$FirstName = trim( $_POST['FirstName']);
	$LastName = trim( $_POST['LastName']);
	$DOB =  trim($_POST['DOB']);

	$userName =  trim($_POST['userName']);
	$password =  trim($_POST['password']);
	$RoleID =  trim($_POST['RoleID']);
	$error =Array();




	if (empty($_POST['FirstName'])&&empty($_POST['Lastname'])&&empty($_POST['DOB'])&&empty($_POST['userName'])&&empty($_POST['password'])&&empty($_POST['RoleID'])) {

		$error['Allempty'] = "All values  need to be filled </br>";



	}

	if (empty(trim($_POST['FirstName']))) {
		$error ['firstname'] = "firstname is missing";
	}

	if (empty(trim($_POST['LastName']))) {
		$error['lastname'] = "lastname is missing";
	}

	if (empty(trim($_POST['DOB']))) {
		$error['dob'] = "DOB is missing";
	}

	if (empty(trim($_POST['userName']))){
		$error['Usernames'] = "Username is missing";
	}


	if (empty(trim($_POST['password']))){
		$error['Passwords'] = "Password is missing";
	}

	if (empty(trim($_POST['RoleID']))) {
		$error['roleid'] = "Role is missing";
	}
	elseif(empty($error)){



		try {

			$usernamecheck = ("SELECT * FROM User WHERE userName = '$userName' ");
			$userchck = $conn->prepare( $usernamecheck );
			$userchck -> execute();

			if ($userchck->fetchColumn() > 0) {
				$error ['userexist'] = "Username already exist ";
			}elseif ($userchck -> fetchColumn() < 1) {

				$sql = "INSERT INTO User ( FirstName, LastName, DOB, userName, password, RoleID ) VALUES ( :FirstName, :LastName, :DOB, :userName, :password, :RoleID )";

				$query = $conn->prepare( $sql );
				$query = $query->execute( array( ':FirstName'=>$FirstName, ':LastName'=>$LastName, ':DOB'=>$DOB, ':userName'=>$userName, ':password'=>$password, ':RoleID'=>$RoleID ) );

				echo "Registerered Successfully";
			}
			
		} catch (Exception $e) {
			echo  $e->getMessage();
		}

	}

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="css/bootstrap.css" rel="stylesheet">

	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">


	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src= "javascript.js"></script>
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top ">
		<div class="container" >
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded=	"false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Brand</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<div class="nav navbar-nav navbar-right">
					<ul  class="nav navbar-nav">

						<li ><a href="Home.php">Home</a></li>
						<li><a href="Login.php">Login</a></li>
						<li class="active"><a href="Register.php">Register</a></li>
					</ul>

				</div>
			</div>
		</nav>


		<div class ="container">
			
				<div class = "row" >
					<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3" >
						<div class=" panel panel-default" id="panel-default" >

						<div class="whole-form">
							<div class="row">
								<div class="col-lg-6 col-lg-offset- col-sm-6 col-sm-offset-4 col-xs-6 col-xs-offset-3" id="title-login">
									  <div class="panel-title" >Register</div>
								</div>
							</div>
							<hr>
							<?php if (isset($error)) echo  $error['Allempty'] ; {}?>
							<div class="row">
								<div class="col-lg-12">

									<form id="register-form" style="display:block;"  method="post" action="Register.php">
										<?php if (isset($error)) echo $error ['firstname']; {}?>
										<div class="form-group" >
										
											<div class="input-group">
												<span class="input-group-addon"><i class="" aria-hidden="true"></i></span> 
												
												<input type="text" class="form-control" name="FirstName"  placeholder="Enter your FirstName"/>

											</div >
										</div>
										<?php if (isset($error)) echo $error['lastname']; {}?>
										<div class="form-group" >
											<div class="input-group">
												<span class="input-group-addon"><i class="" aria-hidden="true"></i></span> 
												

												<input type="text" class="form-control" name="LastName"  placeholder="Enter your Lastname"/>
											</div>
										</div>
										<?php if (isset($error)) echo $error['dob']; {}?>

										<div class="form-group ">
											<div class="input-group">
												<span class="input-group-addon"><i class="" aria-hidden="true"></i></span>
												
												<input type="date" max="1995-10-29" class="form-control" name="DOB"  placeholder="Enter your DateOFBith"/>
											</div>
										</div>
										<?php if (isset($error)) echo $error['Usernames']; {}	?>
										<?php if (isset($error)) echo $error['userexist']; {}	?>
										<div class="form-group" >
											<div class="input-group">
												<span class="input-group-addon"><i class="" aria-hidden="true"></i></span>
												
												

												<input type="text" class="form-control" name="userName"  placeholder="Enter your Username"/>
											</div>
										</div>
										<?php if (isset($error)) echo $error['Passwords']; {}?>
										<div class="form-group" >
											<div class="input-group">
												<span class="input-group-addon"><i class="" aria-hidden="true"></i></span>
												
												<input type="password" class="form-control" name="password"  placeholder="Enter your Password"/>
											</div>
										</div>
										<?php if (isset($error)) echo $error['roleid']; {}?>
										<div class="form-group " >
											<div class="input-group">
												<span class="input-group-addon"><i class="" aria-hidden="true"></i></span>
												
												<input type="text" class="form-control" name="RoleID"  placeholder="Enter your Role"/>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-6 col-xs-offset-3">

												<button class="btn btn-lg btn-primary btn-block" name ="Register" >Register</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>



		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>



	</body>
	</html>