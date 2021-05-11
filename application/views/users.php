
<?php 
include('header.php');
?>
<body class="bg-dark">
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a href="" class="navbar-brand mt-auto"><span class="text-danger big">M</span><span class="lit">Nerds</span></a>
            <a href="login" class="ml-auto nav-item"><button class="btn btn-sm btn-outline-primary">Login</button></a>
        </nav>
        </div>
    <div  class="justify-content-center card col-lg-5 mt-1">
        <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
        </tr>
    </thead>
    <tbody id="usertable">
        
    </tbody>
    </table>
    </div>
    <script src="assets/fm.js"></script>
<script type="text/javascript">
    
$(document).ready(function() {

    $("#reg").on("submit", function(event) {
        event.preventDefault();
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
                         document.getElementById("reg").reset();
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

function AllUsers(){
            $.ajax({  
                url: 'Welcome/AllUsers',
                dataType: 'json',
                success: function(response) {
                    if (response.error == false) {
                        var i;
                        var html;
                        var num = 1;
                        for (i = 0; i < response.message.length; i++) {
                            html += '<tr>'+
                            '<th scope="row">'+ num++  + '</th>'+
                            '<td>'+ response.message[i].fname + '</td>'+
                            '<td>'+ response.message[i].lname + '</td>'+
                            '<td>' + response.message[i].email + '</td>'+ 
                            '</tr>';
                        }
                        // this now where we append the variabl to our id 
                        $('#usertable').html(html);
                    } else {
                        $("#usertable").html('No user Found');
                    }
                }

            });    
}

AllUsers();

</script>
</body>
</html>
