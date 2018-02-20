<div class="box sidebar">
	<form class="form-zoeken text-center" action="/zoeken/index" method="post">
		<input class="inputveld" type="text" name="zoekTekst" placeholder="Zoeken naar">
		<p>
			<input type="checkbox" name="zoekIn[]" value="artiest">Artiest
			<input type="checkbox" name="zoekIn[]" value="album">Album
			<input type="checkbox" name="zoekIn[]" value="track">Track
		</p>
		<button class="button-send" name="submit">Verzenden</button>		
	</form>
	<?php
		If (session::get (CURRENT_USER_SESSION_NAME)) {
			$arrayMachtiging = explode (';', session::get (CURRENT_USER_SESSION_NAME));
			echo '<div>';
				echo '<ul class="sidebarmenu">';
				for ($teller = 1; $teller < 6; $teller+=2) {
					If (intval(substr ($arrayMachtiging [$teller + 1], 1, 3)) > 0) {
						echo '<li>' . ucwords ($arrayMachtiging [$teller]);
							echo '<ul>';
								If (substr ($arrayMachtiging [$teller + 1], 1, 1) == '1') {
									echo '<li><a href="' . DS . ucwords ($arrayMachtiging [$teller]) . DS . 'create">Nieuw</a></li>';
								}
								If (substr ($arrayMachtiging [$teller + 1], 2, 1) == '1') {
									echo '<li><a href="' . DS . ucwords ($arrayMachtiging [$teller]) . DS . 'update">Wijzig</a></li>';
								}
								If (substr ($arrayMachtiging [$teller + 1], 3, 1) == '1') {
									echo '<li><a href="' . DS . ucwords ($arrayMachtiging [$teller]) . DS . 'delete">Verwijder</a></li>';
								}
							echo '</ul>';
						echo '</li>';
					}
				}
				echo '</ul>';
			echo '</div>';
		}
	?>
</div>
