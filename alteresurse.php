<?php include('header.php') ?>
<script src="wrapper.js"></script>
<h2 style="text-align:center"> Ghiduri interactive si resurse suplimentare</h2>
<div class="resurse">

	<p>&#8226; <a href="https://www.gustos.ro/sfaturi-culinare/sfaturi-practice/15-secrete-din-bucatarie-pe-care-nimeni-nu-ti-le-a-spus-pana-acum-1.html" style="color:black"> Sfaturi culinare </a></p>

	<p>&#8226; <a href="https://www.lauraadamache.ro/" style="color:black"> Retete Laura Adamache </a></p>
	
	<p>&#8226; <a href="http://www.kamis.ro/stiati-ca" style="color:black"> Stiati ca..</a></p>

	</div>

	<h2 style="text-align:center">Testeaza-ti cunostintele in nutritie! </h2>
	<h1 class="score"></h1>
    <div class="header">
      <h1 class="questionNumber"></h1>
      <h2 class="question"></h2>
    </div>

    <form name="form1">
      <div class="answers">
        <input type="radio" name="radioChoice"> <label></label><br>
        <input type="radio" name="radioChoice"> <label></label><br>
        <input type="radio" name="radioChoice"> <label></label><br>
        <div class="button1"><button type="button" onclick="next()">Inainte</button></div>
        <div class="button1"><button type="button" onclick="back()">Inapoi</button></div>
      </div>
    </form>
<?php include('footer.php') ?>