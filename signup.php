<?php
      session_start();
      include './_toconnect.php';
      $logged=false;
      $exist=false;
      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {   
          $name=$_POST["exampleInputname1"];
          $email = $_POST["exampleInputEmail1"];
          $password = $_POST["exampleInputPassword1"];
          $dob= $_POST["DOB"];
          $phone= $_POST["phone"];
          $city= $_POST["city"];
          $hashPassword= password_hash($password, PASSWORD_DEFAULT);

          $sql="SELECT * FROM `userdetails1313`  WHERE (`email`) LIKE '$email'";
          $result = mysqli_query($conn, $sql); 

          if(mysqli_num_rows($result)>0){
            $exist=true;
          }
          else if(mysqli_num_rows($result)==0) {
          $sql = "INSERT INTO `userdetails1313` (`name`,`email`, `password`,`dob`,`phone`,`city`) VALUES ('$name','$email', '$hashPassword','$dob','$phone','$city')";
          $result = mysqli_query($conn, $sql);
        
            if($result){ 
              $logged=true;
              setcookie("loggedin","$logged",time() +864000 ,"/");
              
              $_SESSION["loggedin"]=$logged;
              $_SESSION["username"]=$name;
              setcookie("username","$name",time() +864000 ,"/");
              
              $_SESSION["email"]=$email;
              setcookie("email","$email",time() +864000 ,"/");
              $_SESSION["password"]=$password;
              header('location: index.php');
            }
            else{
                echo "failed because of this error ---> ". mysqli_error($conn);
            } 
        }
        else{
          echo "failed because of this error ---> ". mysqli_error($conn);
        } 
      }
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>login</title>
</head>

