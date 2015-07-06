<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>Mortelmans Computing</title>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="opmaak.css" />
		<link rel="stylesheet" type="text/css" href="opmaak_catalogus.css" />
	</head>
	<body>
		<div id="page"> 
			<div id="header">
				<div class="title">Mortelmans Computing</div>
				<div class="subText">Uw Computer Onderhoud</div>
			</div>
			<div id="bar">
				<!--<a href="index.html"><div class="menuLink">Home</div></a>-->
				<a href="about.html"><div class="menuLink">Over Ons</div></a>
				<a href="cloudstation.html"><div class="menuLink">CloudStation</div></a>
				<a href="diensten.html"><div class="menuLink">Diensten</div></a>
				<a href="contact.html"><div class="menuLink">Contact</div></a>
				<a href="catalogus.php?p=inkt"><div class="menuLink">Inkt &amp; Toner</div></a>
			</div>
			<div id="pageContent">
				<?php
				if(isset($_GET['p'])){
					switch($_GET['p']){
						case 'inkt':
							echo "<iframe frameBorder=\"0\" src=\"http://www.twindis.com/advisor?cid=67770247-C04E-4B81-A965A30F2C658C7B\" width=\"100%\" height=\"500px\"></iframe>";
						break;
						case 'rep':
							echo 'Reparaties';
						break;
						case 'parts':
							echo 'Onderdelen';
						break;
						case 'laptops':
							echo '<iframe frameBorder="0" src="http://www.twindis.com/advisor?cid=5B7C4AFF-3060-4002-A2EA8794C1ADFC61" width="100%" height="700px"></iframe>';
						break;
						default:
							header('Location: catalogus.php');
						break;
					}
				}
				else{
				?>
				<ul>
					<li><a href="catalogus.php?p=inkt">Inkt & Printkoppen</a></li>
					<li><a href="catalogus.php?p=rep">Reparaties</a></li>
					<li><a href="catalogus.pgp?p=parts">Onderdelen</a></li>
					</ul>
				<?php
				}
				?>
			</div>
		</div>
	</body>
</html>
