<?php $this->setSiteTitle ('Artiest Info Leden'); ?>
<?php $this->setBioAlbumLeden ($params [0]->artiestId); ?>
<?php $this->start ('head'); ?>
<?php $this->end (); ?>

<?php $this->start ('body'); ?>
<h1>Artiest Informatie</h1>
<?php
	echo $this->BioAlbumLeden ();
	echo '<h1>' . $this->BandNaam (). '</h1>';

	echo '<div class ="scrollable">';
	echo '<div>';
		echo '<div class = "leden">';
			echo '<ul>';
				echo '<li><h4>Van</h4></li>';
				echo '<li><h4>Tot</h4></li>';
				echo '<li><h4>Naam</h4></li>';
				echo '<li><h4>Instrument</h4></li>';
			echo '</ul>';
		echo '</div>';		
		foreach ($params as $lid) {
			echo '<div class = "leden">';
			echo '<ul>';
				echo '<li>' . $lid->ledenStart . '</li>';
				echo '<li>' . $lid->ledenStop . '</li>';
				echo '<li>' . ucwords ( strtolower ($lid->ledenNaam)) . '</li>';
				echo '<li>' . ucwords ( strtolower ($lid->Instrument)) . '</li>';
			echo '</ul>';
			echo '</div>';		
		}
	echo '<p style="clear: both;">';
	echo '</div>';
	
?>
<?php $this->end (); ?>
