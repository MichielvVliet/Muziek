<?php $this->setSiteTitle ('Artiest Info Album'); ?>
<?php $this->setBioAlbumLeden ($params [0]->artiestId); ?>
<?php $this->start ('head'); ?>
<?php $this->end (); ?>

<?php $this->start ('body'); ?>
<h1>Artiest Informatie</h1>
<?php
	
	echo $this->BioAlbumLeden ();
	echo '<h1>' . $this->BandNaam (). '</h1>';
	echo '<div class ="scrollable">';
		
		foreach ( $params as $album) {
			$bestandsNaam = ROOT . DS . 'assets' . DS . 'images' . DS . 'album' . DS . $album->artiestId . DS . strtolower($album->albumNaam) . '.jpg';
			echo '<div class="figure">';
			If (!file_exists ($bestandsNaam)) {
				echo '<p><img class="scaled" src="/assets/images/album/No_album_cover.jpg" width="250" height="250" alt="' . strtolower($album->albumNaam) . '"></p>';
				echo '<p class="text-centered">' . $album->albumNaam . '</p>';
			} else {
				echo '<p><a href = /AlbumTracks/index/' . $album->albumId . '><img class="scaled" src="/assets/images/album/' . $album->artiestId . '/' . strtolower($album->albumNaam) . '.jpg" alt="' . strtolower($album->albumNaam) . '"></a></p>';
				echo '<p class="text-centered">' . $album->albumNaam . '</p>';
			}
			echo '</div>';
		}
		echo '<p style="clear: both;">';

?>
<?php $this->end (); ?>
