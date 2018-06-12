<?php include('header.php') ?>

<?php
$recipes_check_query = "SELECT * FROM recipes WHERE confirm=1";
$result = mysqli_query($db, $recipes_check_query);
$recipes = mysqli_fetch_all($result);
?>

<div class="sidebar">

<div class="filtrare">
<h3> Stil de viata </h3>
  <input name="checkbox" type="checkbox" id="Vegetarian" />
  <label for="Vegetarian"> Vegetarian</label>
  <br><br>
  <input name="checkbox" type="checkbox" id="Vegan" />
  <label for="Vegan"> Vegan </label>
  <br><br>
  <input name="checkbox" type="checkbox" id="Post" />
  <label for="Post"> De post </label>
  <br><br>
</div>
<div class="filtrare">
<h3> Restrictii alimentare </h3>
  <input name="checkbox" type="checkbox" id="Diabet" />
  <label for="Diabet"> Diabet</label>
  <br><br>
  <input name="checkbox" type="checkbox" id="Alergii" />
  <label for="Alergii"> Alergii </label>
  <br><br>
  <input name="checkbox" type="checkbox" id="Alaptare" />
  <label for="Alaptare"> Alaptare</label>
  <br><br>


</div>

<div class="filtrare">
<h3> Timp alocat </h3>
  <input name="checkbox" type="checkbox" id="10min" />
  <label for="10min"> 10 min</label>
  <br><br>
  <input name="checkbox" type="checkbox" id="30min" />
  <label for="30min"> 30 min </label>
  <br><br>
  <input name="checkbox" type="checkbox" id="50min" />
  <label for="50min"> 50 min </label>
  <br><br>


</div>

<div class="filtrare">
<h3> Dotari din bucatarie </h3>
  <input name="checkbox" type="checkbox" id="microunde" />
  <label for="microunde"> Cuptor cu microunde</label>
  <br><br>
  <input name="checkbox" type="checkbox" id="aragaz" />
  <label for="aragaz"> Aragaz </label>
  <br><br>
  <input name="checkbox" type="checkbox" id="fara" />
  <label for="fara"> Fara coacere </label>
  <br><br>


</div>

<div class="filtrare">
<h3> Conform abilitatilor </h3>
  <input name="checkbox" type="checkbox" id="incepator" />
  <label for="incepator"> Incepator</label>
  <br><br>
  <input name="checkbox" type="checkbox" id="avansat" />
  <label for="avansat"> Avansat </label>
  <br><br>
  <input name="checkbox" type="checkbox" id="expert" />
  <label for="expert"> Expert </label>
  <br><br>


</div>
</div>
<div class="main">
<div class="row"> 

   <div class="column">
        <a href="ingrediente.php"><img src="a.jpg" alt="Image"></a>
    <h2>Smoothie</h2>
   
  </div>

  <div class="column">
  <a href="ingrediente.html">
    <img src="p.jpg" alt="Image">
    </a>
    <h2>Oua</h2>
   
  </div>

  <div class="column">
    <a href="ingrediente.html">
    <img src="pizza.jpg" alt="Image">
    </a>
    <h2>Pizza</h2>
   
  </div>
  </div>

  <div class="row"> 

  <div class="column">
   <a href="ingrediente.html">
    <img src="1.jpg" alt="Image">
    </a>
    <h2>Paste</h2>
    
  </div>

  <div class="column">
  <a href="ingrediente.html">
    <img src="a.jpg" alt="Image">
    </a>
    <h2>Smoothie</h2>
   
  </div>

  <div class="column">
  <a href="ingrediente.html">
    <img src="p.jpg" alt="Image">
    </a>
    <h2>Oua</h2>
   
  </div>

    </div>
  <div class="row"> 

  <div class="column">
  <a href="ingrediente.html">
    <img src="1.jpg" alt="Image">
    </a>
    <h2>Mamaliga</h2>
    
  </div>

  <div class="column">
  <a href="ingrediente.html">
    <img src="1.jpg" alt="Image">
    </a>
    <h2>Fasole</h2>
   
  </div>

  <div class="column">
  <a href="ingrediente.html">
    <img src="1.jpg" alt="Image">
    </a>
    <h2>Oua</h2>
   
  </div>
  </div>

</div>

<?php include('footer.php') ?>