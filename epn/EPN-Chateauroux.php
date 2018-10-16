<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="fr">

<head> <!-- head -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>EPN Châteauroux</title>

	<?php include('C:/wamp/www/BGE/communs/head.inc.php'); ?>
</head>
<!-- fin head -->
<body>

	<!--HEADER-->
	<?php include('C:/wamp/www/BGE/communs/header.inc.php'); ?>
	
	<!--CONTENU-->
	<!-- fil d'ariane -->
	<div class="container-fluid">
		<div class="col-12">
			<div class="mybreadcrumb flat">
				<a href="#" class="active">Accueil</a>
				<a href="#" class="active">Espaces numériques</a>
				<a href="#">Châteauroux</a>
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
				AND AGENDA.ID_categorieAgenda=11
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
				<!-- <h1 class="titreh1 text-center"><span style="color:black">Espace numérique de Châteauroux<span></h1> -->
					<img class="img-fluid" src="/BGE/files/images/epn/espace-chtx.jpg" alt="espace numérique de châteauroux">
					<p class="text-justify alinea" style="margin-top: 1em;">
						L’Espace Numérique BGE Indre Châteauroux est situé dans les quartiers prioritaires de Châteauroux, à St Jean.
						Deux Espaces sont mis à disposition du public.
					</p>
					<br>
					<p class="text-justify">
						<strong class="linebge" style="font-size: 18px">L’Espace Public</strong> :
						<br>
						Vous désirez réaliser vos démarches pour l’emploi (rédaction de CV, lettre de motivation, consultation offre d’emploi), vous connectez à votre boîte mail, faire vos démarches en ligne (ANTS, Impôts, CAF, CPAM, CARSAT, demande de bourse, demande d’Etat civil …) ? Un animateur est présent pour vous aider. Vous pouvez vous connecté en accès libre et gratuit pendant les heures d’ouverture. Vous pouvez aussi scanner et imprimer moyennant le tarif en vigueur pour l’impression. Une inscription gratuite est au préalable nécessaire pour accéder à l’Espace Public.
					</p>
					<br>
					<p class="text-justify">
						<strong class="linebge" style="font-size: 18px">Les ateliers</strong> :
						<br>
						Vous souhaitez apprendre les usages numériques ? L’usage de la boite mail, les réseaux sociaux, internet, l’ordinateur, la tablette ? Venez nous rencontrer !
						Nous proposons de multiples ateliers adaptés à votre niveau. Pour connaître vos capacités digitales, nous réalisons un premier diagnostic lors d’un rendez-vous. Pour nous contactez, <a href="#" alt="plaquette contact">cliquez-ici</a>. <br> <br>
						Avec nos partenaires, nous réalisons aussi des ateliers pour vous aider à comprendre les sites administratifs.
						Pour télécharger le catalogue des ateliers : <a href="#" alt="catalogue des ateliers">cliquez-ici</a>.
					</p>
					<br>
					<div class="container cl-backcontact">
						<div class="row">
							<div class="col-xl-6 col-md-6 col-xs-12  mr-auto">
								<p class="text-center">
									<strong>Adresse :</strong><br>
									1 bis rue Michelet – 3ème étage <br>
									36000 Chateauroux <br>
									Bus : lignes 3-9  arrêt Descartes, ligne 1 Arrêt Bernard Louvet
								</p>

							</div>

							<div class="col-xl-6 col-md-6 col-xs-12  mr-auto">
								<div class="resp-container">
									<iframe width="560" height="315" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2731.139999673207!2d1.701645015666254!3d46.801548079139486!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47fba74d145820d1%3A0x88ec120424905273!2s1+Rue+Michelet%2C+36000+Ch%C3%A2teauroux!5e0!3m2!1sfr!2sfr!4v1530013032295" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
								</div>
							</div>
						</div>

						<div class="row" style="padding-top: 3em; padding-bottom: 3em;">
							<div class="col-xl-6 col-md-6 col-xs-12  mr-auto">
								<p class="text-center">
									<strong>Contact :</strong> <br>
									aurelie.lachaume@bge-indre.com <br>
									02 54 36 58 61
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
							<div class="col-xl-4 col-md-4 col-xs-12 mr-auto logo-partenaires logo-partenaires">
								<img class="img-fluid cl-anim1 img-epn" src="/BGE/files/images/epn/cget-ddcspp.png" alt="logo cget">
							</div>
							<div class="col-xl-4 col-md-4 col-xs-12 mr-auto logo-partenaires logo-partenaires">
								<img class="img-fluid cl-anim2 img-epn" src="/BGE/files/images/epn/carsat.jpg" alt="logo carsat">
							</div>
							<div class="col-xl-4 col-md-4 col-xs-12 mr-auto logo-partenaires logo-partenaires">
								<img class="img-fluid cl-anim3 img-epn" src="/BGE/files/images/epn/webocentre-region.png" alt="logo webocentre">
							</div>
						</div> <!--  row -->
					</div> <!--  container -->


					<div class="wrapper1">
						<p class="text-justify">
							<strong>DDCSPP / CGET :</strong> <br>
							Ce programme accompagne les habitants des quartiers prioritaires vers l’e-inclusion. Des ateliers TIC sont alors programmés pour apprendre l’usage de l’ordinateur. Pour cela nous tenons des permanences notamment à la Maison de Grand quartier St Jacques, ainsi qu’au centre socio-culturel de Beaulieu.
							Pour démocratiser le numérique dans les quartiers, nous réalisons des manifestations autour du numérique.
						</p>
					</div>

					<div class="wrapper2">
						<p class="text-justify">
							<strong>CARSAT :</strong><br>
							La CARSAT a missionné L’Espace Numérique BGE Indre de Châteauroux pour accompagner les personnes à la retraite dans la découverte des outils numériques. Pour cela, nous avons mis en place des ateliers adaptés pour les séniors afin de les rendre autonome pour les démarches administratives et dans la manipulation d’outils digitaux.
						</p>
					</div>

					<div class="wrapper3">
						<p class="text-justify">
							<strong>WeboCentre :</strong> <br>
							WeboCentre est un label, décerné par l’Etat et la Région Centre Val-de-Loire, intégrant alors l’Espace Public Numérique dans une dynamique d’e-inclusion régionale. Dans le cadre de notre partenariat, BGE Indre accompagne les demandeurs d’emploi dans leurs démarches numériques pour l’emploi, ainsi que l’ensemble du public dans l’autonomie digitale (usage des outils informatiques, démarches administratives en ligne, accès à des ordinateurs  connectés, accompagnement au démarches administratives en ligne (CAF, CARSAT, ANTS, IMPOTS, CPAM)).
						</p>
					</div>
					<hr>

				</div>

			</div> <!--  col-8 -->
		</div> <!--  row -->
	</div> <!--  container -->


	<!--FOOTER-->
	<?php include('C:/wamp/www/BGE/communs/footer.inc.php'); ?>
	<!--FIN FOOTER-->

</body>

</html>