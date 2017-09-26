<?php

session_start();
include ('connection_config.php');
//include ('include_login.php');



if(isset($_POST['Submit'])){

	$Jobsdescription = trim( $_POST['Jobsdescription']);
	$PostDate = trim( $_POST['PostDate']);
	$DueDate =  trim($_POST['DueDate']);
	
			$Area =  trim($_POST['Area']);

	

	$JobType =  trim($_POST['JobType']);
	$error =Array();




	if (empty($_POST['Jobsdescription'])&&empty($_POST['PostDate'])&&empty($_POST['DueDate'])&&empty($_POST['JobType'])&&empty($_POST['Area'])) {

		$error['Allempty'] = "All values  need to be filled </br>";



	}

	if (empty(trim($_POST['Jobsdescription']))) {
		$error ['jobsdescriptions'] = "firstname is missing";
	}

	if (empty(trim($_POST['PostDate']))) {
		$error['postdates'] = "lastname is missing";
	}

	if (empty(trim($_POST['DueDate']))) {
		$error['duedates'] = "DOB is missing";
	}

	if (empty(trim($_POST['JobType']))){
		$error['jobtypes'] = "Username is missing";
	}
	if (empty(trim($_POST['Area']))){
		$error['area'] = "Area is missing";
	}


	elseif(empty($error)){



		try {

			
				$sql = "INSERT INTO Recruiter ( Jobsdescription, PostDate, DueDate, JobType, Area ) VALUES ( :Jobsdescription, :PostDate, :DueDate, :JobType, :Area)";

				$query = $conn->prepare( $sql );
				$query = $query->execute( array( ':Jobsdescription'=>$Jobsdescription, ':PostDate'=>$PostDate, ':DueDate'=>$DueDate, ':JobType'=>$JobType,':Area'=>$Area ) );


					
				
				
			
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

						<li class="active"><a href="Index.html">Home</a></li>
						<li><a href="Login.php">Login</a></li>
						<li><a href="Register.php">Register</a></li>
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
											<?php if (isset($error)) echo $error ['jobsdescriptions']; {}?>
											<input type="text" class="form-control" name="Jobsdescription"  placeholder="Enter your Jobsdescription"/>

										</div >
									</div>
									<div class="form-group" >
										<div class="input-group">
											<span class="input-group-addon"><i class="" aria-hidden="true"></i></span> 
											<?php if (isset($error)) echo $error['postdates']; {}?>

											<input type="date" class="form-control" name="PostDate"  placeholder="Enter your PostDate"/>
										</div>
									</div>

									<div class="form-group ">
										<div class="input-group">
											<span class="input-group-addon"><i class="" aria-hidden="true"></i></span>
											<?php if (isset($error)) echo $error['duedates']; {}?>
											<input type="date" max="1995-10-29" class="form-control" name="DueDate"  placeholder="Enter your DueDate"/>
										</div>
									</div>
									<div class="form-group" >
										<div class="input-group">
											<span class="input-group-addon"><i class="" aria-hidden="true"></i></span>
											<?php if (isset($error)) echo $error['jobtypes']; {}	?>
	
											<input type="text" class="form-control" name="JobType"  placeholder="Enter your JobType"/>
										</div>
									</div>

												
												
												<div class="dropdown" >
												<?php if (isset($error)) echo $error['area']; {}?>


												<select class="form-control" name="Area">
													<option value="">select Area</option>
												  <option value="Technology">Technology</option>
												  <option value="Business">Business</option>
												  <option value="Retail">Retail</option>
												  
												</select>

												</div>

												

												

													



												


																			
									<div class="row">
										<div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-6 col-xs-offset-3">

											<button class="btn btn-lg btn-primary btn-block" name ="Submit">Submit</button>
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
		<script src="test.js"></script>



	</body>
	</html>