<?php include('header.php') ?>
<?php
if(isset($_POST['deleteFavorites'])){
        $query = "DELETE FROM favorites WHERE id = '".$_POST['id']."'";
        mysqli_query($db, $query);
        $message = 'Reteta a fost stearsa de la favorite';
  }
?>
<div class="content">
  	<!-- notification message -->
  	<center> <?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
  <?php  if (isset($_SESSION['username'])) : ?>
   <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
      <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>
<?php
echo @$message;
$survey = array();

$recipes_check_query = "SELECT recipes.*, favorites.id as favid FROM favorites 
LEFT JOIN recipes ON favorites.recipe_id = recipes.id
WHERE favorites.username = '".$_SESSION['username']."' ";

$result = mysqli_query($db, $recipes_check_query);
$recipes = mysqli_fetch_all($result, MYSQLI_ASSOC);
$survey = array(
    'stil' => array(),
    'abilitati' => array()
    );
if($recipes){
?>
<h2>Favorite</h2>
	<?php  for ($i = 0; $i < count($recipes); $i++) {
	    if(isset($survey['stil'][$recipes[$i]["stil"]])){
	        $survey['stil'][$recipes[$i]["stil"]]++;
	    } else {
	        $survey['stil'][$recipes[$i]["stil"]] = 1;
	    }
	    
	    if(isset($survey['abilitati'][$recipes[$i]["abilitati"]])){
	        $survey['abilitati'][$recipes[$i]["abilitati"]]++;
	    } else {
	        $survey['abilitati'][$recipes[$i]["abilitati"]] = 1;
	    }
				?>
				<div class="column">
					<a href="ingrediente.php?id=<?= $recipes[$i]["id"] ?>"><img src="<?= explode("\n", $recipes[$i]["poze"])[0] ?>" alt="Image"></a>
					<h2><?= $recipes[$i]["titlu"] ?></h2>
					<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                        <input type="hidden" name="id" value="<?php echo $recipes[$i]["favid"]; ?>" />
                        <input type="submit" name="deleteFavorites" value="Sterge" />
                    </form>
				</div>
	<?php  }  ?>
<?php

$max = 0;
$recomandareStil = '';
$recomandareAbilitati = '';
foreach($survey['stil'] as $stil => $count){
    if($count > $max){
        $recomandareStil = $stil;
    }
}
$max = 0;
foreach($survey['abilitati'] as $abilitati => $count){
    if($count > $max){
        $recomandareAbilitati = $abilitati;
    }
}

$recipes_check_query = "SELECT recipes.* FROM recipes
WHERE stil = '".$recomandareStil."' AND abilitati = '".$recomandareAbilitati."' LIMIT 4 ";

$result = mysqli_query($db, $recipes_check_query);
$recipes = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<div style="clear: both;"></div>
<h2>Recomandari</h2>
	<?php  for ($i = 0; $i < count($recipes); $i++) {
				?>
				<div class="column">
					<a href="ingrediente.php?id=<?= $recipes[$i]["id"] ?>"><img src="<?= explode("\n", $recipes[$i]["poze"])[0] ?>" alt="Image"></a>
					<h2><?= $recipes[$i]["titlu"] ?></h2>
				</div>
	<?php  }  
} else {
    ?>
<h2>Nu aveti retete adaugate la Favorite</h2>
<?php
}
	
?>	
<?php include('footer.php') ?>