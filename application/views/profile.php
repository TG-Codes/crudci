
<?php 
// we have to check if we have set the session variable 
// all we are saying is that if the user is logged it 
//should create the variable from the session data
if (isset($this->session->userdata['logged_in'])) {
    $email = ($this->session->userdata['logged_in']['email']);
    $fname = ($this->session->userdata['logged_in']['fname']);
    $lname = ($this->session->userdata['logged_in']['lname']);
    $otherName = ($this->session->userdata['logged_in']['otherName']);
    $day = ($this->session->userdata['logged_in']['day']);
	$month = ($this->session->userdata['logged_in']['month']);
    $year = ($this->session->userdata['logged_in']['year']);
    $gender = ($this->session->userdata['logged_in']['gender']);
    $address = ($this->session->userdata['logged_in']['address']);
    $phoneNo = ($this->session->userdata['logged_in']['phoneNo']);
	$country = ($this->session->userdata['logged_in']['country']);

    } else {
    header("location: login");
    }


?>
<?php 
include('header.php');
?>
<body class="bg-dark">
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a href="" class="navbar-brand mt-auto"><span class="text-danger big">M</span><span class="lit">Nerds</span></a>
			<?php 
			if(isset($this->session->userdata['logged_in'])){
			echo 	'<a href="Welcome/LogOut" class="ml-auto nav-item"><button class="btn btn-sm btn-outline-primary ms-1">LogOut</button></a>';
			echo '<!-- Button trigger modal -->
			<button type="button" class="btn btn-sm btn-outline-primary ml-2" data-bs-toggle="modal" data-bs-target="#PasswordModal">
			  Change Password
			</button>
			';
			}

			?>
	        </nav>
        </div>
    <center>
    <div class="card col-lg-5 mt-1">
    <div class="card-header">
        <h1 class="text-success">Profile Page</h1>
        <p><strong>It's quick and easy</strong></p>
    </div>
    <form id="update" class="card-body" action="Welcome/Update" method="post">
        <h6 class="text-left mb-1 mt-2"><strong>Name</strong></h6>
        <div>
            <p id="fName"></p>
            <input type="text" placeholder="First Name" value="<?php echo($fname); ?>" class="form-control mt-1" name="fname" id="fname" onkeyup="fNameCheck()">
        </div>
        <div>
            <p id="lName"></p>
            <input type="text" placeholder="Surname" value="<?php echo($lname); ?>" class="form-control" name="lname" id="lname" onkeyup="lNameCheck()">
        </div>
        <div>
            <p id="othername"></p>
            <input type="text" value="<?php echo($otherName); ?>" placeholder="Other Names(optional)" class="form-control" name="otherName" id="otherName">
        </div>
        <div>
            <p class="text-left"><strong>Date of birth</strong></p>
            <div class="row">
                <div class="col-3">
                    <select class="form-control" name="day" id="day" required>
                        <option disabled selected>Day</option>
						<option selected><?php echo($day); ?></option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>4</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                        <option>13</option>
                        <option>14</option>
                        <option>15</option>
                        <option>16</option>
                        <option>17</option>
                        <option>18</option>
                        <option>19</option>
                        <option>20</option>
                        <option>21</option>
                        <option>22</option>
                        <option>23</option>
                        <option>24</option>
                        <option>25</option>
                        <option>26</option>
                        <option>27</option>
                        <option>28</option>
                        <option>29</option>
                        <option>30</option>
                        <option>31</option>
                    </select>
                </div>
                <div class="col-3">
                    <select id="month" name="month" class="form-control" required>
                        <option disabled selected>Month</option>
						<option selected><?php echo($month); ?></option>
                        <option>January</option>
                        <option>February</option>
                        <option>March</option>
                        <option>April</option>
                        <option>May</option>
                        <option>June</option>
                        <option>July</option>
                        <option>August</option>
                        <option>September</option>
                        <option>October</option>
                        <option>November</option>
                        <option>December</option>
                    </select>
                </div>
                <div class="col-3">
                    <select id="year" name="year" class="form-control" required>
                        <option disabled selected>Year</option>
						<option selected><?php echo($year); ?></option>
                        <option>1975</option>
                        <option>1976</option>
                        <option>1977</option>
                        <option>1978</option>
                        <option>1979</option>
                        <option>1980</option>
                        <option>1981</option>
                        <option>1982</option>
                        <option>1983</option>
                        <option>1984</option>
                        <option>1985</option>
                        <option>1986</option>
                        <option>1987</option>
                        <option>1988</option>
                        <option>1989</option>
                        <option>1990</option>
                        <option>1991</option>
                        <option>1992</option>
                        <option>1993</option>
                        <option>1994</option>
                        <option>1995</option>
                        <option>1996</option>
                        <option>1997</option>
                        <option>1998</option>
                        <option>1999</option>
                        <option>2000</option>
                        <option>2001</option>
                        <option>2002</option>
                        <option>2003</option>
                        <option>2004</option>
                        <option>2005</option>
                    </select>
                </div>
            </div>
        </div>
            <p class="text-left mt-2"><strong>Gender</strong></p>
        <div class="row">
            <div class="form-check col-3 ml-3 form-control">
                <input class="form-check-input" type="radio" name="gender" id="gender">
                <label class="form-check-label" for="flexRadioDefault1">Male</label>
              </div>
              <div class="form-check col-3 ml-2 form-control">
                <input class="form-check-input" type="radio" name="gender" id="gender" checked>
                <label class="form-check-label" for="flexRadioDefault2">Female</label>
              </div>
              <div class="form-check col-3 ml-2 form-control">
                <input class="form-check-input" type="radio" name="gender" id="gender" checked>
                <label class="form-check-label" for="flexRadioDefault2">Other</label>
              </div>
        </div>
        <h6 class="text-left mb-1 mt-2"><strong>Location</strong></h6>
        <div>
            <input type="text" id="address" name="address" value="<?php echo($address); ?>" placeholder="Address" class="form-control mt-2">
        </div>
        <div>
            <input type="text" id="country" value="<?php echo($country); ?>" name="country" placeholder="Country" class="form-control mt-2">
        </div>
        <h6 class="text-left mb-1 mt-2"><strong>Contact</strong></h6>
        <div>
            <p class="text-danger" id="phone"></p>
            <input type="tel" placeholder="Phone No." id="phoneNo" value="<?php echo($phoneNo); ?>" name="phoneNo" class="form-control"  onkeyup="invaNumber()">
        </div>
        <div>
            <p id="email"></p>
            <input type="text" placeholder="Email" value="<?php echo($email); ?>" class="form-control" id="Email" name="Email" onkeyup="emailCheck()">
        </div>
		<div id="error"></div>
        <button id="submit" class="btn btn-lg form-control space btn-outline-success mt-2" type="submit">Submit</button>
    </form>
    </div>
