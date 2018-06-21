<?php include('header.php') ?>
<?php
  $recipes_check_query = "SELECT * FROM recipes WHERE id='".$_GET['id']."'";
  $result = mysqli_query($db, $recipes_check_query);
  $recipe = mysqli_fetch_assoc($result);
  //var_dump($recipe);
  
  if(isset($_GET['addFavorites'])){
        $query = "INSERT INTO favorites (username, recipe_id) 
          VALUES('".$_SESSION['username']."', '".$_GET['id']."')";
        mysqli_query($db, $query);
        $message = 'Reteta a fost adaugata la favorite';
  }
  
  if(@$message){
      echo $message;
  }
?>
<div class="image">
  <h1><?=$recipe["titlu"] ?></h1>
  <img src="<?= explode("\n", $recipe["poze"])[0] ?>" alt="Avatar" width="800" height="530">
  
  <div class="container_galerie" id="container_galerie">
  
            <div class="gallery">
                <?php foreach (explode("\n", $recipe["poze"]) AS $photo) { ?>
                    <a tabindex="1"><img src="<?= $photo ?>" alt="Avatar"></a>
                <?php } ?>
                
                <span class="close"></span>
            </div>
  
  </div>
  
</div>
<div class="reteta">
    <p><b> TIMPI DE PREPARARE </b>
<br>
 &#x1F552; Gata in: <?= $recipe["timp"] ?> <br>
 <br>
<b> INGREDIENTE </b> <br>
<?php foreach (explode("\n", $recipe["ingrediente"]) AS $ingredient) { ?>
    &#x2714; <?= $ingredient ?> <br>
<?php } ?>
 
 <br>
<b>MOD DE PREPARARE </b><br>
<?php foreach(explode("\n", $recipe["descriere"]) AS $line) { ?>
    <p style="word-wrap: break-word;"> <?= $line ?> </p>
<?php } ?>
</p>
<?php if ( isset($_SESSION['username']) ) {
$favorite_check_query = "SELECT id FROM favorites WHERE recipe_id='".$_GET['id']."' AND username='".$_SESSION['username']."'";
  $result = mysqli_query($db, $favorite_check_query);
  $favorite = mysqli_fetch_assoc($result);
  if($favorite){
      ?>
      <p><strong>Reteta este deja adaugata la favorite</strong></p>
      <?php
  } else {
?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
    <input type="hidden" name="id" value="<?php echo @$_GET['id']; ?>" />
    <input type="submit" name="addFavorites" value="Adauga la Favorite" />
</form>
<?php
}
} else { ?>
<p><strong>Pentru a adauga reteta in lista de favorite trebuie sa va logati</strong></p>
<?php } ?>
</div>

<?php include('footer.php') ?>