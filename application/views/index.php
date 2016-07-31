<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
		<link rel="stylesheet" href="/assets/css/index.css">
		<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  		<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
		<script>
		$(document).ready(function(){  
           $(function(){
           		$("#datepicker").datepicker({
           			showOn:"button",
           			buttonImage:"/assets/images/calendar.png",
           			buttonImageOnly: true,
           			buttonText: "Calendar",
           			dateFormat: 'yy-mm-dd'
           		});
           }) 
		});
		</script>
</head>
<body>
<?php if(validation_errors()!=false){
	echo "<div class='error'>".validation_errors()."</div>"
	;} 
	else if ($this->session->flashdata('errors')){
		echo "<div class='error'>".$this->session->flashdata('errors')."</div>";
	}
	else if ($this->session->flashdata('success')){
		echo "<div class='success'>".$this->session->flashdata('success')."</div>";
}?>

	<div id="container">
		<h2>Welcome!</h2>
		<FIELDSET>
			<legend>Register</legend>
			<div>
				<form action="/register/" method="post">
					<label>Name</label><input class="layout" type="text" name="name"><br>
					<label>Alias</label><input class="layout" type="text" name="alias"><br>
					<label>Email</label><input class="layout" type="email" name="email"><br>
					<label>Password</label><input class="layout" type="password" name="password"><span id="passwordInfo">*Password should be at least 8 characters</span>
					<label>Confirm PW</label><input class="layout" type="password" name="confirm_password"><br>
					<label>Date of Birth</label><input id="datepicker" type="text" name="DOB"><br>
				<button>Register</button>
			</div>
			</form>
		</FIELDSET>
		<FIELDSET class="layout">
			<legend>Login</legend>
			<form action="/login/" method="post">
<!-- 				<input type="hidden" name="login"> -->
				<label>Email</label><input type="email" name="email"><br>
				<label>Password</label><input type="password" name="password"><br>
				<button>Login</button>
			</form>
		</FIELDSET>
	</div>
</body>
</html>