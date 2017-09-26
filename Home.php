		<?php 

		session_start();

		include ('connection_config.php');	

		$error = Array();

		if(isset($_GET['keyword'])) {

			$keyword = $_GET ['keyword'];
			//$keyword = preg_replace('/\s+/', '', $keyword);


			if (empty(trim($_GET['keyword']))) {
				$error ['keyword'] = "no result";
			}
			elseif($keyword){


				$query = ("
					SELECT RecruiterID,JobType,Jobsdescription,PostDate,DueDate FROM Recruiter WHERE JobType LIKE '%{$keyword}%' 

					");
				$result = $conn->prepare($query);
				$result -> execute();


			}	
		}


		?>





		<!DOCTYPE html>
		<html >
		<head>
			<title>login</title>
			 <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	    <title>Bootstrap 101 Template</title>

	    <!-- Bootstrap -->
	    <link href="css/bootstrap.min.css" rel="stylesheet">


			<link rel="stylesheet" type="text/css" href="style.css"/>
			<script src="test.js"></script>



			
		</head>
		<body  class="bg">
			<div >
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
								<li class="ac"><a href="Home.php">Home</a></li>

								 
								<?php } ?>

							</ul>

						</div>
					</div>
				</div>
			</nav>
			</div>
			<div class="container" class="search" >
				<div class="row">
					<div class="col-sm-6 col-sm-offset-3">
					<div id="imaginary_container"> 
						<form action = "" method="get">
							
								<div class="input-group stylish-input-group">
									<input type="text" class="form-control" name= "keyword"  placeholder="Search" >
									<span class="input-group-addon">
										<button type="submit" id="search">
											<span>Search</span>
										</button>  
									</span>
								</div>
								</form>
							</div>
						
					</div>
				</div>
			</div>

			
			<div class="container" id="Area">
				<div class="row">
					<div class="col-xs-12">
						<table  class="table" id="result-count" >

						<?php  
						if($result){

							while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
								$Jobsdescriptions = $row['Jobsdescription'];
								


						?>

						<tr>
						<th>

							<a class="result" href="Viewjob.php?id=<?php echo $row['RecruiterID'] ?>"><?php echo  $row['JobType'] .'<br>'?></a></th>
						</tr>
						<tr>
							<td>
								<?php echo substr($Jobsdescriptions,0,30).'<br>'?>
							</td>
						</tr>

						<tr>
							<td>
								<?php echo $row['PostDate'].'<br>'?>
							</td>
						</tr>

						<tr>
							<td>

								<?php echo $row['DueDate'].'<br>'?>

								<hr>
						</td>

						</tr>



						<?php

						}
						
					  	if ($result->rowCount()!= $keyword) {
						echo '<tr><td><p>'.$result->rowCount().' result found</p></td></tr>' ;
						}else{
						echo '<tr><td><p>'.$result->rowCount().' result found</p></td></tr>' ;

						}

							?>

						</div>



						<?php
						}else{
						?>

								<div class="container" id="image-gallery">
								<div class="row">
								 <div class=" col-lg-10">

	  <h2>Area</h2>
	 	  <div class="row">
	    <div class="col-md-4 col-lg-4">
	      <div class="thumbnail">
	        <a href="/w3images/lights.jpg" target="_blank">
	          <img src="buy_a_business_uk.jpg" alt="Lights" style="width:100%">
	          <div class="caption">
	            <p>Tchnology.</p>
	          </div>
	        </a>
	      </div>
	    </div>
	    <div class="col-md-4 col-lg-4">
	      <div class="thumbnail">
	        <a href="/w3images/nature.jpg" target="_blank">
	          <img src="technology-785742_960_720.jpg" alt="Nature" style="width:100%">
	          <div class="caption">
	            <p>Business</p>
	          </div>
	        </a>
	      </div>
	    </div>
	    <div class="col-md-4 col-lg-4">
	      <div class="thumbnail">
	        <a href="/w3images/fjords.jpg" target="_blank">
	          <img src="technology-785742_960_720.jpg" alt="Fjords" style="width:100%">
	          <div class="caption">
	            <p>Retail</p>
	          </div>
	        </a>
	      </div>
	    </div>
	  </div>
	  </div>
	  </div>
	</div>
					<?php

						}




						?>
						

					
						
					




					

						
							




						</table>


					</div>

				</div>
			

		<footer>
	        <p class="float-right"><a href="#">Back to top</a></p>
	        <p>&copy; 2017 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
     	 </footer>
		




			

						
						
					

				

				

				




	    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	    <!-- Include all compiled plugins (below), or include individual files as needed -->
	    <script src="js/bootstrap.min.js"></script>
	  </body>
	</html>