<!-- Modal -->
<div class="modal" id="PasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="post" id="Passwordform" action="Welcome/PasswordUpdate">
	   <div>
	   <div>
            <p class="" id="phone">Old Password</p>
            <input type="password" placeholder="New Password" id="opass" value="" name="opass" class="form-control" >
        </div>
	   </div>
	   <div>
            <p class="" id="phone">New Password</p>
            <input type="password" placeholder="New Password" id="pass" value="" name="pass" class="form-control" >
        </div>
        <div>
            <p id="">Confirm Password</p>
            <input type="password" placeholder="Confirm Pass" value="" class="form-control" id="cpass" name="cpass" >
        </div>
	   
      </div>
	  <div id="StatusPassword"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" id="submitpassword" class="btn btn-primary">Save changes</button>
      </div>
	  </form>
    </div>
  </div>
</div>
    </center>
    <script src="assets/fm.js"></script>
</body>
<script type="text/javascript">
    
$(document).ready(function() {

    $("#update").on("submit", function(event) {
        event.preventDefault();


        var fname =  $("#fname").val();
        var lname = $("#lname").val();
        var otherName =  $("#otherName").val();
        var day = $("#day").val();
        var month =  $("#month").val();
        var year = $("#year").val();
        var month =  $("#month").val();
        var year = $("#year").val();
        var gender =  $("#gender").val();
        var country = $("#country").val();
        var phoneNo = $("#phoneNo").val();
        var Email = $("#Email").val();
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
                       $("#error").fadeIn(1000, function() {
                            $("#error").html('<div class="alert alert-success"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; ' + response.message + ' !</div>');
                            $("#submit").html('Submit');
                        });
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

// this handles the password confirmation
	$(document).ready(function(){
		$("#cpass").keyup(function(){
				if ($("#cpass").val() != $("#pass").val()) {
					$("#StatusPassword").html("Password do not match").css("color","red");
					$("#submitpassword").prop('disabled',true);
				}else{
					$("#StatusPassword").html("Password matched").css("color","green");
					$("#submitpassword").prop('disabled',false);
			}
		});
});

// this handles passing data to the controller

</script>
<script>
$(document).ready(function() {

$("#Passwordform").on("submit", function(event) {
	event.preventDefault();


	var opass =  $("#opass").val();
	var pass = $("#pass").val();
	var form = $(this);

		$.ajax({
			type: form.attr('method'),
			url: form.attr('action'),
			data: form.serialize(),
			dataType: 'json',
			beforeSend: function() {
				$("#StatusPassword").fadeOut();
				$("#submitpassword").html('PLEASE WAIT.......');
			},
			success: function(response) {
				if (response.error == false) {
				   $("#StatusPassword").fadeIn(1000, function() {
						$("#StatusPassword").html('<div class="alert alert-success"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; ' + response.message + ' !</div>');
						$("#submitpassword").html('Save changes');
					});
				} else {
					$("#StatusPassword").fadeIn(1000, function() {
						$("#StatusPassword").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; ' + response.message + ' !</div>');
						$("#submitpassword").html('Save changes');
					});
				}
			}

		});
		

});
});


</script>
</html>
