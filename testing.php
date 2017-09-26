<div class ="container">
			<div class=" panel panel-default">
				<div class = "row" >
					<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3" >
						<div class="whole-form">
							<div class="row">
								<div class="col-lg-6 col-lg-offset- col-sm-6 col-sm-offset-4 col-xs-6 col-xs-offset-3" id="title-login">
									  <div class="panel-title">Sign In</div>
								</div>
							</div>
							<hr>
							<?php if (isset($error)) echo  $error['Allempty'] ; {}?>
							<div class="row">
								<div class="col-lg-12">

									<form id="register-form" style="display:block;"  method="post" action="Register.php">
										<div class="form-group" >

											<div class="input-group">
												<span class="input-group-addon"><i class="" aria-hidden="true"></i></span> 
												<?php if (isset($error)) echo $error ['firstname']; {}?>
												<input type="text" class="form-control" name="FirstName"  placeholder="Enter your FirstName"/>

											</div >
										</div>
										<div class="form-group" >
											<div class="input-group">
												<span class="input-group-addon"><i class="" aria-hidden="true"></i></span> 
												<?php if (isset($error)) echo $error['lastname']; {}?>

												<input type="text" class="form-control" name="LastName"  placeholder="Enter your Lastname"/>
											</div>
										</div>

										<div class="form-group ">
											<div class="input-group">
												<span class="input-group-addon"><i class="" aria-hidden="true"></i></span>
												<?php if (isset($error)) echo $error['dob']; {}?>
												<input type="date" max="1995-10-29" class="form-control" name="DOB"  placeholder="Enter your DateOFBith"/>
											</div>
										</div>
										<div class="form-group" >
											<div class="input-group">
												<span class="input-group-addon"><i class="" aria-hidden="true"></i></span>
												<?php if (isset($error)) echo $error['Usernames']; {}	?>
												<?php if (isset($error)) echo $error['userexist']; {}	?>

												<input type="text" class="form-control" name="userName"  placeholder="Enter your Username"/>
											</div>
										</div>
										<div class="form-group" >
											<div class="input-group">
												<span class="input-group-addon"><i class="" aria-hidden="true"></i></span>
												<?php if (isset($error)) echo $error['Passwords']; {}?>
												<input type="password" class="form-control" name="password"  placeholder="Enter your Password"/>
											</div>
										</div>
										<div class="form-group " >
											<div class="input-group">
												<span class="input-group-addon"><i class="" aria-hidden="true"></i></span>
												<?php if (isset($error)) echo $error['roleid']; {}?>
												<input type="text" class="form-control" name="RoleID"  placeholder="Enter your Role"/>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-6 col-xs-offset-3">

												<button class="btn btn-lg btn-primary btn-block" name ="Register">Register</button>
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
