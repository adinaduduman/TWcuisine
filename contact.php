

<?php include('header.php') ?>

<h2 style="text-align:center"> Echipa noastra va este recunoscatoare pentru implicare! </h2>
<div class="ex1"> 
Daca vreti sa stiti mai multe despre o anumita reteta de mancare publicata de unul dintre autorii nostri, ne puteti contacta prin intermedul formularului de mai jos. La fel, daca vreti sa aflati diferite retete culinare si nu le-ati gasit in paginile noastre, va invitam sa ne scrieti si va vom ajuta sa gatiti ceea ce va doriti. Ciorbe, supe, aperitive, prajituri, feluri mai simple sau mai sofisticate, mai rapide sau mai elaborate, pentru toate gusturile.<br>
	<br>
</div>


<div class="container">
  <form method="post" action="contact.php">
  <?php include('errors.php'); ?>

    <label for="fname"><b>Nume</b></label>
    <input type="text" id="fname" name="nume" placeholder="Numele tau..">

    <label for="lname"><b>Prenume</b></label>
    <input type="text" id="lname" name="prenume" placeholder="Prenumele tau..">

    <label for="email"><b>Email</b></label>
    <input type="text" id="email" name="email" placeholder="Emailul tau..">

    <label for="subject"><b>Subiect</b></label>
    <textarea id="subject" name="subiect" placeholder="Scrieti mesajul.." style="height:200px"></textarea>

      <div class="clearfix">
      <button type="submit" class="btn" name="contact_form"><a href="mesaj.php">Trimite </a></button>
    </div>

  </form>
</div>


<?php include('footer.php') ?>