
<?php include('header.php') ?>
<br>
<br>
<br>
<form method="post" action="register.php" style="border:1px solid #ccc">
<?php include('errors.php'); ?>
  <div class="container">
    <h3>Creeaza un cont nou</h3>
    <hr>

  <label for="email"><b>Username</b></label>
    <input type="text" placeholder="Introduceti username" name="username" value="<?php echo $username; ?>" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Introduceti email" name="email" value="<?php echo $email; ?>"  required>

    <label for="psw"><b>Parola</b></label>
    <input type="password" placeholder="Introduceti parola" name="password_1" required>

    <label for="psw-repeat"><b>Confirma parola</b></label>
    <input type="password" placeholder="Introduceti parola" name="password_2" required>
    
  <div class="input-group">
      <button type="submit" class="btn" name="reg_user">Register</button>
    </div>
    <p>
      Already a member? <a style="color:#808080" href="login.php">Sign in</a>
    </p>
  </div>
</form>

<?php include('footer.php') ?>