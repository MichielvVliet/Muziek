<?php $this->setSiteTitle ('Registratie Form'); ?>

<?php $this->start ('head'); ?>
<?php $this->end (); ?>

<?php $this->start ('body'); ?>
<div class="box content">
	<form class="form-user">
		<h2 class=text-center>Registreren</h2>
		<input class="inputveld" type="text" name="voornaam" placeholder="Voornaam"><br />
		<input class="inputveld" type="text" name="achternaam" placeholder="Achternaam"><br />
		<input class="inputveld" type="email" name="email" placeholder="Email"><br />
		<input class="inputveld" type="text" name="userid" placeholder="UserId"><br />
		<input class="inputveld" type="password" name="password" placeholder="Password"><br />
		<input class="inputveld" type="password" name="retype" placeholder="Retype Password"><br />
		<button class="button-send" name="submit">Verzenden</button>		
	</form>
</div>
<?php $this->end (); ?>
