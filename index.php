<!DOCTYPE html>
<html lang="fr">

<head> <!-- head -->
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
	<title>BGE Indre</title>

	<?php include('communs/head.inc.php'); ?>
</head>
<!-- fin head -->
<body>
	<!-- header -->
	<?php include('communs/header.inc.php'); ?>

	<!-- CONTENU  -->
	<!-- carousel -->
	<?php include('communs/carroussel.inc.php'); ?>
	<!-- nav -->

	<!-- FORMAT SMARTPHONE NAV ROND -->
	<div class="cl-format-smartphone">
		<table style="margin:auto;">
			<tr>
				<th> <a href="#" title="bouton appui rh"><div class="circle-smartphone cl-blue"></div></a></th>
				<th> <a href="#" title="appui rh">APPUI RH</a></th>
			</tr>
			<tr>
				<th> <a href="#" title="bouton appui rh"><div class="circle-smartphone cl-yellow"></div></a></th>
				<th>  <a href="#" title="reprise d'entreprise">REPRISE D'ENTREPRISE</a></th>
			</tr>
			<tr>
				<th> <a href="#" title="bouton appui rh"><div class="circle-smartphone cl-orange"></div></a></th>
				<th><a href="#" title="appui rh">APPUI AUX TERRITOIRE</a></th>
			</tr>
			<tr>
				<th> <a href="#" title="bouton appui rh"><div class="circle-smartphone cl-red"></div></a></th>
				<th><a href="#" title="nos hébergement">NOS HEBERGEMENT</a></th>
			</tr>
			<tr>
				<th> <a href="#" title="bouton appui rh"><div class="circle-smartphone cl-green"></div></a></th>
				<th><a href="/BGE/clubs/clubs-reseaux.php" title="les clubs et reseaux">LES CLUBS ET RESEAUX</a></th>
			</tr>
		</table>
	</div>

	<!-- FORMAT DESKTOP NAV ROND -->

	<div class="container-fluid cl-format-desktop">
		<div class="row mr-auto justify-content-center">
			<div class="col-2" style="padding:1em">
				<a href="#" title="bouton appui rh">
					<img class="img-fluid rond-couleur" src="files/images/rond-accueil/rond-appui-rh.png" alt="rond appui rh"/>
				</a>
			</div>
			<div class="col-2" style="padding:1em">
				<a href="#" title="bouton reprise d'entreprise">
					<img class="img-fluid rond-couleur" src="files/images/rond-accueil/rond-reprise-d'entreprise.png" alt="reprise d'entreprise"/>
				</a>
			</div>
			<div class="col-2" style="padding:1em">
				<a href="#" title="bouton appui aux territoires">
					<img class="img-fluid rond-couleur" src="files/images/rond-accueil/rond-appui-aux-territoires.png" alt="appui aux territoires"/>
				</a>
			</div>
			<div class="col-2" style="padding:1em">
				<a href="#" title="bouton Nos hébergements" >
					<img class="img-fluid rond-couleur" src="files/images/rond-accueil/rond-noshebergements.png" alt="nos hébergements"/>
				</a>
			</div>
			<div class="col-2" style="padding:1em">
				<a href="/BGE/clubs/clubs-reseaux.php" title="bouton les clubs et réseaux">
					<img class="img-fluid rond-couleur" src="files/images/rond-accueil/rond-clubs-reseaux.png" alt="reprise d'entreprise"/>
				</a>
			</div>
		</div>
	</div>

	<!-- section BGE AGENDA -->

	<section>
	<div class="section-marg-bottom">
		<div class="container-fluid">
			<div class="row justify-content-around">
				<div class="col-xl-5 col-md-5 col-xs-12 cl-back">

					<h1 class="linebge text-center" style="font-size:30px;margin-top: 0.5em;"><span style="color: black">BGE</span></h1>
					
					<p class="text-justify" style="padding: 1.5em">
						<strong>Qui sommes-nous?</strong> <br/> <br/>

						&nbsp; &nbsp;Association loi 1901, membre du réseau national des BGE.
						Depuis 35 ans, la vocation des 50 BGE françaises est de créer et de
						mettre en oeuvre des outils et programmes d’appui destinés à celles
						et ceux qui entreprennent. Il est présent à toutes les étapes de la
						création, de l’émergence au développement de l’entreprise en
						passant par le financement. BGE rompt avec l’image de complexité
						que l’on associe habituellement à la création d’entreprise et aplanit
						les difficultés de l’initiative, qu’elle soit individuelle ou collective.
					</p>
				</div> <!-- col-5 -->

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
					ORDER BY `date_agenda` ASC
					LIMIT 3"
				);

				?>

				<div class="col-xl-5 col-md-5 col-xs-12 cl-back">
					<a href="/BGE/agenda.php" title="page agenda"><h1 class="lineagenda text-center" style="font-size:30px;margin-top: 0.5em;"><span style="color: black">AGENDA</span></h1> </a>


					<?php	
					// On affiche chaque entrée une à une
					while ($donnees = $agenda->fetch())
					{

					?>

						<div class="container">
							<div class="row align-items-center" style="background-color: white; padding: 1em; border-radius: 10px; margin-bottom: 1em;">

								<div class="col-xl-9 col-md-9 col-xs-12" >
									<p> 
										<span class="text-uppercase" style="color: #337ab7"><?php echo $donnees['titre_categorieAgenda'];?></span> -
										<span class="font-italic text-lowercase"><?php echo $donnees['titre_agenda'];?></span> 
									</p>
										
									<p>
										Le  <strong><?php echo $donnees['date'];?></strong> de <strong><?php echo $donnees['heure_debut'];?></strong> à <strong><?php echo $donnees['heure_fin'];?> </strong>
										avec <strong><?php echo $donnees['intervenant_agenda'];?></strong>
									</p>

									<p class="text-justify">
										<span class="cl-underline"><strong>Lieu</strong></span> : <?php echo $donnees['lieu_agenda'];?> <br> <?php echo $donnees['adresse_agenda'];?> <br>
										<?php echo $donnees['CP_agenda'];?> <?php echo $donnees['ville_agenda'];?><br>  
									</p>
								</div>
								<div class="col-xl-3 col-md-3 col-xs-12" style=" padding: 1em;">
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

				</div> <!-- col-5 -->
			</div> <!-- row -->
		</div> <!-- container -->
	</div>
	</section>

		

	<!-- LA FABRIQUE -->
	<section class="section-marg-bottom">
		<div class="container-fluid">
			<div class="row justify-content-around">
				<div class="col-xl-11 col-md-11 col-xs-12 cl-back" >
					<a href="#" title="la fabrique"><img class="img-fluid" style="width: 100%;" src="/BGE/files/images/la-fabrique/la-fabrique.png" alt="co-working la fabrique"/></a>
				</div>
			</div>
		</div>
	</section>

		<!-- section LE MAG RETROSPECTIVE  -->
		
	<section class="section-marg-bottom">
		<div class="container-fluid">
			<div class="row justify-content-around">	

				<div class="col-xl-5 col-md-5 col-xs-12 cl-back" >

					<h1 class="linelemag text-center" style="font-size:30px;margin-top: 0.5em;"><span style="color: black">LE MAG INTER ACTIF</span></h1>

					<div class="row text-center align-items-center">
						<div class="col-xl-12 col-md-12 col-xs-12 cl-padding">
							<img class="cl-mag img-fluid" src="files/images/leMag/le_mag_inter_actif.jpg" alt="le mag inter actif">
						</div> <!-- col -->
						<div class="col-xl-12 col-md-12 col-xs-12 cl-padding">
							<button type="button" class="btn btn-warning cl-btn">S'abonner</button>
						</div> <!-- col -->
					</div> <!-- row cl-backlemag -->
				</div> <!-- col -->

				<div class="col-xl-5 col-md-5 col-xs-12 cl-back">
					<h1 class="lineactu text-center" style="font-size:30px;margin-top: 0.5em;"><span style="color: black">RETROSPECTIVE</span></h1>
					<a>
						<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">

							<div class="carousel-inner" >
							<!-- 	<ol class="carousel-indicators">
									<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
									<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
								</ol> -->
								<div class="carousel-item active">
									<img class="d-block w-100 img-fluid" src="files/images/page-accueil/bgeclub.jpg" alt="First slide">
									<div class="carousel-caption d-none d-md-block">
										<h5>BGE club</h5>
										<p>développer son réseau</p>
									</div>
								</div>
								<div class="carousel-item">
									<img class="d-block w-100  img-fluid" src="files/images/page-accueil/bgeclub.jpg" alt="Second slide">
									<div class="carousel-caption d-none d-md-block">
										<h5>BGE club</h5>
										<p>développer son réseau</p>
									</div>
								</div> <!-- div class carousel item -->
								
							</div> <!-- div id carousel inner -->
						</div> <!-- div id carousel -->
					</a>
				</div> <!-- col -->
			</div><!-- row -->
		</div><!-- container -->
	</section>

	<!-- section 3 PARTENAIRES -->
	<section>

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
		$reponse = $bdd->query('SELECT * FROM partenaires');
		?>

		<div class="container">
			<div class="row text-center align-items-center">
				<div class="col-12">
					<h1 class="titreh1">PARTENAIRES</h1>
					<div class='single-item'>
						<?php						
						// On affiche chaque entrée une à une
						while ($donnees = $reponse->fetch())
						{
							?>
							<div>
								<a href="<?php echo $donnees['url_partenaire']; ?>" target="_blank">
									<img class="img-fluid cl-partenaires mr-auto" src="/BGE/files/images/partenaires/<?php echo $donnees['logo_partenaire']; ?>" alt="<?php echo $donnees['nom_partenaire']; ?>"/>
								</a>
							</div>							
							<?php
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</section>

<!-- footer -->
<?php include('communs/footer.inc.php'); ?>
<script>
	$('.carousel').carousel({
		interval: 2000
	})
	</script>
</body>

</html>