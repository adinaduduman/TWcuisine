<?php include('header.php') ?>

<?php
$query_string = "confirm=1";
if(isset($_GET["submit"])){
    unset($_GET["submit"]);
    
    foreach($_GET AS $key=>$value) {
      $query_string .= " AND ".$key."='".$value."'";
    }
}
if(isset($_GET["searchSubmit"])){
    unset($_GET["searchSubmit"]);
    
    $query_string .= " AND (titlu LIKE '%".$_GET["search"]."%' OR ingrediente LIKE '%".$_GET["search"]."%')";
}
$recipes_check_query = "SELECT * FROM recipes WHERE ".$query_string;
//var_dump($recipes_check_query);
$result = mysqli_query($db, $recipes_check_query);
$recipes = mysqli_fetch_all($result, MYSQLI_ASSOC);
//var_dump($recipes);
?>

<div class="sidebar">

<div class="filtrare">

<form id="filtrare" action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">

<h3> Stil de viata </h3>
  <input name="stil" type="radio" id="Vegetarian" value="vegetarian"/>
  <label for="Vegetarian"> Vegetarian</label>
  <br><br>
  <input name="stil" type="radio" id="Vegan" value="vegan"/>
  <label for="Vegan"> Vegan </label>
  <br><br>
  <input name="stil" type="radio" id="Post" value="post"/>
  <label for="Post"> De post </label>
  <br><br>

</div>
<div class="filtrare">
<h3> Restrictii alimentare </h3>
  <input name="restrictii" type="radio" id="Diabet" value="diabet"/>
  <label for="Diabet"> Diabet</label>
  <br><br>
  <input name="restrictii" type="radio" id="Alergii" value="alergii"/>
  <label for="Alergii"> Alergii </label>
  <br><br>
  <input name="restrictii" type="radio" id="Alaptare" value="alaptare" />
  <label for="Alaptare"> Alaptare</label>
  <br><br>


</div>

<div class="filtrare">
<h3> Timp alocat </h3>
  <input name="timp" type="radio" id="10min" value="10min"/>
  <label for="10min"> 10 min</label>
  <br><br>
  <input name="timp" type="radio" id="30min" value="30min"/>
  <label for="30min"> 30 min </label>
  <br><br>
  <input name="timp" type="radio" id="50min" value="50min"/>
  <label for="50min"> 50 min </label>
  <br><br>


</div>

<div class="filtrare">
<h3> Dotari din bucatarie </h3>
  <input name="dotari" type="radio" id="microunde" value="microunde"/>
  <label for="microunde"> Cuptor cu microunde</label>
  <br><br>
  <input name="dotari" type="radio" id="aragaz" value="aragaz"/>
  <label for="aragaz"> Aragaz </label>
  <br><br>
  <input name="dotari" type="radio" id="coacere" value="coacere"/>
  <label for="coacere"> Coacere </label>
  <br><br>


</div>

<div class="filtrare">
<h3> Conform abilitatilor </h3>
  <input name="abilitati" type="radio" id="incepator" value="incepator"/>
  <label for="incepator"> Incepator</label>
  <br><br>
  <input name="abilitati" type="radio" id="avansat" value="avansat"/>
  <label for="avansat"> Avansat </label>
  <br><br>
  <input name="abilitati" type="radio" id="expert" value="expert"/>
  <label for="expert"> Expert </label>
  <br><br>
  <input type="submit" name="submit" value="filtreaza" />


</div>
</form>
</div>
<div class="main">
    <form id="searchForm" action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
        <input type="text" name="search" value="<?php echo @$_GET["search"]; ?>" />
        <input type="submit" name="searchSubmit" value="Cauta" />
    </form>
	<?php  for ($i = 0; $i < count($recipes); $i++) {
				if ($i % 3 == 0) { ?>
					<div class="row">
		  <?php } ?>
				<div class="column">
					<a href="ingrediente.php?id=<?= $recipes[$i]["id"] ?>"><img src="<?= explode("\n", $recipes[$i]["poze"])[0] ?>" alt="Image"></a>
					<h2><?= $recipes[$i]["titlu"] ?></h2>
				</div>
	<?php       if ($i % 3 == 2 || $i == count($recipes) - 1) { ?>
					</div>
	      <?php } ?>
	<?php  }  ?>
	  
</div>

</div>

<?php include('footer.php') ?>