<?php $this->setSiteTitle ('Artiest Info Index'); ?>
<?php $this->setBioAlbumLeden ($params [0]->artiestId); ?>
<?php $this->setBandNaam ($params [0]->artiestNaam); ?>
<?php $this->start ('head'); ?>
<?php $this->end (); ?>

<?php $this->start ('body'); ?>
<h1>Artiest Informatie</h1>
<?php
	echo $this->BioAlbumLeden ();
	echo '<h1>' . $this->BandNaam (). '</h1>';
	echo '<p style="clear: both;">';

	echo '<p>' . $params [0]->artiestInfo . '</p>';
	echo '<p style="clear: both;">';
?>
<?php $this->end (); ?>
