<?php
if(isset($this->session->userdata['logged_in'])){
	// redirect to profile 
	header("location: profile");
}
include('header.php');
?>
<body class="bg-dark">
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a href="" class="navbar-brand mt-auto"><span class="text-danger big">M</span><span class="lit">Nerds</span></a>
            <a href="index" class="ml-auto nav-item"><button class="btn btn-sm btn-outline-success">create new account</button></a>
        </nav>
        </div>
    <center>
    <div class="card col-4 mt-5">
    <div class="card-header">
        <h1 class="text-left text-primary text-center">Login</h1>
    </div>
    <div class="card-body">
		<form method="POST" id="loginform" action="Welcome/login">
        <input type="text" id="email" name="email" class="form-control mb-2" placeholder="Email or Phone No.">
        <input type="password" id="password" name="password" class="form-control mb-2" placeholder="Password">
        <a href="#"><button class="btn btn-outline-primary btn-lg space" id="submit" type="submit">Login</button></a>
        <div>
            <a href="#" class="">Forgotten Password?</a>
        </div>
		<div id="error"></div>
		</form>
    </div>
    </div>
    </center>
    <script src="assets/fm.js"></script>   
</body>
<script>
$(document).ready(function() {

$("#loginform").on("submit", function(event) {
	event.preventDefault();


	var email =  $("#email").val();
	var password = $("#password").val();
	var form = $(this);

		$.ajax({
			type: form.attr('method'),
			url: form.attr('action'),
			data: form.serialize(),
			dataType: 'json',
			beforeSend: function() {
				$("#error").fadeOut();
				$("#submit").html('PLEASE WAIT.......');
			},
			success: function(response) {
				if (response.error == false) {
					document.getElementById("loginform").reset();
				   $("#error").fadeIn(1000, function() {
						$("#submit").html('Redirecting....');
					});
					setTimeout(' window.location.href = "profile"; ',4000);
				} else {
					$("#error").fadeIn(1000, function() {
						$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; ' + response.message + ' !</div>');
						$("#submit").html('Submit');
					});
				}
			}

		});
		

});
});

</script>
</html>
