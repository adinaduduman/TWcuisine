<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'register');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form

  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
  array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password_1);//encrypt the password before saving in the database
    $query = "INSERT INTO users (username, email, password) 
          VALUES('$username', '$email', '$password')";
    mysqli_query($db, $query);

    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header('location: proiect.php');
  }
}

//login
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
       $_SESSION['success'] = "You are now logged in"; 
      header('location: proiect.php');
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}

//logout
//  if (!isset($_SESSION['username'])) {
//    $_SESSION['msg'] = "You must log in first";
//    header('location: login.php');
//  }
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: index.php");
}

//contact form
  if (isset($_POST['contact_form'])) {
   $nume = mysqli_real_escape_string($db, $_POST['nume']);
   $prenume = mysqli_real_escape_string($db, $_POST['prenume']);
   $email = mysqli_real_escape_string($db, $_POST['email']);
   $subiect = mysqli_real_escape_string($db, $_POST['subiect']);
    $query = "INSERT INTO contact (nume, prenume, email, subiect) 
          VALUES('$nume', '$prenume', '$email', '$subiect')";
    mysqli_query($db, $query);
    header('location: mesaj.php');

}


//recipies form
  if (isset($_POST['recipes_form'])) {
  $confirmed = 0;
   if (isset($_SESSION['username'])&& $_SESSION['username'] == "admin") {
      $confirmed = 1;
   }
   $titlu = mysqli_real_escape_string($db, $_POST['titlu']);
   $poze = mysqli_real_escape_string($db, $_POST['poze']);
   $stil = mysqli_real_escape_string($db, $_POST['stil']);
   $timp = mysqli_real_escape_string($db, $_POST['timp']);
  $dotari = mysqli_real_escape_string($db, $_POST['dotari']);
   $abilitati = mysqli_real_escape_string($db, $_POST['abilitati']);
   $ingrediente = mysqli_real_escape_string($db, $_POST['ingrediente']);
   $descriere = mysqli_real_escape_string($db, $_POST['descriere']);
   $restrictii = mysqli_real_escape_string($db, $_POST['restrictii']);

   $username = $_SESSION['username'];
    $query = "INSERT INTO recipes (username, titlu, poze, stil, restrictii, timp, dotari, abilitati, ingrediente, descriere, confirm) 
          VALUES('$username','$titlu', '$poze', '$stil', '$restrictii', '$timp', '$dotari', '$abilitati', '$ingrediente', '$descriere', $confirmed)";
    mysqli_query($db, $query);
    header('location: mesaj.php');

}