<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="fr">
<!-- head -->
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Accompagnement (DLA)</title>

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
				<a href="#">Accompagnement</a>
			</div>
		</div> <!-- col-12 -->
	</div> <!-- row -->
</div> <!-- container -->

<div class="container-fluid">
	<div class="row">
		<div class="col-xl-3 col-md-3 col-xs-12 text-center sidebar-offcanvas sidequisommesnous" id="sidebar">
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

			<div class="col-xl-9 col-md-9 col-xs-12 col-9-pad mr-auto" >
				<h1 class="titreh1 text-center" style="margin-top: 0em;">Accompagnement</h1>
				<h2 class="titreh2" style="margin-top: 0em;">Bénéficiez de l'accompagnement d'un expert avec le DLA</h2>
				<P class="text-justify">
					&nbsp &nbsp Vous avez besoin d’un appui extérieur pour vous développer, pour dépasser une difficulté conjoncturelle ou structurelle ? Grâce au dispositif local d'accompagnement (DLA), vous bénéficiez de l'accompagnement sur mesure et gratuit d’un expert.
				</br>
			</br>
			&nbsp &nbsp Vous souhaitez créer ou pérenniser un emploi pour développer votre activité ? Vous êtes confrontés à des baisses de financement ? Vous assistez au départ des bénévoles ? Vous voulez améliorer vos outils de gestion, de communication et ou d’organisation ?
		</P>
		<br>
		<h2 class="cl-h2accompagnement"><strong>Le DLA peut vous aider à trouver des solutions</strong></h2>
		<p class="text-justify">
			Pour répondre à ces problématiques, vous pouvez faire appel au dispositif local d’accompagnement (DLA) qui missionnera un expert pour vous accompagner.
			Contactez l’opérateur DLA pour un premier rendez-vous afin de réaliser un premier diagnostic de vos besoins.
			Cet opérateur vous proposera ensuite un plan d’accompagnement et vous conseillera plusieurs prestataires, en vous guidant durant toute la conduite de sa mission.
		</p>

		<h2 class="titreh2">Les étapes du dispositif DLA</h2>


		<div class="container">
			<p id="form_contenu" class="form_txt">
				<a  class="cl-a" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
					<ul class="cl-ul">
						<li class="cl-collapse text-center text-bold">Phase 1 : Les objectifs et principes <i class="fas fa-angle-down"></i></li>	
					</a>
					<br>
				</p>
				<div id="collapse1" class="panel-collapse collapse form_txt">
					<div class="row">
						<div class="col-xs-12 col-xl-12 col-md-12">
							<ul>
								<li class="text-justify">
									Cette première phase du processus est importante pour favoriser la connaissance
									mutuelle entre le DLA départemental ou régional (sa posture, sa valeur ajoutée, etc.) et la structure (son projet, son activité, etc.). Elle permet également, de part et d’autre, de décider de poursuivre ou non la démarche.
								</li>
								<br>
								<li>
									<strong>Les étapes clés : </strong> <br>
									<strong>Étape 1 </strong>:
									Accueillir et informer la structure; <br>
									<strong>Étape 2 </strong>:
									Orienter le cas échéant vers les autres ressources du territoire; <br>
								</li>
							</ul>
						</div>
					</div> <!-- row -->
				</div> <!-- collapse -->
			</div> <!-- container -->

			<div class="container">
				<p id="form_contenu" class="form_txt">
					<a class="cl-a" data-toggle="collapse" data-parent="#accordion" href="#collapse2">
						<ul class="cl-ul">
							<li class="cl-collapse text-center text-bold">Phase 2 : Diagnostic<i class="fas fa-angle-down"></i></li>	
						</a>
						<br>
					</p>
					<div id="collapse2" class="panel-collapse collapse form_txt">
						<div class="row">
							<div class="col-xs-12 col-xl-12 col-md-12">
								<ul>

									<li class="text-justify">
										<strong>Les objectifs et principes :</strong> <br>
										Il s’agit d’un diagnostic partagé, élaboré dans un esprit collaboratif. Il a pour objectif d’apporter un regard nouveau sur la structure et sur son environnement. On adopte ainsi une approche globale (analyse de l’environnement) parallèlement à une approche systémique (analyse des systèmes de l’organisation). Le diagnostic permet alors d’identifier les éléments positifs et les freins au développement de la structure. Des besoins d’accompagnement par le DLA ou d’autres acteurs de l’accompagnement émergent, et des perspectives d’évolution se dessinent. Le diagnostic est « partagé » car, bien que rédigé par le chargé de mission du DLA, il est élaboré conjointement avec les dirigeants de la structure bénéficiaire qui en valident les conclusions.
									</li>
									<br>
									<li>
										<strong>Les étapes clés : </strong> <br>
										<strong>Étape 1 </strong>:
										Collecte d’informations visite de la structure et entretien; <br>
										<strong>Étape 2 </strong>:
										Recherches complémentaires auprès d’autres acteurs; <br>
										<strong>Étape 3 </strong>:
										Rédaction et synthèse des éléments recueillis; <br>
										<strong>Étape 4 </strong>:
										Présentation et validation du diagnostic et plan d’accompagnement. <br>
									</li>
								</ul>
							</div>
						</div> <!-- row -->
					</div> <!-- collapse -->
				</div> <!-- container -->


				<div class="container">
					<p id="form_contenu" class="form_txt">
						<a class="cl-a" data-toggle="collapse" data-parent="#accordion" href="#collapse3">
							<ul class="cl-ul">
								<li class="cl-collapse text-center text-bold">Phase 3 : Mise en œuvre du plan d’accompagnement<i class="fas fa-angle-down"></i></li>	
							</a>
							<br>
						</p>
						<div id="collapse3" class="panel-collapse collapse form_txt">
							<div class="row">
								<div class="col-xs-12 col-xl-12 col-md-12">
									<ul>
										<li class="text-justify">
											<strong>Les objectifs et principes :</strong> <br>
											Animée par le chargé de mission DLA, en lien avec ses partenaires, la mise en œuvre du plan d’accompagnement consiste en la combinaison dans le temps et dans la durée : <br>
											- d’une ou plusieurs actions d’ingénieries individuelles et/ou collectives ;<br>
											- de ressources du territoire mobilisées ;<br>
											- de l’apport d’expertise « interne » par le chargé de mission DLA ;<br>
											- d’actions à réaliser par la structure elle-même en interne.<br>
											Le DLA est donc un outil et un mode d’intervention particuliers, parmi d’autres, du plan d’accompagnement se combinant avec par exemple : les fédérations et réseaux associatifs, les dispositifs et actions des services de l’Etat, des collectivités et autres organismes publics (CAF,...), les acteurs financiers (acteurs bancaires, ...).
										</li>
										<br>
										<li>
											<strong>Les étapes clés : </strong> <br>
											<strong>Étape 1 </strong>:
											Finalisation du cahier des charges en lien avec la structure bénéficiaire; <br>
											<strong>Étape 2 </strong>:
											Sélection d’un prestataire et conventionnement; <br>
											<strong>Étape 3 </strong>:
											Suivi de l’ingénierie. <br>
										</li>
									</ul>
								</div>
							</div> <!-- row -->
						</div> <!-- collapse -->
					</div> <!-- container -->

					<div class="container">
						<p id="form_contenu" class="form_txt">
							<a class="cl-a" data-toggle="collapse" data-parent="#accordion" href="#collapse4">
								<ul class="cl-ul">
									<li class="cl-collapse text-center text-bold">Phase 4 : Consolidation de l’accompagnement<i class="fas fa-angle-down"></i></li>	
								</a>
								<br>
							</p>
							<div id="collapse4" class="panel-collapse collapse form_txt">
								<div class="row">
									<div class="col-xs-12 col-xl-12 col-md-12">
										<ul>
											<li class="text-justify">
												<strong>Les objectifs et principes :</strong> <br>
												La phase de suivi et de consolidation permet d‘inscrire les effets de l’accompagnement dans la durée.
												Elle fait référence à un ensemble d’actions de suivi et d’évaluation faisant suite à une ingénierie DLA reçue par une structure (jusqu’à 2 ans après cette ingénierie). Ces actions permettent d’appuyer la structure dans sa dynamique de changement, d’évaluer les effets de l’accompagnement et son appropriation, d’actualiser le plan d’accompagnement et d’identifier d’éventuels nouveaux besoins.
											</li>
											<br>
											<li>
												<strong>Les étapes clés : </strong> <br>
												<strong>Étape 1 </strong>:
												Bilan de l’ingénierie; <br>
												<strong>Étape 2 </strong>:
												Suivi post ingénierie. <br>
											</li>
										</ul>
									</div>
								</div> <!-- row -->
							</div> <!-- collapse -->
						</div> <!-- container -->

					</div> <!--  col-8 -->
				</div> <!--  row -->
			</div> <!--  container -->


			<!--FOOTER-->
			<?php include('C:/wamp/www/BGE/communs/footer.inc.php'); ?>

		</body>

		</html>

