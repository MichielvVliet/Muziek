<?php $this->setSiteTitle ('Create new Album'); ?>
<?php $this->start ('head'); ?>
<?php $this->end (); ?>

<?php $this->start ('body'); ?>
<div class="box content">

	<form class="form-registratie" method="post" action=$_SERVER['PHP_SELF']>
		<h2 class=text-center>Nieuw Album</h2>
		
		<input class="inputveld" type="text" name="artiest" placeholder="Artiest">
		<input class="inputveld" type="text" name="album" placeholder="albumTitel">
		<input class="inputveld" type="text" name="jaar" placeholder="Jaar">
		<select class="dropdown" name="Genre">
			<option class="dropdown" value="volvo">Volvo</option>
			<option class="dropdown" value="saab">Saab</option>
			<option class="dropdown" value="fiat">Fiat</option>
			<option class="dropdown" value="audi">Audi</option>
		</select>
		<input class="inputveld" type="text" name="plaatje" placeholder="Plaatje">
		<input class="button-send" type="button" name="insert" value= "Insert">
	</form>
	<p style="clear: both;">
		
</div>

<?php $this->end (); ?>
