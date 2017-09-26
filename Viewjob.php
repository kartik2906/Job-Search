
<?php 

include ('connection_config.php');
session_start();




if (isset($_GET['id'])) {
	
	$id=$_GET['id'];
	



try
 		{ 


 			$sql = (" SELECT RecruiterID,JobType,Jobsdescription,PostDate,DueDate FROM Recruiter WHERE RecruiterID = '$id'");
 			$query = $conn->prepare($sql);
 			$query -> execute([
 			

 				]);

 			



}catch (PDOException $e)
 		{
 			echo  $e->getMessage();
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

		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet"/>

		<link href="css/bootstrap.min.css" rel="stylesheet"/>


		<link rel="stylesheet" type="text/css" href="style.css"/>
		<script type="text/javascript" src= "javascrept.js"></script>
	</head>
	<body  >
		<nav class="navbar navbar-default navbar-fixed-top " >
			<div class="container" >
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded=	"false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">KJobs</a>
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
			</div>
		</nav>
		<div class="container" class="search" >
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3">
					<form action = "" method="get">
						<div id="imaginary_container"> 
							<div class="input-group stylish-input-group">
								<input type="text" class="form-control" name= "keyword"  placeholder="Search" >
								<span class="input-group-addon">
									<button type="submit">
										<span class="glyphicon glyphicon-search"></span>
									</button>  
								</span>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>


		<div class="viewjob">
			<div class="row">
			<div class="col-sm-6 col-sm-offset-3">


		<table >

		<?php

		if ($query) {
 				
 				while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

 					 $_SESSION['RecruiterID'] = $row['RecruiterID'];
					

 					echo '<tr><h1><th>'. $row['JobType'].' </th></h1> </tr> <br>';

 					echo'<tr><td>'. $row['Jobsdescription'].' </td> </tr> </br> ';

 					echo'<tr><td>'. $row['PostDate'].' </td> </tr> </br> ';


 					echo '<tr><td>'. $row['DueDate'].' </td> </tr> </br> ';
					
					
										
				}
				
				

			}





		 ?>
	

		  </table>
		   </div">
		   <form action="Applyjob.php" method="post">
		    <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-6 col-xs-offset-3      ">

											<button class="btn btn-lg btn-primary btn-block" name ="Apply">Apply</button>
											
										</div>
										</form>

		 </div">
		

		 	
	


		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>

</body>
</html>