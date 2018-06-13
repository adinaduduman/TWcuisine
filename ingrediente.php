<?php include('header.php') ?>
<?php
  $recipes_check_query = "SELECT * FROM recipes WHERE id='".$_GET['id']."'";
  $result = mysqli_query($db, $recipes_check_query);
  $recipe = mysqli_fetch_assoc($result);
  //var_dump($recipe);
?>
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
</div>

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

<?php include('footer.php') ?>