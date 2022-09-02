<?php
require 'config.php';
if (!empty($_SESSION["id"])) {
  header("Location: student.php");
}
if (isset($_POST["submit"])) {
  $name = $_POST["name"];
  $lastname = $_POST["lastname"];
  $mname = $_POST["mname"];
  $mothername = $_POST["mothername"];
  $address = $_POST["address"];
  $pincode = $_POST["pincode"];
  $phonenumber = $_POST["phonenumber"];
  $course = $_POST["course"];
  $birthday = $_POST["birthday"];
  $gender = $_POST['gender'];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
  $duplicate = mysqli_query($conn, "SELECT * FROM student WHERE username = '$username' OR email = '$email'");
  
  if (mysqli_num_rows($duplicate) > 0) {
    echo
    "<script> alert('Username or Email Has Already Taken'); </script>";
  } else {
    if ($password == $confirmpassword) {
      $query = "INSERT INTO student VALUES('','','$name','$lastname',' $mname','$mothername','$address','$pincode','$phonenumber','$course','$birthday','$gender','$username','$email','$password')";
    $result= mysqli_query($conn, $query);
      echo
      "<script> alert('Registration Successful'); </script>";
      if($result){
      $last_id = mysqli_insert_id($conn) ;
      echo ($last_id);
      if( $last_id){
        $id_no = "STU_".$last_id;
          $query1 = "UPDATE student SET id_no ='".$id_no."' WHERE id = '".$last_id."' ";
          $res1 = mysqli_query($conn,$query1);
     }
    }
      // header("Location: index.php?page=students");
    } else {
      echo
      "<script> alert('Password Does Not Match'); </script>";
    }
  }
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <title>Registration</title>
  <style>
     body {
      background: grey;
    }

    .btn {
      margin-top: 10%;
      background-color: grey;
    }

    .col-25 {
      float: left;
      width: 25%;
      margin-top: 6px;
    }

    .col-75 {
      float: left;
      width: 75%;
      margin-top: 6px;
    }
  </style>
</head>

<body>
  <section class="vh-100 background">
    <div class="container py-5 h-100">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col-12 col-lg-9 col-xl-7">
          <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
            <div class="card-body p-4 p-md-5">
              <h2>Registration</h2>
              <form class="" action="" method="post" autocomplete="off">
                <table>


                  <tr>
                    <td><label for="name">First Name : </label></td>
                    <td><input type="text" name="name" id="name" required value=""> </td>
                  </tr>
                  <tr>
                    <td><label for="lname">Last Name : </label></td>
                    <td><input type="text" name="lastname" id="lastname" required value=""></td>
                  </tr>
                  <tr>
                    <td><label for="mname">Middle Name : </label></td>
                    <td><input type="text" name="mname" id="mname" required value=""></td>
                  </tr>
                  <tr>
                    <td><label for="mothername">Mothers Name : </label> </td>
                    <td><input type="text" name="mothername" id="mothername" required value=""></td>
                  </tr>
                  <tr>
                    <td><label for="address">Address : </label></td>
                    <td><input type="text" name="address" id="address" required value=""></td>
                  </tr>
                  <tr>
                    <td><label for="pincode">Pin Code : </label></td>
                    <td><input type="text" name="pincode" id="pincode" required value=""></td>
                  </tr>
                  <tr>
                    <td><label for="phonenumber">Phone Number : </label></td>
                    <td><input type="text" name="phonenumber" id="phonenumber" required value=""></td>
                  </tr>
                  <tr>
                    <td><label for="course">Course: </label></td>
                    <td><input type="text" name="course" id="course" required value=""></td>
                  </tr>
                  <tr>
                    <td><label for="birthday">Birth Date : </label></td>
                    <td><input type="date" name="birthday" id="birthday" required value=""></td>
                  </tr>
                  <tr>
                    <td><label for="gender">Gender</label></td>
                    <td><input type="radio" name="gender" id="gender" value="male">Male</td>
                    <td><input type="radio" name="gender" id="gender" alue="female">Female</td>
                  </tr>
                  <tr>
                    <td><label for="username">Username : </label></td>
                    <td><input type="text" name="username" id="username" required value=""></td>
                  </tr>
                  <tr>
                    <td><label for="email">Email : </label></td>
                    <td><input type="email" name="email" id="email" required value=""></td>
                  </tr>
                  <tr>
                    <td><label for="password">Password : </label></td>
                    <td><input type="password" name="password" id="password" required value=""></td>
                  </tr>
                  <tr>
                    <td><label for="confirmpassword">Confirm Password : </label></td>
                    <td><input type="password" name="confirmpassword" id="confirmpassword" required value=""></td>
                  </tr>
                  <tr>
                    <td><button type="submit" name="submit" class="btn">Register</button></td>
                   <!-- <td><a href="loginpage.php">Login</a></td>  -->
                  </tr>
  

                </table>
                 
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
</body>

</html>