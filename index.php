<?php
 session_start();
include './_toconnect.php';
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
    <link rel="stylesheet" href="./index.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <title>Unique Facts</title>
</head>

<body class="body">

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-primary sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand p-2" href="#">Unique Facts</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
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
                  echo "<a class='btn btn-outline-light rounded-pill' href='signup.php' type='submit'>Log in or Sign up</a>";
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

    <!-- main body -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-12 col-sm-8 " style="overflow: hidden;">
              <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active" data-bs-interval="10000">
                    <img src="https://cdn.hipwallpaper.com/m/79/77/xsoLDj.jpg" width="100%" height="350px" style="object-fit: cover;" class="d-block" alt="img">
                    <div class="carousel-caption">
                      <h5 class="font-heading-sm text-light">What Is a Galaxy?</h5>
                      <p class="p-3 font-sm text-light">A galaxy is a huge collection of gas, dust, and billions of
                        stars and their solar systems, all held together by gravity.</p>
                    </div>
                  </div>
                  <div class="carousel-item" data-bs-interval="2000">
                    <img src="https://wallpaperaccess.com/full/682821.jpg" width="100%" height="350px" style="object-fit: cover;" class="d-block" alt="img">
                    <div class="carousel-caption ">
                      <h5 class="font-heading-sm text-light">Fact about earth</h5>
                      <p class="p-3 font-sm text-light">Earth has a powerful magnetic field. This phenomenon is caused by the nickel-iron core of 
                        the planet, coupled with its rapid rotation.</p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="https://cdn.wallpapersafari.com/87/70/2cM8Dh.jpg" width="100%" height="350px" style="object-fit: cover;" class="d-block" alt="img">
                    <div class="carousel-caption ">
                      <h5 class="font-heading-sm text-light">Facts About Grass</h5>
                      <p class="p-3 font-sm text-light">Over 10,000 Different Types of Grass Exist. Almost every habitat and biome on 
                        our planet has some type of grass as its resident.</p>
                    </div>
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-skip-backward-fill" viewBox="0 0 16 16">
                    <path d="M.5 3.5A.5.5 0 0 0 0 4v8a.5.5 0 0 0 1 0V8.753l6.267 3.636c.54.313 1.233-.066 1.233-.697v-2.94l6.267 3.636c.54.314 1.233-.065 1.233-.696V4.308c0-.63-.693-1.01-1.233-.696L8.5 7.248v-2.94c0-.63-.692-1.01-1.233-.696L1 7.248V4a.5.5 0 0 0-.5-.5z"/>
                  </svg>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-skip-forward-fill" viewBox="0 0 16 16">
                    <path d="M15.5 3.5a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0V8.753l-6.267 3.636c-.54.313-1.233-.066-1.233-.697v-2.94l-6.267 3.636C.693 12.703 0 12.324 0 11.693V4.308c0-.63.693-1.01 1.233-.696L7.5 7.248v-2.94c0-.63.693-1.01 1.233-.696L15 7.248V4a.5.5 0 0 1 .5-.5z"/>
                  </svg>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            </div>

            <div class="col-12 col-sm-4">
                <h1 class="brand-line">We Think for You!!</h1>

                <h5 class="someline">
                    We beleive in fact that without providing value to the socity,
                    we can not grow...
                </h5>
                <p class="someline">
                    -Piyush Agrawal
                </p>

                <div class="text-center btn-1">
                    <a class="btn btn-primary" href="#" >Discover More Facts</a>
                </div>
            </div>
        </div>
      

        <?php
          if (!isset($_COOKIE["loggedin"]) || $_COOKIE["loggedin"]!=true ) {
           echo '
            <div class="row mt-4">
                  <h3 class="text-center"><u>Subscribe Us</u></h3>
                  <div class="col-12 col-sm-8 offset-sm-2">
                    <form action="./signup.php" method="POST">
                      <div class="mb-3">
                        <label for="exampleInputname1" class="form-label">Name</label>
                        <input type="text" required class="form-control" name="exampleInputname1" id="exampleInputname1">
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" required class="form-control" id="exampleInputEmail1" name="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We never share your email with anyone else.</div>
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" required class="form-control" name="exampleInputPassword1" id="exampleInputPassword1" >
                      </div>
                      <div class="mb-3">
                        <label for="Phone" class="form-label">Phone</label>
                        <input type="number" required class="form-control" id="phone" name="phone" >
                      </div>
                      <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" required class="form-control" id="city" name="city" >
                      </div>
                      <div class="mb-3">
                        <label for="DOB" class="form-label">DOB</label>
                        <input type="date" required class="form-control" id="DOB" name="DOB" >
                      </div>

                      <div class="mb-3 form-check">
                        <input type="checkbox" required class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                  </div>
            </div>
               ';
          }
          else{
            echo '
            <h3 class="text-center mt-5 mb-3">Your Details</h3>
            
            <table class="table" id="myTable">
              <thead>
                <tr>
                  <th scope="col">S.No</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">DOB</th>
                  <th scope="col">Phone</th>
                  <th scope="col">City</th>
                </tr>
              </thead>';
              ?>
              <?php
                 $temp2=$_COOKIE['email'];
                  $sql = "SELECT * FROM `userdetails1313` WHERE (`email`) LIKE '$temp2'";
                  $result = mysqli_query($conn, $sql);
                  $sno = 0;
                  while($row = mysqli_fetch_assoc($result))
                  {
                        $sno = $sno + 1;
                            echo '
                        <tbody>
                            <tr>
                              <th scope="row">'. $sno . '</th>
                              <td>'. $row['name'] . '</td>
                              <td>'. $row["email"] . '</td>
                              <td>'. $row["dob"] . '</td>
                              <td>'. $row["phone"] . '</td>
                              <td>'. $row["city"] . '</td>
                            </tr>
                   ';
                  }
                  echo ' </tbody>
                  </table>';

                }

        ?>
       

    </div>
    <!-- main body end -->

    <!-- footer -->
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12 col-sm-4">
                <h4 class="text-center">About Us</h4>
                <hr>
                <p class="text-center">uigisufauigauisgfugas
                    fsafsjkkfasgkgbka
                    sbjfkbfkjcsbjkcfkja
                   
                </p>
            </div>
            <div class="col-12 col-sm-4">
                <h4 class="text-center">Contact Us</h4>
                <hr>
                <p class="text-center">uigisufauigauisgfugas
                    fsafsjkkfasgkgbka
                    sbjfkbfkjcsbjkcfkja
                    schaisdhfihasidhfiaisodhf
                    
                </p>
            </div>
            <div class="col-12 col-sm-4">
                <h4 class="text-center">Tell Us</h4>
                <hr>
                <p class="text-center">uigisufauigauisgfugas
                    fsafsjkkfasgkgbka
                    sbjfkbfkjcsbjkcfkja
                    schaisdhfihasidhfiaisodhf
                </p>
            </div>
        </div>

        <h6 class="mt-2 text-center">@ copyright 2021 piyush agrawal</h6>
    </div>
    <!-- footer end -->

   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();

    });
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