<?php $this->setSiteTitle ('Tracks Index'); ?>
<?php $this->setPaging ($params, '/tracks/index'); ?>
<?php $this->start ('head'); ?>
<?php $this->start ('body'); ?>
<section>
	<h1>Tracks</h1>
	<?php 
		
		echo '<div class = "float-links">';
		echo $this->Paging(); 
		
		echo '<form class = "float-links" method="post" action=' . $_SERVER['PHP_SELF'] . ' >';
			echo '<select name="aantal">';
				echo '<option value="25" ', ($params ['paging'] ['e'] == 25 ? 'selected="selected"' : ''), '>25</option>';
				echo '<option value="50" ', ($params ['paging'] ['e'] == 50 ? 'selected="selected"' : ''), '>50</option>';
				echo '<option value="75" ', ($params ['paging'] ['e'] == 75 ? 'selected="selected"' : ''), '>75</option>';
				echo '<option value="100" ', ($params ['paging'] ['e'] == 100 ? 'selected="selected"' : ''), '>100</option>';
			echo '</select>';
			echo '<select name="sort">';
				echo '<option value="Jaar">Track</option>';
				echo '<option value="Album">Album Titel</option>';
			echo '</select>';
			echo '<input type="submit" name="update" value= "Display results">';
		echo '</form>';
		echo '<p style="clear: both;">';
		
		echo '<div class ="scrollable">';
			echo '<ul class="tracklist">';
				foreach ($params ['tracks'] as $track) {
					echo '<li>' . ucwords ($track->trackTitel) . '</li>'; 
				}
			echo '</ul>';
			echo '<p style="clear: both;">';
			echo $this->Paging(); 
		echo '</div>';
		echo '</div>';

	?>
</section>
<?php $this->end (); ?>
