<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="fr">
<!-- head -->
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Appui aux association (DLA)</title>

	<?php include('C:/wamp/www/BGE/communs/head.inc.php'); ?>
</head> <!-- fin head -->

<body>
	<!--HEADER-->
	<?php include('C:/wamp/www/BGE/communs/header.inc.php'); ?>

	<!--CONTENU-->
	<!-- fil d'ariane -->
	<div class="container-fluid">
		<div class="col-12">
			<div class="mybreadcrumb flat">
				<a href="#" class="active">Accueil</a>
				<a href="#" class="active">DLA</a>
				<a href="#">Ressources & actualités</a>
			</div>
		</div> <!-- col-12 -->
	</div> <!-- row -->
</div> <!-- container -->

<div class="container-fluid">
	<div class="row text-center">
		<div class="col-xl-3 col-md-3 col-xs-12 sidebar-offcanvas sidequisommesnous" id="sidebar">
			<a class="image-popup-vertical-fit" href="/BGE/files/images/DLA/chiffres-cles-dla.jpg" title="Les chiffres clés">
				<img class="img-fluid" src="/BGE/files/images/DLA/chiffres-cles-dla.jpg" alt="les chiffres clés"width="200" height="200">
			</a>
			<br> <br>

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
				AND AGENDA.ID_categorieAgenda=10 
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

			<div class="col-xl-9 col-md-9 col-xs-12 col-9-pad" >
				<h1 class="titreh1 text-center" style="margin-top: 0em;">Ressources & actualités</h1>

			</div> <!--  col-8 -->
		</div> <!--  row -->
	</div> <!--  container -->


	<!--FOOTER-->
	<?php include('C:/wamp/www/BGE/communs/footer.inc.php'); ?>

</body>

</html>

