<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="fr">
<!-- head -->
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Partenaires</title>

	<?php include('C:/wamp/www/BGE/communs/head.inc.php'); ?>
</head>
<body>

	<!--BANNIERE-->
	<!--HEADER-->
	<?php include('C:/wamp/www/BGE/communs/header.inc.php'); ?>
	<!--FIN HEADER-->

<!--CONTENU-->
<!-- fil d'ariane -->
<div class="container-fluid">
	<div class="col-12">
		<div class="mybreadcrumb flat">
			<a href="#" class="active">Accueil</a>
			<a href="#">Presse</a>
		</div>
	</div> <!-- col-12 -->
</div> <!-- row -->
</div> <!-- container -->

<div class="container-fluid">
	<div class="row text-center">
		<div class="col-xl-3 col-md-3 col-xs-12 sidebar-offcanvas sidequisommesnous" id="sidebar">
			<!--<a class="image-popup-vertical-fit" href="#" title="Les chiffres clés">
				<img class="img-fluid" src="#" alt="#"width="200" height="200">
			</a>-->
		</div><!--.col-3-->

		<div class="col-xl-9 col-md-9 col-xs-12 col-9-pad mr-auto" >

			<h1 class="titreh1 darkblue text-center" style="margin-top: 0em;">Presse</h1>

			<p class="text-justify">
				<div>
					<?php	
						try
						{
							$bdd = new PDO('mysql:host=192.168.2.123;dbname=dbbge;charset=utf8', 'pierrick', 'kebab', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
						}
						catch (Exception $e)
						{
							die('Erreur : ' . $e->getMessage());
						}

						// On récupère tout le contenu de la table logo_partenaire
						$reponse = $bdd->query('SELECT * FROM PRESSE');
										
							// On affiche chaque entrée une à une
							while ($donnees = $reponse->fetch())
							{
								?>
								<div class="card">
									<div class="card-header">
										<h2 class="titreh2 text-left"><?php echo $donnees['titre_presse']; ?></h2>
										<h2 class="titreh2 text-right"><?php echo $donnees['date_presse']; ?></h2>
									</div>
									<div class="card-body">
									<?php 
										if($donnees['image_presse']!=''){
											?>
											<img class="img-fluid mr-auto" src="/BGE/files/images/presse/<?php echo $donnees['image_presse']; ?>" alt="<?php echo $donnees['titre_presse']; ?>" >
											<?php
										}
										if($donnees['texte_presse']!=''){
											?>
											<p class="text-justify"><?php echo $donnees['texte_presse']; ?></p >
											<?php
										}
									?>
									</div>
								</div>							
								<?php
							}
							?>
				</div>
			</p>

		</div> <!--  col-9 -->
	</div> <!--  row -->
</div> <!--  container -->

<!--FIN CONTENU-->
<!--FOOTER-->
<?php include('C:/wamp/www/BGE/communs/footer.inc.php'); ?>
<!--FIN FOOTER-->
</body>
</html>