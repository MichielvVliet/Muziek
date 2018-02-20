<?php $this->setSiteTitle ('Zoeken'); ?>

<?php $this->start ('head'); ?>
<?php $this->end (); ?>

<?php $this->start ('body'); ?>
<div class="box content">

	<?php

		If (isset ($params ['artiesten'])) {
			echo '<h4>Artiesten</h4>';	
			foreach ($params ['artiesten'] as $artiest) {
	  			echo '<a href = /artiestInfos/index/' . $artiest->artiestId . '>' . ucwords (strtolower($artiest->artiestNaam)) . '</a><br />';
			}
		}
		
		If (isset ($params ['albums'])) {
			echo '<h3>Albums</h3>';	
			echo '<div class = "leden">';
			echo '<h4 id="Top">Jaar</h4>';
			echo '<h4 id="Top">Titel</h4>';
			echo '<h4 id="Top">Artiest</h4>';
			echo '</div>';		
		
			foreach ($params ['albums'] as $album) {
				echo '<div class = "leden">';
					echo '<h4>' . ucwords ( strtolower ($album->jaar)) . '</h4>';
	  				echo '<h4>' . ucwords (strtolower ($album->albumNaam))  . '</h4>';
	  				echo '<h4><a href = /artiestInfos/index/' . $album->artiestId . '>' . ucwords ( strtolower ($album->artiestNaam)) . '</a></h4>';
				echo '</div>';			
			}
		}

		If (isset ($params ['tracks'])) {
			echo '<h3>Tracks</h3>';
			echo '<div class = "leden">';
			echo '<h4 id="Top">Jaar</h4>';
			echo '<h4 id="Top">Titel</h4>';
			echo '<h4 id="Top">Album</h4>';
			echo '</div>';		
			foreach ($params ['tracks'] as $track) {
				echo '<div class = "leden">';
					echo '<h4>' . ucwords ( strtolower ($track->jaar)) . '</h4>';
					echo '<h4>' . ucwords ( strtolower ($track->trackTitel)) . '</h4>';
					echo '<h4><a href = /albumtracks/index/' . $track->albumId . '>' . ucwords ( strtolower ($track->albumNaam)) . '</a></h4>';
				echo '</div>';			
			}
		}
	?>
</div>
<?php $this->end (); ?>
