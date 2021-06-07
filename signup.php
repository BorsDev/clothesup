<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Login Template</title>

  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="CSS/signup.css">
</head>
<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="img/login.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <p class="login-card-description py-2">Sign Up</p>
              </div>
              <form action="incl/signup.inc.php" method="post">
                <div class="row">
                  <div class="form-group col">
                    <label for="FName" >First Name</label>
                    <input type="text" name="Fname" class="form-control" id="FName" placeholder="First Name" required>
                  </div>
                  <div class="form-group col">
                    <label for="Lname">Last Name</label>
                    <input type="text" name="Lname" class="form-control" id="Lname" placeholder="Last Name" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="Emailinput">Email</label>
                  <input type="text" name="email" class="form-control" id="Emailinput" placeholder="Ex. yourname@hotmail.com" required>
                </div>
                <div class="form-group">
                  <label for="PNumberinput">Phone Number</label>
                  <div class="input-group mb-2">
                    <input type="text" name="Pnumber" class="form-control" id="PNumberinput" placeholder="+62-812-xxxx-xxxx">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col">
                    <label for="Passwordinput">Password</label>
                    <input type="password" name="pwd" class="form-control" id="Passwordinput" placeholder="Password" required>
                  </div>
                  <div class="form-group col">
                    <label for="Passwowrdinput">Confirm Password</label>
                    <input type="password" name="pwdrepeat" class="form-control" id="Passwowrdinput" placeholder="Re-type Password" required>
                  </div>
                </div>
                <input id="login" class="btn btn-block login-btn mb-4" type="submit" name="submit" value="Sign Up">
              </form>
              <?php
                if (isset($_GET["error"])){
                  if ($_GET["error"] == "emptyinput") {
                    echo "<p>Fill All Fields</p>";
                  }
                  else if ($_GET["error"] == "invalidUsername") {
                    echo "<p>Use Character a-z, A-Z, 0-9!</p>";
                  }
                  else if ($_GET["error"] == "invalidEmail") {
                    echo "<p>Chechk your Email Format</p>";
                  }
                  else if ($_GET["error"] == "pwdunmatch") {
                    echo "<p>Pasword Do Not Match</p>";
                  }
                  else if ($_GET["error"] == "usernameTaken") {
                    echo "<p>Username taken</p>";
                  }
                  else if ($_GET["error"] == "EmailTaken") {
                    echo "<p>E-Mail taken</p>";
                  }
                  else if ($_GET["error"] == "stmterror") {
                    echo "<p>Something went wrong, Please try again</p>";
                  }
                  else if ($_GET["error"] == "none") {
                    echo "<p class='py-2'>You Have sign Up! Go To <a href='login.php'>Login Page</a></p>";
                  }
                }
                ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!--JS Script-->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

  <script type="text/javascript">
    $(document).ready(function(){

      // Dapatkan Data Provinsi
      $.ajax({
        url: 'https://dev.farizdotid.com/api/daerahindonesia/provinsi',
        success: function(result){
          // alert('done');
          // console.log(result);
          $('#provinsi').append('<option>Province</option>');
          $.each( result.provinsi, function( key, value) {
            $('#provinsi').append('<option value="'+value.id+'">'+value.nama+'</option>');
          })
        }
      });

      // Dapatkan Data Kabupaten
      $('#provinsi').on('change', function() {
        var kabupaten = $(this).val();
        $('#kabupaten').empty();
        $('#kecamatan').empty();
        $('#kelurahan').empty();
        $.ajax({
          url: 'https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi='+kabupaten,
          success: function(result){
            // alert('done');
            // console.log(result);
            $('#kabupaten').append('<option>City</option>');
            $.each( result.kota_kabupaten, function( key, value) {
              $('#kabupaten').append('<option value="'+value.id+'">'+value.nama+'</option>');
            })
          }
        });
      });

      // Dapatkan Data Kecamatan
      $('#kabupaten').on('change', function() {
        var kecamatan = $(this).val();
        $('#kecamatan').empty();
        $('#kelurahan').empty();
        $.ajax({
          url: 'https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota='+kecamatan,
          success: function(result){
            // alert('done');
            // console.log(result);
            $('#kecamatan').append('<option>Districts</option>');
            $.each( result.kecamatan, function( key, value) {
              $('#kecamatan').append('<option value="'+value.id+'">'+value.nama+'</option>');
            })
          }
        });
      });

      // Dapatkan Data Kelurahan
      $('#kecamatan').on('change', function() {
        var kelurahan = $(this).val();
        $('#kelurahan').empty();
        $.ajax({
          url: 'https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan='+kelurahan,
          success: function(result){
            // alert('done');
            // console.log(result);
            $('#kelurahan').append('<option>Sub-districts</option>');
            $.each( result.kelurahan, function( key, value) {
              $('#kelurahan').append('<option value="'+value.id+'">'+value.nama+'</option>');
            })
          }
        });
      });
    });
  </script>
</body>
</html>