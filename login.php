

<?php include('header.php') ?>

<form action="login.php" method="POST">
<?php include('errors.php'); ?>
  <div class="imgcontainer">
    <img src="login.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Nume utilizator</b></label>
    <input type="text" placeholder="Introduceti numele" id="user" name="username" required>

    <label for="psw"><b>Parola</b></label>
    <input type="password" placeholder="Introduceti parola" id="pass" name="password" required>
        
  <div class="input-group">
      <button type="submit" class="btn" name="login_user">Login</button>
    </div>
    <p>
      Not yet a member? <a  style="color:#808080" href="register.php">Sign up</a>
    </p>
</div>
</form>

<?php include('footer.php') ?>