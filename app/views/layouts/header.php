<div class="header">
	<header>
	</header>
	<nav>
		<ul>
			<li class="links"><a href="/">Home</a></li>
			<li class="links"><a href="/artiesten">Artiesten</a></li>
			<li class="links"><a href="/albums">Albums</a></li>
			<li class="links"><a href="/tracks">Tracks</a></li>
		</ul>
		<?php  
			If (!session::get (CURRENT_USER_SESSION_NAME)) {
				echo '<a href="/register/login">Inloggen</a>';
				echo '<a class="rechts" href="/register/register">Register</a>';
			} else {

				echo '<div class="rood"><a href="/register/logout">Uitloggen</a></div>'; 
			}
		?>
	</nav>
</div>