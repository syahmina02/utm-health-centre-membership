<?php
session_start();
if(isset($_SESSION['UserLogin'])){
	header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Membership Login</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
	<script src="https://kit.fontawesome.com/e1229bb594.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="img/utm_round_logo.png" class="brand_logo" alt="Programming Knowledge logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="studentid" id="studentid" class="form-control input_user" placeholder="Student ID" required>
						</div>

						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-lock"></i></span>
							</div>
							<input type="password" name="password" id="password" class="form-control input_pass" placeholder="Password" required>
						</div>

						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" name="rememberme" class="custom-control-input" id="customControlInLine">
									<label class="custom-control-label" for="customControlInLine">Remember Me</label>
							</div>
						</div>
									</div>
				<div class="d-flex justify-content-center mt-3 login_container">
					<button type="button" name="button" id="login" class="btn login_btn">Login</button>
				</div>
					</form>
				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						Don't have an account?<a href="registration.php" class="ml-2">Sign Up</a>
					</div>
					<div class="d-flex justify-content-center">
						<a href="#">Forgot Password</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" 
			integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
			crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script>
	$(function(){
		$('#login').click(function(e){
			var valid = this.form.checkValidity();

			if(valid){
				var studentid = $('#studentid').val();
				var password = $('#password').val();

			}
			e.preventDefault();
			$.ajax({
				type: 'POST',
				url: 'jslogin.php',
				data: {studentid: studentid, password: password},
				success: function(data){
					alert(data);
					if($.trim(data)==="1"){
						setTimeOut(' window.location.href =  "index.php"', 2000);
					}
				},
				error: function(data){
					alert('There are errors while saving the data.');
				}
	});
	});
});
</script>
</body>
</html>