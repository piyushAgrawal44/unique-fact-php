<?php
 session_start();
include './_toconnect.php';
      $logged=false;
  
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
            {   
                $email = $_POST["exampleInputEmail2"];
                $password = $_POST["exampleInputPassword3"];
                $sql="SELECT * FROM `userdetails1313` WHERE `email` LIKE '$email'";
                $result= mysqli_query($conn, $sql);
              
                if($result)
                { 
                      if (mysqli_num_rows($result)>0) 
                      {
                        while ($row=mysqli_fetch_assoc($result)) {
                       
                          if (password_verify($password, $row['password'])) 
                          {
                            $name=$row['name'];
                            $logged=true;
                            setcookie("loggedin","$logged",time() +864000 ,"/");
                            $_SESSION["loggedin"]=$logged;
                            $_SESSION["username"]=$name;
                            setcookie("username","$name",time() +864000 ,"/");
                            $_SESSION["email"]=$email;
                            setcookie("email","$email",time() +864000 ,"/");
                            $_SESSION["password"]=$password;
                            
                            header("location: index.php");
                            exit;
                          }
                          else{
                            echo '<h3 style="margin: 10px; display: inline;">Invalid password...</h3>'. '<a type="button" style="margin: 10px;" href="signup.php">Go back</a>';
                          }
                        }
                        
                      }
                      else
                      {
                        echo '<h3 style="margin: 10px; display: inline;">Invalid Credentials...</h3>'. '<a type="button" style="margin: 10px;" href="signup.php">Go back</a>';
                      }
                }

                else
                {
                    echo "failed because of this error ---> ". mysqli_error($conn);
                } 
            }


?>
