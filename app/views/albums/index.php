<?php $this->setSiteTitle ('Albums Index'); ?>
<?php $this->setPaging ($params, '/albums/index'); ?>
<?php $this->start ('head'); ?>
<?php $this->end (); ?>

<?php $this->start ('body'); ?>
	<h1>albums</h1>
	<?php

		echo '<div class = "float-links">';
		echo $this->Paging(); 

		echo '<form class = "float-rechts" method="post" action=' . $_SERVER['PHP_SELF'] . ' >';
			echo '<select name="aantal">';
				echo '<option value="10" ', ($params ['paging'] ['e'] == 10 ? 'selected="selected"' : ''), '>10</option>';
				echo '<option value="15" ', ($params ['paging'] ['e'] == 15 ? 'selected="selected"' : ''), '>15</option>';
				echo '<option value="20" ', ($params ['paging'] ['e'] == 20 ? 'selected="selected"' : ''), '>20</option>';
				echo '<option value="25" ', ($params ['paging'] ['e'] == 25 ? 'selected="selected"' : ''), '>25</option>';
			echo '</select>';
			echo '<select name="sort">';
				echo '<option value="Jaar">Jaar</option>';
				echo '<option value="Artiest">Artiest</option>';
				echo '<option value="Album">Album Titel</option>';
			echo '</select>';
			echo '<input type="submit" name="update" value= "Display results">';
		echo '</form>';
		echo '<p style="clear: both;">';
		
		echo '<div class ="scrollable">';
		
		foreach ( $params ['albums'] as $album) {
			$bestandsNaam = ROOT . DS . 'assets' . DS . 'images' . DS . 'album' . DS . $album->artiestId . DS . strtolower($album->albumNaam) . '.jpg';
			echo '<div class="figure">';
			If (!file_exists ($bestandsNaam)) {
				echo '<p><img class="scaled" src="/assets/images/album/No_album_cover.jpg" width="250" height="250" alt="' . strtolower($album->albumNaam) . '"></p>';
				echo '<p class="text-centered">' . $album->albumNaam . '</p>';
			} else {
				echo '<p><a href = /albumtracks/index/' . $album->albumId . '><img class="scaled" src="/assets/images/album/' . $album->artiestId . '/' . strtolower($album->albumNaam) . '.jpg" alt="' . strtolower($album->albumNaam) . '"></a></p>';
				echo '<p class="text-centered">' . $album->albumNaam . '</p>';
   			}
			echo '</div>';
		}
		echo '<p style="clear: both;">';
		echo $this->Paging(); 
		echo '<p style="clear: both;">';
		echo '</div>';
		echo '</div>';
	?>
<?php $this->end (); ?>
