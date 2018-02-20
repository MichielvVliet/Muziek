<?php $this->setSiteTitle ('Artiesten Index'); ?>
<?php $this->setPaging ($params, '/artiesten/index'); ?>
<?php $this->start ('head'); ?>
<?php $this->end (); ?>

<?php $this->start ('body'); ?>
	<h1>Artiesten</h1>
	<?php

		echo '<div class = "float-links">';
		echo $this->Paging(); 

		echo '<div class = "float-rechts">';
		echo '<form method="post" action=' . $_SERVER['PHP_SELF'] . ' >';
			echo '<select name="aantal">';
				echo '<option value="10" ', ($params ['paging'] ['e'] == 10 ? 'selected="selected"' : ''), '>10</option>';
				echo '<option value="15" ', ($params ['paging'] ['e'] == 15 ? 'selected="selected"' : ''), '>15</option>';
				echo '<option value="20" ', ($params ['paging'] ['e'] == 20 ? 'selected="selected"' : ''), '>20</option>';
				echo '<option value="25" ', ($params ['paging'] ['e'] == 25 ? 'selected="selected"' : ''), '>25</option>';
			echo '</select>';
			echo '<select name="sort">';
				echo '<option value="Artiest Oplopend">Artiest Oplopend</option>';
				echo '<option value="Artiest Aflopend">Artiest Aflopend</option>';
			echo '</select>';
			echo '<input type="submit" name="update" value= "Display results">';
		echo '</form>';
		echo '</div>';
		echo '<p style="clear: both;">';
 
		echo '<div class ="scrollable">';
		echo '<section>';
		foreach ($params ['artiesten'] as $artiest) {
			$bestandsNaam = ROOT . DS . 'assets' . DS . 'images' . DS . 'artiest' . DS . strtolower($artiest->artiestNaam) . '.jpg';
			echo '<div class="figure">';
			If (!file_exists ($bestandsNaam)) {
				echo '<p><img class="scaled" src="/assets/images/album/No_album_cover.jpg" width="250" height="250" alt="' . strtolower($artiest->artiestNaam) . '"></p>';
				echo '<p class="text-centered">' . $artiest->artiestNaam . '</p>';
			} else {
				echo '<p><a href = /artiestInfos/index/' . $artiest->artiestId . '><img class="scaled" src="/assets/images/artiest/' . strtolower($artiest->artiestNaam) . '.jpg" alt="' . strtolower($artiest->artiestNaam) . '"></a></p>';
				echo '<p class="text-centered">' . $artiest->artiestNaam . '</p>';
			}
			echo '</div>';
		}
		echo '</section>';
		echo '</div>';
		echo '<p style="clear: both;">';
		echo $this->Paging(); 
		echo '<p style="clear: both;">';
		echo '</div>';
 	?>
<?php $this->end (); ?>
