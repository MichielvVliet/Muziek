<?php $this->setSiteTitle ('Home'); ?>

<?php $this->start ('head'); ?>
<?php $this->end (); ?>

<?php $this->start ('body'); ?>
	<?php
		echo '<div class = "float-links">';
		echo $params;
		echo '</div>'; 
	?>

<?php $this->end (); ?>

<?php $this->start ('footer'); ?>
<?php $this->end (); ?>
