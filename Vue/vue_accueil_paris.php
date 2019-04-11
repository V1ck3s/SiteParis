<style>
/*
table{
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
</style>



<html>
<header>
	
		</header>

	<body class="is-loading">
		
		<!-- Wrapper -->
			<div id="wrapper">
			
				<!-- Main -->
				<section id="main">
					<br>
				<center><h1>Nouveautés :</h1></center>
					</br>
					<table class="table table-striped table-dark">
					<?php
						while($uneNews=$lesNews->fetch(PDO::FETCH_OBJ))
						{
							echo "<tr>
								<th>Le ".$uneNews->date." :</br></br>".$uneNews->message."</th>
								</tr>";
						}
					?>
					</table>
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