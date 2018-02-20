<?php $this->setSiteTitle ('Login'); ?>

<?php $this->start ('head'); ?>
<?php $this->end (); ?>

<?php $this->start ('body'); ?>

<div class="box content">
	<?php echo $this->toonFouten (); ?>
	<form class="form-user" action="/register/login" method="post">
		<h2 class=text-center>Log In</h2>

		<?php 
			echo '<input class="inputveld' . 
			(strpos(strtolower($this->toonFouten ()), "username") !== false ? ' error-veld'	: '')
			 . '" type="text" name="username" placeholder="Username"><br />';
			echo '<input class="inputveld' .
			(strpos(strtolower($this->toonFouten ()), "password") !== false ? ' error-veld'	: '')
			 . '" type="password" name="password" placeholder="Password"><br />';
		?>

		<button class="button-send" name="submit">Inloggen</button>
		<p>
			<label>Onthoudt me</label>
			<input type="checkbox" id="onthoudtMe" name="onthoudtMe" value="on"/>
		</p>	
	</form>
</div>
<?php $this->end (); ?>
