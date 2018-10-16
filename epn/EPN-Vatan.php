<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="fr">

<head> <!-- head -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>EPN Vatan</title>

	<?php include('C:/wamp/www/BGE/communs/head.inc.php'); ?>
</head>
<!-- fin head -->
<body>

	<!--BANNIERE-->
	<!--HEADER-->
	<?php include('C:/wamp/www/BGE/communs/header.inc.php'); ?>
	<!--FIN HEADER-->
	<!--MENU-->
	<?php /*include('C:/wamp/www/BGE/communs/menu.inc.php');*/ ?>
	<!--FIN MENU-->
	<!--CARROUSSEL-->
	<?php /*include('C:/wamp/www/BGE/communs/carroussel.inc.php');*/ ?>
	<!--FIN CARROUSSEL-->
	<!-- <br> -->
	<!--FIL ARIANE-->
<!-- <div class="container">
	<div class="breadcrumb">
		<a href="/BGE/index.html" class="first">Accueil</a><span class="sep"> &gt; </span>
		<a href="/BGE/---">---</a><span class="sep"> &gt; </span>
		<a href="/BGE/---">EPN Vatan</a>
	</div>
</div> -->
<!--FIN FIL ARIANE-->
<!--CONTENU-->
<!-- <div class="row">
	<div class="col-xs-1 col-md-1 col-lg-1 colVertical">
		&nbsp;
	</div> --><!--
-->
	<!-- div class="col-xs-3 col-md-3 col-lg-3 colVertical yellow">
		<div>
			&nbsp;
		</div>
	</div> --><!--
-->
	<!-- <div class="col-xs-7 col-md-7 col-lg-7 colVertical">
		<div style="width:100%">
			<h1 class="titreH1 yellow">EPN Vatan</h1>
		</div>
		<br>
		<div class="txtjustify">
			<span class="yellow">
				2007 : 
			</span> 
			
		</div>
	</div>
</div> -->

<!--CONTENU-->
<!-- fil d'ariane -->
<div class="container-fluid">
	<div class="col-12">
		<div class="mybreadcrumb flat">
			<a href="#" class="active">Accueil</a>
			<a href="#" class="active">Espaces numériques</a>
			<a href="#">Vatan</a>
		</div>
	</div> <!-- col-12 -->
</div> <!-- row -->
</div> <!-- container -->

