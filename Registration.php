<?php
session_start();

// Check if user is logged in
if (isset($_SESSION['employeeId'])) {
  header("Location: ./slot_Booking.php");
exit();
} 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/styles.css" />
    <link
      rel="shortcut icon"
      href="assets/shortcut-car.png"
      type="image/x-icon"
    />
    <title>Transport Management System</title>
    <script src="scripts/script.js"></script>
    <script src="scripts/form_validation.js"></script>
    
    
  </head>
  <body id="registration">
    <video autoplay loop muted plays-inline class="back-video" id="myVideo">
      <source src="./assets/bg.mp4" type="video/mp4" />
    </video> 
    <nav class="container-nav">
      <div class="main-head">
        <div class="heading">
          <h1>Transport Management System</h1>
        </div>
      </div>
    </nav>
    <div class="sign-in" id="sign-in-form">
     
      <form class="form-group" id="employeeLogin" onsubmit="return LoginvalidateForm()" method="post" action="php/loginCheck.php" >
        <div class="type-selection">
          <div class="employee-type" id="employee" onclick="showEmployee()">
         Employee
          </div>
          <div class="employee-type" id="admin" onclick= "showAdmin()">
            Admin
          </div>
        </div>
        <h3>Welcome, please enter your details!</h3>
        <label class="form-label my-2">Employee Id</label>
        <input class="form-input my-2" name="id" id="empid" type="text" />
        <label class="form-label my-2">Password</label>
        <input class="form-input my-2" name="password" type="password" id="passwordInput" />
        <div class="form-check">
          <input type="checkbox" class="form-input" id="showPassword" onchange="showPasswordCheckbox()"> 
          <label for="showPassword" class="form-label my-2">Show Password</label>
        </div>
        <label class="form-label my-2">Organization Name</label>
        <select class="form-input my-2" name="orgName" id="orgName">
          <option value="" selected  hidden value="">Choose here</option>
          <option value="cmp1">Power School India Pvt Ltd</option>
          <option value="cmp2">Purpose pvt ltd</option>
          <option value="cmp3">Rgukt rk valley</option>
          <option value="cmp4">Amazon</option>
          <option value="cmp5">Google</option>
          <option value="cmp6">Accenture</option>
          <option value="cmp7">IBM</option>
          <option value="cmp8">Cognizant</option>
          <option value="cmp9">TCS</option>
          <option value="cmp10">Capgemini</option>
        </select>
        <input class="button my-2" value="Login" type="submit" ></input>
        <p class="my-2">
          Don't have an account?
          <a href="#" onclick="showSignInForm()">Sign up</a>
        </p>
      </form>

      <form class="form-group" id="adminLogin"  onsubmit="return AdminvalidateForm()" method="post" action="php/adminCheck.php" >
        <div class="type-selection">
          <div class="employee-type" id="employee1" onclick="showEmployee()">
         Employee
          </div>
          <div class="employee-type" id="admin1" onclick= "showAdmin()">
            Admin
          </div>
        </div>
        <h3>Welcome, please enter your details!</h3>
        <label class="form-label my-2">Admin Id</label>
        <input class="form-input my-2" name="id" id="adminid" type="text" />
        <label class="form-label my-2">Password</label>
        <input class="form-input my-2" name="password" type="password" id="passwordInputAdmin" />
        <div class="form-check">
          <input type="checkbox" class="form-input" id="showPassword" onchange="showPasswordCheckbox()"> 
          <label for="showPassword" class="form-label my-2">Show Password</label>
        </div>
       
        <input class="button my-2" value="Login" type="submit" ></input>
       
      </form>
      
    </div>
    <div class="sign-up" id="sign-up-form">
      <form class="form-group"  onsubmit="return signUpvalidateForm()" method="post" action="php/SignUpInsert.php">
        <h3>Hello, Please create your account</h3>
        <label class="form-label my-2">Employee Id</label>
        <input class="form-input my-2" id="empidregister" name = "empidregister" type="text" placeholder="Enter Employee Id" />
        <label class="form-label my-2">Name</label>
        <input class="form-input my-2" id="employeename" name = "employeename" type="text" placeholder="Enter your Name" />
        <label class="form-label my-2">Email</label>
        <input type="email" class="form-input my-2"id="emailregister"name="emailregister"placeholder="Enter your Email" />
        <label class="form-labe my-2">Organization Name</label>
        <select class="form-input my-2" name="orgNameregister" id="orgNameregister">
          <option value="" selected  hidden value="">Choose here</option>
          
          <option value="cmp1">Power School India Pvt Ltd</option>
          <option value="cmp2">Purpose pvt ltd</option>
          <option value="cmp3">Rgukt rk valley</option>
          <option value="cmp4">Amazon</option>
          <option value="cmp5">Google</option>
          <option value="cmp6">Accenture</option>
          <option value="cmp7">IBM</option>
          <option value="cmp8">Cognizant</option>
          <option value="cmp9">TCS</option>
          <option value="cmp10">Capgemini</option>
        </select>
        <label class="form-label my-2">Address</label>
        <textarea rows="3" type="text" class="form-input my-2"id="address" name="address" placeholder="Enter your Address"></textarea> 
        <label class="form-labe my-2">Password</label>
        <input class="form-input my-2" type="password" id="passwordtype1" name="passwordtype1" placeholder="Enter your Password" />

        <label class="form-labe my-2">Confirm password</label>
        <input class="form-input my-2" type="password" id="passwordtype2" placeholder="Renter your Password"/>

        <button class="button my-2" type="submit">Register</button>
        <p class="my-2">
          Already had an account?
          <a href="#" onclick="showSignUpForm()">Login</a>
        </p>
      </form>
    </div>
  </body>
</html>
