<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/tailwind.css" />
  <link rel="stylesheet" href="../css/custom.css" />
  <script type="text/javascript" src="validators.js"></script>
  <title>Sign Up</title>
</head>

<?php
  require("../common/utils.php");

  if(isset($_REQUEST['newUser'])) {
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $contact = filter_var($_POST['contact'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    $query = 
      "INSERT INTO clients (firstname, lastname, contactNumber, email, password)
        VALUES ('$firstname', '$lastname', '$contact', '$email', '$password');";

    $result = executeQuery($query);

    if($result) {
      header("Location: ../login/login.php");
    }
  } 
?>

<body class="bg-grey-100 h-screen font-sans">
  <div class="container mx-auto h-full flex justify-center items-center">
    <div class="w-2/3 lg:w-1/3">
      <h1 class="font-light text-4xl mb-6 text-center">Register</h1>
      <form id="newUserForm" action="register.php" method="POST" onsubmit="return validateRegistation();">
        <div class="border-blue-500 p-8 border-t-8 bg-white mb-6 rounded-lg shadow-lg">

          <div class="mb-4">
            <label class="font-bold text-grey-darker block mb-2">
              Name
            </label>
            <input type="text" id="firstname" name="firstname"
              class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow"
              placeholder="Nkosinathi" />
          </div>
          <div class="mb-4">
            <label class="font-bold text-grey-darker block mb-2">
              Lastname
            </label>
            <input type="text" id="lastname" name="lastname"
              class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow"
              placeholder="Nkomo" />
          </div>
          <div class="mb-4">
            <label class="font-bold text-grey-darker block mb-2">
              Email
            </label>
            <input type="text" id="email" name="email"
              class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow"
              placeholder="n.nkomo@campus.ru.ac.za" />
          </div>
          <div class="mb-4">
            <label class="font-bold text-grey-darker block mb-2">
              Contact Number
            </label>
            <input type="number" id="contact" name="contact"
              class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow"
              placeholder="076 XXX XX87" />
          </div>
          <div class="mb-4">
            <label class="font-bold text-grey-darker block mb-2">
              Password
            </label>
            <input type="password" id="password" name="password"
              class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow"
              placeholder="Password" />
          </div>
          <div class="mb-4">
            <label class="font-bold text-grey-darker block mb-2">
              Confirm Password
            </label>
            <input type="password" id="confirm_password" name="confirm_password"
              class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow"
              placeholder="Password" />
          </div>
          <div class="inline-flex">
            <div class="flex items-center">
              <button type="submit" id="newUser" name="newUser" class="bg-blue-600 hover:bg-teal text-white font-bold py-2 px-4 rounded">
                Register
              </button>
            </div>
            <div class="flex items-center ml-2">
              <button type="button" class="bg-red-600 hover:bg-teal text-white font-bold py-2 px-4 rounded">
                Cancel
              </button>
            </div>
          </div>
        </div>
      </form>
      <div class="text-center">
        <p class="text-grey-dark text-sm">Already have an account? <a href="#"
            class="no-underline text-blue font-bold">Sign In</a>.</p>
      </div>
    </div>
  </div>
</body>
<script>
  var validateRegistation = function() {
    isValid = 
      inputValidator
      .getElementById("firstname")
      .isNotEmptyOrWhitespace()
      .getState();
  
    isValid =
      inputValidator
      .getElementById("lastname")
      .isNotEmptyOrWhitespace()
      .getState()
      && isValid;

    isValid =
      inputValidator
      .getElementById("email")
      .emailFormat()
      .getState()
      && isValid;
    
    isValid = 
      inputValidator
      .getElementById("contact")
      .predicate(
        function(value) {
          return value!==undefined && value.length>=10 && value.length<12;
        }
      )
      .getState()
      && isValid;

    isValid = 
      inputValidator
      .getElementById("password")
      .isNotEmptyOrWhitespace()
      .getState()
      && isValid;
      
    isValid = 
      inputValidator
      .getElementById("confirm_password")
      .matchingHTMLElement("password")
      .getState()
      && isValid;
    
    console.log(isValid);
    if(isValid) document.getElementById("newUserForm").submit();
    return isValid;
  }
</script>


</html>