<div class="container-fluid">
	<div class="row">
		<div class="col-xl-3 col-md-3 col-xs-12 text-center sidebar-offcanvas sidequisommesnous" id="sidebar">
			<!-- <a class="image-popup-vertical-fit" href="#" title="Les chiffres clés">
				<img class="img-fluid" src="#" alt="#"width="200" height="200">
			</a> -->

			<div class="col-12" style="background-color: white; padding: 0.1em; margin-bottom: 1em;border-radius: 10px;">
				<a href="#" alt="page agenda"><h1 class="lineagenda text-center" style="font-size:30px;margin-top: 0.5em;"><span style="color: black; ">AGENDA</span></h1> </a>
			</div>
			<!-- AGENDA -->
			<?php

			try
			{
				$bdd = new PDO('mysql:host=192.168.2.123;dbname=dbbge;charset=utf8', 'pierrick', 'kebab', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			}
			catch (Exception $e)
			{
				die('Erreur : ' . $e->getMessage());
			}


// On récupère tout le contenu de la table agenda
			$agenda = $bdd->query("SELECT ID_agenda, titre_agenda, date_format(date_agenda, '%d/%m/%Y') AS date, time_format(heure_debut_agenda,'%H:%i') AS heure_debut, time_format( heure_fin_agenda,'%H:%i') AS heure_fin, CATEGORIEAGENDA.ID_categorieAgenda, titre_categorieAgenda, prix_agenda, niveau_agenda, intervenant_agenda, lieu_agenda, adresse_agenda, CP_agenda, ville_agenda
				from AGENDA, CATEGORIEAGENDA
				WHERE AGENDA.ID_categorieAgenda=CATEGORIEAGENDA.ID_categorieAgenda
				AND AGENDA.ID_categorieAgenda=14
				ORDER BY `date_agenda` ASC
				LIMIT 3"
			);

			?>

			<?php	

						// On affiche chaque entrée une à une
			while ($donnees = $agenda->fetch())

			{

				?>

				<div class="container">
					<div class="row align-items-center" style="background-color: white; padding: 1em; border-radius: 10px; margin-bottom: 1em">
						<div class="col-xl-12 col-md-12 col-xs-12" >


							<p class="text-center"> 
								<span class="text-uppercase" style="color: #337ab7"><?php echo $donnees['titre_categorieAgenda'];?></span> -
								<span class="font-italic text-lowercase"><?php echo $donnees['titre_agenda'];?></span> </p>
								<br>
								<p class="text-center">
									Le  <strong><?php echo $donnees['date'];?></strong> de <strong><?php echo $donnees['heure_debut'];?></strong> à <strong><?php echo $donnees['heure_fin'];?> </strong>
									avec <strong><?php echo $donnees['intervenant_agenda'];?></strong>
								</p>
								<br>
								<p class="text-center">
									<span class="cl-underline"><strong>Lieu</strong></span> : <?php echo $donnees['lieu_agenda'];?> <br> <?php echo $donnees['adresse_agenda'];?> <br>
									<?php echo $donnees['CP_agenda'];?> <?php echo $donnees['ville_agenda'];?><br>  
								</p>
								<br>
								<p class="text-center"> 
									<?php 
									if ($donnees['prix_agenda']==0)
									{
										echo "gratuit<br>" ;
									}
									else
									{
										echo $donnees['prix_agenda']." € <br>";
									}
									?>
									<strong><?php echo $donnees['niveau_agenda'];?></strong>
								</p>
							</div>
						</div>
					</div>
					<?php

				}
				?>
			</div><!--.col-3-->

			<div class="col-xl-9 col-md-9 col-xs-12 col-9-pad mr-auto" >
				<!-- <h1 class="titreh1 text-center"><span style="color:black">Espace numérique de Vatan<span></h1> -->
					<img class="img-fluid" src="/BGE/files/images/epn/espace-vatan.jpg" alt="espace numérique de vatan">
					<p class="text-justify alinea" style="margin-top: 1em;">
						Situé dans la MSAP (Maison de Services au Public) de Vatan, l’Espace Numérique BGE Indre Vatan s’associe à la Mairie de Vatan pour compléter l’offre de services. <br>
						Vous désirez faire vos démarches administratives en ligne, l’agent de la MSAP vous accompagne dans vos démarches administratives en ligne. <br>
						Vous souhaitez apprendre l’informatique, connaître d’autres usages numériques ? L’animateur multimédia BGE Indre Vatan vous forme aux pratiques informatiques : réseaux sociaux, pratique sur l’ordinateur, pratique sur internet, sécurité informatique, bureautique … <br>
						C’est aussi un espace dédié à l’emploi. BGE Indre accompagne les demandeurs d’emploi dans leurs démarches électroniques (rédaction de cv, lettre de motivation, inscription aux agences d’intérim …).
					</br> </br>
					<a href="#" alt="programme à télécharger">Télécharger le programme </a>
				</p>
				<br>
				<div class="container cl-backcontact">
					<div class="row">
						<div class="col-xl-6 col-md-6 col-xs-12  mr-auto">
							<p class="text-center">
								<strong>Adresse :</strong> <br>
								51/31 avenue de la Sentinelle<br>
								36150 Vatan
							</p>

						</div>

						<div class="col-xl-6 col-md-6 col-xs-12  mr-auto">
							<div class="resp-container">
								<iframe width="560" height="315" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2716.821961900374!2d1.813008215675575!3d47.08295487915353!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47fb19cd40b2965d%3A0x340faeee67747f90!2s51%2C+31+Avenue+de+la+Sentinelle%2C+36150+Vatan!5e0!3m2!1sfr!2sfr!4v1530023373802" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
							</div>
						</div>
					</div>

					<div class="row" style="padding-top: 3em; padding-bottom: 3em;">
						<div class="col-xl-6 col-md-6 col-xs-12  mr-auto">
							<p class="text-center">
								<strong>Contact :</strong> <br>
								sakina.kabab@bge-indre.com
							</p>
						</div>

						<div class="col-xl-6 col-md-6 col-xs-12 mr-auto">
							<p class="text-center">
								<strong>Horaires :</strong> <br>
									Lundi, mardi, mercredi, jeudi : 9h-12h / 14h-17h
									Vendredi : 9h-12h / 14h-16h
							</p>
						</div>
					</div>
				</div>

				<hr>
				<h2 class="titreh2 text-center">Partenaires</h2>
				<div class="container">
					<div class="row text-center">
						<div class="col-xl-6 col-md-6 col-xs-12 mr-auto logo-partenaires">
							<img class="img-fluid cl-anim4 img-vatan" src="/BGE/files/images/epn/mairie-vatan.png" alt="mairie de vatan">
						</div>

						<div class="col-xl-6 col-md-6 col-xs-12 mr-auto logo-partenaires">
							<img class="img-fluid cl-anim3 img-epn" src="/BGE/files/images/epn/webocentre-region.png" alt="logo webocentre">
						</div>

					</div> <!--  row -->
				</div> <!--  container -->


				<div class="wrapper4">
					<p class="text-justify">
						<strong>Mairie de Vatan :</strong> <br>
						La Commune de Vatan s’investie dans le numérique afin d’apporter une réponse à ses administrés sur cette thématique. Se former aux usages, accompagner les personnes dans les démarches dématérialisés, participer activement à l’attractivité du territoire par le numérique sont autant de problématiques que la commune a voulu répondre avec la participation de la BGE Indre. Ainsi en implantant un Espace Public Numérique dans sa Commune, cela participe à la dynamique territoriale et offre un service complet pour les habitants.

					</p>
				</div>

				<div class="wrapper3">
					<p class="text-justify">
						<strong>WeboCentre :</strong> <br>
						WeboCentre est un label, décerné par l’Etat et la Région Centre Val-de-Loire, intégrant alors l’Espace Public Numérique dans une dynamique d’e-inclusion régionale. Dans le cadre de notre partenariat, BGE Indre accompagne les demandeurs d’emploi dans leurs démarches numériques pour l’emploi, ainsi que l’ensemble du public dans l’autonomie digitale (usage des outils informatiques, démarches administratives en ligne, accès à des ordinateurs  connectés, accompagnement au démarches administratives en ligne (CAF, CARSAT, ANTS, IMPOTS, CPAM)).
					</p>
				</div>
				<hr>

			</div> <!--  col-8 -->
		</div> <!--  row -->
	</div> <!--  container -->

	<!--FOOTER-->
	<?php include('C:/wamp/www/BGE/communs/footer.inc.php'); ?>
	<!--FIN FOOTER-->
</body>
</html>