<body style="max-width: 1300px; margin: auto;">

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-primary sticky-top">

      <div class="container-fluid">
        <a class="navbar-brand p-2" href="#">Unique Facts</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Categories
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Motivation</a></li>
                <li><a class="dropdown-item" href="#">Happiness</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">See 20+ more</a></li>
              </ul>
            </li>
          </ul>

          <?php
                if (!isset($_COOKIE["loggedin"]) || $_COOKIE["loggedin"]!=true ) {
                    echo "<a class='btn btn-outline-light active rounded-pill' href='#' type='submit'>Log in or Sign up</a>";
                }
                else{
                    echo ' <div class="btn-group">
                              <button style="min-width: 180px; box-sizing: border-box;" class="btn bg-white dropdown-toggle" type="button" id="defaultDropdown" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle m-1" viewBox="0 0 16 16">
                                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                  </svg>'. $_COOKIE["username"].'
                              </button>
                              <ul class="dropdown-menu" style="max-width: 180px" aria-labelledby="defaultDropdown">
                                  <li><a class="dropdown-item text-primary" href="#"><u>Your Fav</u></a></li>
                                  <li><a class="dropdown-item text-primary" href="#"><u>Special for you</u></a></li>
                                  <li><a class="dropdown-item text-danger" href="#"><u>Delete account</u></a></li>
                                  <li><a class="btn btn-outline-success m-2" href="logout.php" type="submit">Logout</a></a></li>
                              </ul>
                          </div>';
                }
              ?>
        </div>
      </div>

    </nav>
    <!-- nav end -->
  <?php
      if ($exist) {
        # code...
        echo '<div class="text-danger p-1 exist" id="exist" name="exist" >email already registered... try other email.</div>';
      }
    ?>

      <div class="container bg-light col-11 col-sm-8 offset-auto mt-5"
        style="padding: 10px 20px 10px 20px; margin: auto; border-radius: 20px;">

        <div id="carouselExampleDark" class="carousel slide ">

          <div class="text-center">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="btn btn-sm btn-primary"
              aria-current="true" aria-label="Slide 1">Log in</button>
            <button type="button" class="btn btn-sm btn-primary" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
              aria-label="Slide 2">Sign up</button>
          </div>

          <div class="carousel-inner">
            <!-- Login Page -->
            <div class="carousel-item active container">
              <form action="./login.php" onsubmit="return validateFormone()" method="POST">
                <h5 class="text-center p-2"><u>Login Page</u></h5>
                <div class="mb-3">
                  <label for="exampleInputEmail2" class="form-label">Email address</label>
                  <input type="email" onkeyup="remove_email_warning()" placeholder="example@gmail.com" class="form-control"
                    id="exampleInputEmail2" name="exampleInputEmail2" aria-describedby="emailHelp">
                  <div id='emailHelp2'></div>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword3" class="form-label">Password</label>
                  <input type="password" onkeyup="remove_password_warning()" class="form-control" id="exampleInputPassword3"
                    name="exampleInputPassword3">
                  <div id='passwordHelp2'></div>
                </div>
                <div class="mb-3 form-check">
                  <input type="checkbox" onclick="remove_checkbox_warning()" class="form-check-input" id="exampleCheck2">
                  <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  <div id='checkboxHelp2'></div>
                </div>
                <button type="submit" class="btn btn-primary">Log In</button>
              </form>
            </div>

            <!-- sign up -->
            <div class="carousel-item container">
              <form action="./signup.php" onsubmit="return validateForm()" method="POST">
                <h5 class="text-center p-2"><u>Signup Page</u></h5>
                <div class="mb-2">
                  <label for="name" class="form-label">Name</label>
                  <input type="name" placeholder="Enter your name" onkeypress="nameenter()" class="form-control"
                    id="exampleInputname1" name="exampleInputname1" aria-describedby="emailHelp">
                  <div id="nameHelp" class="form-text"></div>
                </div>
                <div class="mb-2">
                  <label for="exampleInputEmail1" class="form-label">Email address</label>
                  <input type="email" placeholder="example@gmail.com" onclick=" emailclick()" onkeypress="emailenter()" class="form-control"
                    id="exampleInputEmail1" name="exampleInputEmail1" aria-describedby="emailHelp">
                  <div id="emailHelp" class="form-text">We care about your privacy.</div>

                </div>
                <div class="mb-2">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" onkeyup="passwordenter()" class="form-control" name="exampleInputPassword1"
                    id="exampleInputPassword1">
                  <div id="passwordcheck1" class="form-text"></div>
                </div>
                <div class="mb-2">
                  <label for="exampleInputPassword1" class="form-label">Re Write the Password</label>
                  <input type="password" onkeyup="password2enter()" class="form-control" name="exampleInputPassword2"
                    id="exampleInputPassword2">
                  <div id="passwordcheck2" class="form-text">Confirm password</div>
                </div>
                <div class="mb-3">
                  <label for="phone" class="form-label">Phone</label>
                  <input type="number" required class="form-control" id="phone" name="phone">
                </div>
                <div class="mb-3">
                  <label for="city" class="form-label">City</label>
                  <input type="text" required class="form-control" id="city" name="city">
                </div>
                <div class="mb-3">
                  <label for="DOB" class="form-label">DOB</label>
                  <input type="date" required class="form-control" id="DOB" name="DOB">
                </div>
                <div class="mb-2 form-check">
                  <input type="checkbox" onclick="checkenter()" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  <div id="checkbox" class="form-text"></div>
                </div>
                <button id="formsubmit" type="submit" class="btn btn-primary">Sign Up</button>
              </form>
            </div>
          </div>

        </div>

      </div>

      <script>
        function validateFormone() {

          var p = document.getElementById('exampleInputEmail2').value;
          var q = document.getElementById('exampleInputPassword3').value;

          if (p == "") {
            document.getElementById('emailHelp2').innerHTML = "<span class='text-danger'>Error!! This is required.";
            return false;
          }
          if (q == "") {
            document.getElementById('passwordHelp2').innerHTML = "<span class='text-danger'>Error!! This is required.";
            return false;
          }
          if (!document.getElementById('exampleCheck2').checked) {
            document.getElementById('checkboxHelp2').innerHTML = "<span class='text-danger'>Error!! This is required.";
            return false;
          }
        }

        function remove_email_warning() {
          document.getElementById("exist").innerText = "";
          document.getElementById('emailHelp2').innerText = "";
        }
        function remove_password_warning() {
          document.getElementById('passwordHelp2').innerText = "";
        }
        function remove_checkbox_warning() {
          document.getElementById('checkboxHelp2').innerText = "";
        }

        // sign up

        function validateForm() {
          var w = document.getElementById('exampleInputname1').value;
          var z = document.getElementById('exampleInputEmail1').value;
          var x = document.getElementById('exampleInputPassword1').value;
          var y = document.getElementById('exampleInputPassword2').value;
          if (w == "") {
            document.getElementById('nameHelp').innerHTML = "<span class='text-danger'>Error!! this field is required.";
            return false;
          }
          if (z == "") {
            document.getElementById('emailHelp').innerHTML = "<span class='text-danger'>Error!! this field is required.";
            return false;
          }
          if (x == "") {
            document.getElementById('passwordcheck1').innerHTML = "<span class='text-danger'>Error!! this field is required.";
            return false;
          }
          if (x != y) {
            document.getElementById('passwordcheck2').innerHTML = "<span class='text-danger'>Error!! password is not matching.";
            return false;
          }
          if (!document.getElementById('exampleCheck1').checked) {
            document.getElementById('checkbox').innerHTML = "<span class='text-danger'>Error!! this field is required.";
            return false;
          }

        }
      
        function emailclick(){
          document.getElementById("exist").innerText = "";
          document.getElementsByClassName("exist").innerText = "";
        }
        function emailenter() {
          document.getElementById("exist").innerText = "";
          document.getElementsByClassName("exist").innerText = "";
          document.getElementById('emailHelp').innerText = "We'll never share your email with anyone else.";

        }
        function passwordenter() {
          document.getElementById('passwordcheck1').innerText = "";
        }
        function password2enter() {
          document.getElementById('passwordcheck2').innerText = "";
        }
        function checkenter() {
          document.getElementById('checkbox').innerText = "";
        }
        function nameenter() {
          document.getElementById('nameHelp').innerText = "";
        }

      </script>

      <!-- Optional JavaScript; choose one of the two! -->

      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

      <!-- Option 2: Separate Popper and Bootstrap JS -->
      <!--
        
        
          <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        -->
</body>

</html>