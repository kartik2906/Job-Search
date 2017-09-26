 	<?php

 	session_start();
 	include ('connection_config.php');
//include ('include_login.php');

 	if(isset($_POST['Submit'])) {
//$RoleID =  $_POST['RoleID'];
 		$userName =  $_POST['userName'];
 		$password =  $_POST['password'];
 		$errors =Array();
 		


 		if (empty($_POST['userName'])&&empty($_POST['password'])) {

 			$errors ['Allfield'] = "All is missing";
 		}

 		if (empty($_POST['userName'])) {
 			$errors ['Usernames'] = "firstname is missing";
 		}

 		if(empty($_POST['password'])){
 			$errors ['Password'] = "password is missing";
 		} 
 		elseif(empty($errors)){

 		try
 		{ 
 			

 			$sql = ("SELECT UserID,RoleID FROM User WHERE  userName = :userName AND password = :password");

 			
 			$query = $conn->prepare($sql);
 			$query -> execute([
 				'userName' => $userName,
 				'password' => $password,

 				]);

 			$result = $query -> fetch(PDO::FETCH_ASSOC);

 		
 				if($result['RoleID'] == 1) {
 					$_SESSION['userName'] = $userName;
 					$_SESSION['UserID'] = $result['UserID'];

 					//$_SESSION['JobID'] = $result['JobID'];
 					header("location: user.php");
 					
					
 				}elseif ($result['RoleID'] == 2) {
 					$_SESSION['userName'] = $userName;
 					$_SESSION['UserID'] = $result['UserID'];
 					//$_SESSION['JobID'] = $result['JobID'];
 					header("location: recruiter.php");
 					
 				
 				}else{
 					echo "username and password not valid ";
 				}

 				


 		}


 		catch (PDOException $e)
 		{
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
 		<link href="css/bootstrap.min.css" rel="stylesheet">
	

 		<link rel="stylesheet" type="text/css" href="style.css">
 		<script src="test.js"></script>
		

 		
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
 							<li class="active"><a href="Login.php">Login</a></li>
 							<li><a href="Register.php">Register</a></li>
 						</ul>

 					</div>
 				</div>
 			</nav>


 			<div class ="container-fluid">
 				<div class = "row" >
 					<div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3" >
 						<div class=" panel panel-default" id="panel-login-default" >
							<div class="whole-Login">
 							<div class="row">
 								<div class="col-lg-6 col-lg-offset-5 col-sm-6 col-sm-offset-4 col-xs-6 col-xs-offset-3" id="title-login">
 									<a href="#">Please Sign In </a>
 								</div>
 							</div>
 							<hr>
 							<?php if (isset($errors)) echo $errors['Allfield']; {}?>
 							<div class="row">
 								<div class="col-lg-12">
 									<form id="login-form"  onsubmit=" return validation()"   method="post" action="">
 									<?php if (isset($errors)) echo $errors['Usernames']; {}?>
 										<div class="form-group ">
 											<div class="input-group">
 												<span class="input-group-addon"><i class="glyphicon glyphicon-log-in" ></i></span>
 												
 												<input type="text" class="form-control" name = "userName" id = "userName"  />
 											</div>
 										</div>
 										<?php if (isset($errors)) echo $errors['Password']; {}?>
 										<div class="form-group" >
 											<div class="input-group">
 												<span class="input-group-addon"><i class="glyphicon glyphicon-triangle-right" ></i></span>
 												
 												<input type="password" class="form-control" name ="password"id ="password"  />
 											</div>
 										</div>
 										<div class="row">
 											<div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-6 col-xs-offset-3">

 												<button class="btn btn-lg btn-primary btn-block" name ="Submit" onclick="validation()" >Sign in</button>
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