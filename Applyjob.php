	<?php

session_start();
include ('connection_config.php');
//include ('include_login.php');



if(isset($_POST['Continue'])){

	$name = trim( $_POST['name']);
	$Email = trim( $_POST['Email']);
	$Note =  trim($_POST['Note']);
	$recruiterid = $_SESSION['RecruiterID'];
	$userid = $_SESSION['UserID'];
	$notUser =($_SESSION['UserID'] = NULL);

	

	
	

	



	if (empty($_POST['name'])&&empty($_POST['Email'])&&empty($_POST['Note'])) {

		$error['Allempty'] = "All values  need to be filled </br>";



	}

	if (empty(trim($_POST['name']))) {
		$error ['Names'] = "name is missing";
	}

	if (empty(trim($_POST['Email']))) {
		$error['email'] = "email is missing";
	} 
	

	if (empty(trim($_POST['Note']))) {
		$error['note'] = "note is missing";
	}


	elseif(empty($error)){



		try {


				

				
				
				

				$sql = "SELECT RecruiterID, UserID  FROM Recruiter, User  WHERE RecruiterID = $recruiterid  AND UserID = $userid ";
			


		
		
					
				

				$sql = "INSERT INTO Jobs ( name, Email, Note, recruiterid, userid ) VALUES ( :name, :Email, :Note, :recruiterid, :userid )";


				$query = $conn->prepare( $sql );
				$query = $query->execute( array( ':name'=>$name, ':Email'=>$Email, ':Note'=>$Note, ':recruiterid'=>$recruiterid, ':userid'=>$userid  ) );






			
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

	<link href="css/bootstrap.min.css" rel="stylesheet">

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

						<?php if(isset($_SESSION['UserID'])){ ?>
							 <ul class="nav navbar-right top-nav">
					                
					                
					                <li class="dropdown">
					                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Welcome <?php echo $_SESSION['userName']; ?> <b class="caret"></b></a>
					                    <ul class="dropdown-menu">
					                        <li>
					                            <a href="user.php"><i class="fa fa-fw fa-user"></i> Dashboard</a>
					                        </li>
					                        <li class="divider"></li>
					                        <li>
					                            <a href="Logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
					                        </li>
					                    </ul>
					                </li>
					            </ul>
							<?php }else{ ?>
							<li><a href="Login.php">Login</a></li>
							<li><a href="Register.php">Register</a></li>
							<li><a href="Home.php">Home</a></li>

							 
							<?php } ?>
					</ul>

				</div>
			</div>
		</nav>



		<div class ="container">
			<div class = "row" >
				<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3" >
					<div class="whole-form">
						<div class="row">
							<div class="col-lg-6 col-lg-offset- col-sm-6 col-sm-offset-4 col-xs-6 col-xs-offset-3" id="title-login">
								<a href="#">Please Sign In </a>
							</div>
						</div>
						<hr>
						<?php if (isset($error)) echo  $error['Allempty'] ; {}?>
						<div class="row">
							<div class="col-lg-12">

								<form id="register-form" style="display:block;"  method="post" action="">
									<div class="form-group" >

										<div class="input-group">
											<span class="input-group-addon"><i class="" aria-hidden="true"></i></span> 
											<?php if (isset($error)) echo $error ['Names']; {}?>
											<input type="text" class="form-control" name="name"  placeholder="Enter your name"/>

										</div >
									</div>
									<div class="form-group" >
										<div class="input-group">
											<span class="input-group-addon"><i class="" aria-hidden="true"></i></span> 
											<?php if (isset($error)) echo $error['email']; {}?>

											<input type="text" class="form-control" name="Email"  placeholder="Enter your email"/>
										</div>
									</div>

									<div class="form-group ">
										<div class="input-group">
											<span class="input-group-addon"><i class="" aria-hidden="true"></i></span>
											<?php if (isset($error)) echo $error['note']; {}?>
											<input type="text"  class="form-control" name="Note"  placeholder="Enter your note"/>
										</div>
									</div>
									
									<div class="row">
										<div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-6 col-xs-offset-3">

											<button class="btn btn-lg btn-primary btn-block" name ="Continue">Continue</button>
										</div>
									</div>
								</form>
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