<?php //session_start(); ?>
<!DOCTYPE HTML>
<!--
	Identity by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->

<?php
	include("utils/header.php");
?>

<html>
<style> 

</style>
	<body class="is-loading">



		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<section id="main">
						
					
					
					<?php
						if(isset($_SESSION['login']))
						{
							
							header('Location:Controleur/ctrl_accueil_paris.php');
						}
						else
						{
							include('Vue/vue_connexion_membre.php');
						}
					?>
							
						
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
