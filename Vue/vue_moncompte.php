<style>
/*table{
	border: medium solid #6495ed;
	border-collapse: collapse;
	
}

th {

	font-family: Segoe UI, Frutiger, Frutiger Linotype, Dejavu Sans, Helvetica Neue, Arial, sans-serif;
	font-size: 24px;
	font-style: normal;
	font-variant: normal;
	font-weight: 100;
	line-height: 26.4px;
	border: thin solid #6495ed;
	padding: 15px;
	background-color: #6d6d6d;
}*/

table{
	
	
}
</style>


<html>
	<script type="text/javascript">
		$(function() {
			$(".bet_row").tooltip('show')
		})
	</script>
	<body class="is-loading">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<section id="main">
						
							
					

						</br>
						
					<!--	<form method="post" action="../Controleur/ctrl_moncompte.php">
							<button type="submit">Actualiser mes gains</button>
						</form>
						--><p>
							<center>
							<h1>Mon compte :</h1>
						</br>
						</br>
							<table class="table-striped table-dark" cellpadding="15px">
							<tr>
							<?php
								echo "<th>Login : ".$joueur->getLogin()."</br></th></tr>";
								echo "<tr><th>Argent : ".$joueur->getMoney()."€</br></th></tr>";
							?>
							</tr>
							</table>

							</br>
</br>
								<h2>Mes paris en cours :</h2>
							</br>
</br>
								<table class="table-striped table-dark col-sm-12 col-xl-6" cellpadding="15"><tr height="70"><th>Parié sur</th><th>Pour le match du</th><th>Mise</th><th>Gain</th><th>Gagné/Perdu</th></tr>
								<?php
									$bets = $joueur->getBets();
									foreach($bets as $bet)
									{
										if($bet->event->optionGagnant == "")
											$verdict = "A venir";
										else
										{
											if($bet->optionChoisis == $bet->event->optionGagnant)
												$verdict = "Gagné";
											else
												$verdict = "Perdu";
										}
										echo "<tr class='bet_row " .(($verdict == "Gagné") ? "table-success" : (($verdict == "Perdu") ? "table-danger" : "")) . "' data-toggle='tooltip' data-placement='left' data-trigger='manual' title='" .$bet->event->premiereOption. " vs " .$bet->event->troisiemeOption. "'>
											<th>".$bet->optionChoisis."</th>
											<th>".$bet->event->heureDebut."</th>
											<th>".$bet->mise."€</th>
											<th>".$bet->gain."€</th>
											<th>".$verdict."</th>
										</tr>";
									}
								?>
								</table>
						</center>
						</p>
							
						
					</section>

				<!-- Footer -->
					<footer id="footer">
						<!--
						<ul class="copyright">
							<li>&copy; Jane Doe</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
						</ul>
					-->
					</footer>

			</div>

		<!-- Scripts -->
			<!--[if lte IE 8]><script src="assets/js/respond.min.js"></script><![endif]-->
			<script>
				if ('addEventListener' in window) {
					window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-loading\b/, ''); });
					document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
				}
			</script>

	</body>
</html>