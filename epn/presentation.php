<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="fr">

<head> <!-- head -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>BGE</title>

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
				<a href="#">Présentation</a>
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
			<!-- <br> <br> -->

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
					AND AGENDA.ID_categorieAgenda IN (11,12,13,14)
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
			<div class="text-center">
				<img class="img-fluid" src="/BGE/files/images/epn/espace-num.jpg" alt="">
			</div>
			<!-- <h1 class="titreh1 text-center"><span style="color:black">Présentation<span></h1> -->
				<h2 class="titreh2">Qu’est-ce qu’un Espace Public Numérique ?</h2>

				<p class="text-justify alinea">
					Un Espace Public Numérique (EPN) est un espace accueillant du public, formant les usagers aux pratiques informatiques et aux technologies de l’information et de la communication. Il propose un accès à internet accompagné par un ou plusieurs animateurs. C’est aussi un lieu de développement numérique des territoires.
					L’objectif est d’accompagner les populations vers l’e-inclusion et réduire la fracture numérique.
				</p>
				<h3 class="titreh3">Les Espaces Publics Numériques BGE Indre</h3>
				<p class="text-justify alinea">
					Les Espaces Publics Numériques BGE Indre ont vocation à accompagner le public vers une autonomie numérique.
					<span class="cl-underline">Ils mettent à disposition deux espaces dédiés à la pratique informatique</span> :
				</p> 
				<br>
				<p class="text-justify">
					<strong class="linebge">Un espace public</strong> :
					Des ordinateurs connectés à internet sont en libre-service à la population. L’animateur en charge de la salle accompagne les personnes dans l’exécution de leur démarches (emploi ou administratives)
				</p>
				<br>
				<p class="text-justify">
					<strong class="linebge">Un espace atelier</strong> :
					C’est le lieu d’apprentissage de l’usage de l’outil informatique. Nous avons mis en place différents ateliers de tous niveaux.
				</p>
				<br>
				<p>
					<span class="cl-underline">Leurs objectifs</span> :
					accompagner le grand public dans l’ère numérique et réduire la fracture numérique.
				</p>

				<h3 class="titreh3">Où se situent les Espaces Publics Numérique BGE Indre ?</h3>

				<div class="video-container">
					<iframe src="https://www.google.com/maps/d/embed?mid=1rfCqpFd_aqePm4QVjbrZb6J6kKKirhuE" width="640" height="480"></iframe>
				</div>

			</div> <!--  col-8 -->
		</div> <!--  row -->
	</div> <!--  container -->

	<!--FOOTER-->
	<?php include('C:/wamp/www/BGE/communs/footer.inc.php'); ?>
	<!--FIN FOOTER-->

</body>

</html>