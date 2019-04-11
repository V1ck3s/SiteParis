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
								echo "<th>Login : ".$leCompte->login."</br></th></tr>";
								echo "<tr><th>Argent : ".$leCompte->argent."€</br></th></tr>";
							?>
							</tr>
							</table>

							</br>
</br>
								<h2>Mes paris en cours :</h2>
							</br>
</br>
								<table class="table-striped table-dark" cellpadding="15" width="100%"><tr height="70"><th>Parié sur</th><th>Pour le match du</th><th>Mise</th><th>Gain</th><th>Gagné/Perdu</th></tr>
								<?php

									while($unCompte=$lesComptes->fetch(PDO::FETCH_OBJ))
									{
										if($unCompte->optionChoisis == $unCompte->optionGagnant &&  $unCompte->optionGagnant != ""){
											$gagnePerdu = "Gagné";
										}
										else if($unCompte->optionChoisis != $unCompte->optionGagnant &&  $unCompte->optionGagnant != ""){
											$gagnePerdu = "Perdu";
										}
										else{
											$gagnePerdu = "A venir";
										}
										echo "<tr><th>".$unCompte->optionChoisis."</th><th>".$unCompte->heureDebut."</th><th>".$unCompte->mise."€</th><th>".$unCompte->gainRecupere."€</th><th>".$gagnePerdu."</th></tr>";
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