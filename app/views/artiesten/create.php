<?php $this->setSiteTitle ('Create New Artist'); ?>

<?php $this->start ('head'); ?>
<?php $this->end (); ?>

<?php $this->start ('body'); ?>
	<div class="box content">
		<form class="form-registratie" method="post" action=$_SERVER['PHP_SELF']>
			<h2 class=text-center>Nieuw Artiest</h2>
		
			<input class="inputveld" type="text" name="artiest" placeholder="Artiest">
			<textarea class="inputarea" name="info" placeholder="Informatie"></textarea><br />
			<button class="button-addImage" name="addImage">Add Image</buttton>
			<button class="button-send" name="submit">Verzenden</button>		
		</form>
	</div>
<?php $this->end (); ?>
