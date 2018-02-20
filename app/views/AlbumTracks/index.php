<?php $this->setSiteTitle ('Album Info Index'); ?>
<?php $this->start ('head'); ?>

<?php $this->end (); ?>

<?php $this->start ('body'); ?>
<section>
<?php 
	echo '<img style="float: left "src="/assets/images/album/' . $params ['albums'][0]->artiestId . '/' . strtolower($params ['albums'][0]->albumNaam) . '.jpg" width="250" height="250"';
	echo '<p style="clear: both;">';
	echo '<h3>Album: ' . $params ['albums'][0]->albumNaam . '</h3>';
	echo '<p style="clear: both;">';
	echo '<ul class="tracklist">';
		foreach ($params ['tracks'] as $track) {
			echo '<li><span style="float: left; width: 2%; text-align: right;">' . $track->trackPos . '</span>' . 
			'<span style="float: left; width: 1%; text-align: center;">-</span>' . 
			'<span style="float: left; width: 33%; text-align: left;">' . $track->trackTitel . '</span></li>'; 
			echo '<p style="clear: both;">';
		}
	echo '</ul>';
	
	echo '<p style="clear: both;">';
	echo '<button onclick="window.history.go(-1); return false;">Go Back</button>';
?>
</section>
<?php $this->end (); ?>