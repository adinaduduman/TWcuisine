<?php include('header.php') ?>
<?php
if (!isset($_SESSION['username'])){
  header('location: login.php');
}
?>

<h2 style="text-align:center"> Echipa noastra va este recunoscatoare pentru implicare! </h2>
<div class="ex1"> 
Daca sunteti o bucatareasa priceputa sau un bucatar iscusit, puteti fie sa ne trimiteti o reteta pe care sa o publicam pentru cititorii nostri, fie sa deveniti unul dintre autorii site-ului nostru de retete culinare.<br>
  <br>
</div>

<div class="container">
  <form method="post" action="trimite.php">
  <?php include('errors.php'); ?>

    <label for="fname"><b>Titlu reteta</b></label>
    <input type="text" id="fname" name="titlu" >

    <label for="subject"><b>Poze</b></label>
    <textarea id="subject" name="poze" style="height:100px"></textarea>

     <label for="lname"><b>Stil de viata</b></label>
    <select name="stil">
    <option value="vegetarian">Vegetarian</option>
    <option value="vegan">Vegan</option>
    <option value="de post">De post</option>
  </select>

   <label for="lname"><b>Restrictii alimentare</b></label>
    <select name="restrictii">
    <option value="diabet">Diabet</option>
    <option value="alergii">Alergii</option>
    <option value="alaptare">Alaptare</option>
  </select>

 <label for="lname"><b>Timp</b></label>
    <select name="timp">
    <option value="10min">10min</option>
    <option value="30min">30min</option>
    <option value="50min">50min</option>
  </select>

  <label for="lname"><b>Dotari din bucatarie</b></label>
    <select name="dotari">
    <option value="cuptor cu microunde">Cuptor cu microunde</option>
    <option value="aragaz">Aragaz</option>
    <option value="coacere">Coacere</option>
  </select>

    <label for="lname"><b>Conform abilitatilor</b></label>
    <select name="abilitati">
    <option value="incepator">Incepator</option>
    <option value="avansat">Avansat</option>
    <option value="expert">Expert</option>
  </select>


    <label for="subject"><b>Ingrediente</b></label>
    <textarea id="subject" name="ingrediente" placeholder="Scrieti mesajul.." style="height:200px"></textarea>

     <label for="subject"><b>Descriere</b></label>
    <textarea id="subject" name="descriere" placeholder="Scrieti mesajul.." style="height:200px"></textarea>

      <div class="clearfix">
      <button type="submit" class="signupbtn" name="recipes_form"><a href="mesaj.php">Trimite </a></button>
    </div>

  </form>
</div>
<?php include('footer.php') ?>