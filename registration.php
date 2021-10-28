<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Membership Registration</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  </head>
  <body>
  <div>
    <?php
    if(isset($_POST['create'])){
      $studentid  = $_POST['studentid'];
      $email      = $_POST['email'];
      $phone      = $_POST['phone'];
      $password   = $_POST['password'];
      $gender     = $_POST['gender'];

      echo $studentid . " " . $email;
    }
    ?>

  </div>

  <div>
<!-- FORM -->
    <form class="form" action="registration.php" method="post">
      <div class="container">

        <div class="row">

          <div class="col-sm-3">
          <h1>Membership Registration</h1>
          <p>Fill in the following form.</p>
          <hr class="mb-3">

<!-- FORM CONTENT -->
          <label for="studentid"><b>Student ID</b></label>
          <input class="form-control" id="studentid" type="text" name="studentid" required>

          <label for="email"><b>Email Address</b></label>
          <input class="form-control" id="email" type="email" name="email" required>

          <label for="phone"><b>Phone Number</b></label>
          <input class="form-control" type="text" id="phone" name="phone" required>

          <label for="password"><b>Password</b></label>
          <input class="form-control" id="password" type="password" name="password" required>
          <input type="checkbox" onclick="myFunction()">Show password
          <script>
            function myFunction() {
              var x = document.getElementById("password");
              if(x.type === "password"){
                  x.type = "text";
                }else{
                x.type = "password";
                }
            }
          </script><br>

          <label for="gender">Gender</label>
          <select name="gender" id="gender">
          <option value="male">Male</option>
          <option value="female">Female</option>
          </select>

          <hr class="mb-3">
          <input class="btn btn-primary" type="submit" name="create" id="register" value="Sign Up">
          </div>

        </div>
      </div>
    </form>

  </div>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
       <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
       <script type="text/javascript">
          $(function(){
            $('#register').click(function(e){

              var valid = this.form.checkValidity();

              if(valid){

                var studentid  = $('#studentid').val();
                var email      = $('#email').val();
                var phone      = $('#phone').val();
                var password   = $('#password').val();
                var gender     = $('#gender').val();
                
                e.preventDefault();

                $.ajax({
                  type: 'POST',
                  url: 'process.php',
                  data: { studentid: studentid,email: email,phone: phone,password: password,gender: gender},
                  success: function(data){
                    Swal.fire({
                                'title': 'Successful',
                                'text': data,
                                'type': 'success'
                              })

                  },
                  error: function(data){
                    Swal.fire({
                                'title': 'Error',
                                'text': 'There are errors while saving the data.',
                                'type': 'error'
                              })
                  }

                });

              }else{
                
              }

            });

          });
       </script>

  </body>
</html>