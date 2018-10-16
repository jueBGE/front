<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="fr">
<!-- head -->
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Présentation (DLA)</title>

	<?php include('C:/wamp/www/BGE/communs/head.inc.php'); ?>
</head> <!-- fin head -->

<body>
	<!--HEADER-->
	<?php include('C:/wamp/www/BGE/communs/header.inc.php'); ?>


	<!--FIN CARROUSSEL-->

	<!--FIL ARIANE-->
<!-- <div class="container">
	<div class="breadcrumb">
		<a href="/BGE/index.html" class="first">Accueil</a><span class="sep"> &gt; </span>
		<a href="/BGE/---">---</a><span class="sep"> &gt; </span>
		<a href="/BGE/---">DLA</a>
	</div>
</div> -->
<!--FIN FIL ARIANE-->

<!--CONTENU-->
<!-- <div class="row">
	<div class="col-xs-1 col-md-1 col-lg-1 colVertical">
		&nbsp;
	</div> --><!--
-->
	<!-- <div class="col-xs-3 col-md-3 col-lg-3 colVertical darkblue">
		<div>
			&nbsp;
		</div>
	</div> --><!--
-->
	<!-- <div class="col-xs-7 col-md-7 col-lg-7 colVertical">
		<div style="width:100%">
			<h1 class="titreH1 darkblue">DLA</h1>
		</div>
		<br> -->
		<!-- <table border="0" cellpadding="1" cellspacing="1" style="width:100%">
		<tbody>
			<tr>
				<td style="width:40%">
					<img alt="Le Club des Nouveaux Arrivants" src="/BGE/files/images/DLA/logoDLASite2.jpg" class="img-responsive centree" />
				</td>
				<td class="rtecenter" style="width:600px">
					<span style="font-size:18px;color:#00B8ED"><strong>Le Dispositif Local Accompagnement (DLA) : soutenir l'activité des 
					structures d'utilité sociale</strong></span>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<div class="txtjustify">
						Ce dispositif a été créé en France à partir de 2002 par l'Etat et la Caisse des Dépôts et Consignations. Il est destiné 
						à soutenir l'activité et l'emploi dans le secteur associatif. Dans ce cadre, nous proposons un accompagnement individuel 
						ou collectif, aus ein même de votre association, basé sur la préconisation d'un plan de consolidation de votre structure. 
						L'accompagnement sera basé sur les besoins et attentes que vous aurez spécifiées auprès de la structure diagnostic.
					</div>
					<br />
					<br />
					Contact : 02 54 36 58 66 ou 
					<a href="mailto:marion.lesaout@boutiquedegestion-indre.com ">marion.lesaout@bge-indre.com </a>
					<br/>
					<div align="center">
					<iframe width="560" height="315" src="https://www.youtube.com/embed/tJt7k_yjo1k" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
					</div>
					<br/>
					Cette action est co-financée par le FSE :
					<br/>
					<img alt="Le Club des Nouveaux Arrivants" src="/BGE/files/images/DLA/bandeau_3logos_europeens.png" class="img-responsive centree" />
				</td>
			</tr>
		</tbody>
	</table>
	</div>
</div> -->
<!--FIN CONTENU-->

<!--CONTENU-->
<!-- fil d'ariane -->
<div class="container-fluid">
	<div class="col-12">
		<div class="mybreadcrumb flat">
			<a href="#" class="active">Accueil</a>
			<a href="#" class="active">DLA</a>
			<a href="#">Présentation</a>
		</div>
	</div> <!-- col-12 -->
</div> <!-- row -->
</div> <!-- container -->

<div class="container-fluid" >
	<div class="row">
		<div class="col-xl-3 col-md-3 col-xs-12 text-center sidebar-offcanvas sidequisommesnous" id="sidebar">
			<a class="image-popup-vertical-fit" href="/BGE/files/images/DLA/chiffres-cles-dla.jpg" title="Les chiffres clés">
				<img class="img-fluid mr-auto" src="/BGE/files/images/DLA/chiffres-cles-dla.jpg" alt="les chiffres clés"width="200" height="200">
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

			<h1 class="titreh1 text-center" style="margin-top: 0em;">Présentation</h1>
			<h2 class="titreh2" style="margin-top: 0em;">Qu'est-ce que le DLA ?</h2>

			<div class="row">
				<div class="col-xl-4 col-md-4 col-xs-12 text-center mr-auto">
					<img src="/BGE/files/images/DLA/dla-logoindre.png" alt="logo dla" class="img-fluid logodla">
				</div>
				<div class="col-xl-8 col-md-8 col-xs-12">
					<p class="text-justify alinea">
						Le Dispositif Local d’Accompagnement est un appui professionnel externe qui s’adresse aux structures employeuses de l'Économie Sociale et Solidaire (ESS) qui s’interrogent sur la consolidation et le développement de leurs activités et leurs emplois.
					</br> </br>
					« La finalité du dispositif est la création, la consolidation, le développement de l’emploi et
				l’amélioration de la qualité de l’emploi par le renforcement du modèle économique de la structure accompagnée, au service de son projet et du développement du territoire. » </br> 
				<span class="font-italic"><a href="https://www.legifrance.gouv.fr/eli/decret/2015/9/1/ETSD1514607D/jo/texte">Art 1er Décret n°2015-1103</a> du 1er septembre 2015 relatif au dispositif local d'accompagnement. </span>
			</p>
		</div> <!-- col-xl-8 col-md-8 col-xs-12 -->
	</div> <!-- row -->

	<h2 class="titreh2">Présentation du DLA</h2>
	<div class="video-container">
		<iframe src="https://www.youtube.com/embed/tJt7k_yjo1k" frameborder="0" width="560" height="315"></iframe> 
	</div>
	

	<div class="container-fluid" style="padding: 0px;">
		<div class="row text-justify">
			<div class="col-xs-12 col-md-12 col-xl-12">
				<h2 class="titreh2">Qui sont les bénéficiaires?</h2>
				<p class="text-justify alinea">Les structures de l’Economie Sociale et Solidaire créatrices d’emploi et engagées dans une démarche de consolidation ou de développement de leur activité, c’est-à-dire : (<a class="font-italic" href="https://www.legifrance.gouv.fr/affichTexteArticle.do;jsessionid=E5ACCAA9B96A47AAA68C5E7EE98612D1.tplgfr30s_3?idArticle=JORFARTI000029313580&cidTexte=JORFTEXT000029313296&dateTexte=29990101&categorieLien=id" alt="article 61">Article 61 de la loi ESS du 31 juillet 2014</a>) </p><br>
			</div> 

			<div class="col-xs-12 col-md-12 col-xl-12">
				<p><strong>Les entreprises relevant de l’ESS par leur nature juridique :</strong></p> 
				<ul>
					<li>Associations à but non lucratif</li>
					<li>Mutuelles</li>
					<li>Coopératives</li>
					<li>Fondations</li>
				</ul>
				<br>
				<p><strong> Les entreprises commerciales bénéficiant de l’agrément Entreprise Solidaire d’Utilité
					Sociale (ESUS) relevant de <a class="font-italic" href="https://www.legifrance.gouv.fr/affichCodeArticle.do?cidTexte=LEGITEXT000006072050&idArticle=LEGIARTI000019292111&dateTexte=&categorieLien=cid" alt="article L3332-17-1" >l’article L3332-17-1 </a> du code du travail. </strong></p>
				</div>
			</div>	<!-- row -->
		</div> <!-- container -->

		<br>
		<!-- Problematiques rencontrées/ Exemples de thématiques d'accompagnement/Les principes d'intervention du dispositif -->

		<div class="container">
			<p id="form_contenu" class="form_txt">
				<a class="cl-a" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
					<ul class="cl-ul">
						<li class="cl-collapse text-center text-bold">Problématiques rencontrées : <i class="fas fa-angle-down"></i></li>	
					</a>
					<br>
				</p>
				<div id="collapse1" class="panel-collapse collapse form_txt">
					<div class="row">
						<div class="col-xs-12 col-xl-12 col-md-12">
							<ul>
								<li>Baisse de financements ;</li><br>
								<li>difficultés de renouvellement des bénévoles ;</li><br>
								<li>manque/ besoin d’outils de gestion/ d’organisation / de communication.</li><br>
							</ul>
						</div>
					</div> <!-- row -->
				</div> <!-- collapse -->

			</div> <!-- container -->


			<div class="container">
				<p id="form_contenu" class="form_txt">
					<a class="cl-a" data-toggle="collapse" data-parent="#accordion" href="#collapse2">
						<ul class="cl-ul">
							<li  class="cl-collapse text-center text-bold">Exemples de thématiques d'accompagnement :<i class="fas fa-angle-down"></i></li>	
						</a>
						<br>
					</p>
					<div id="collapse2" class="panel-collapse collapse form_txt">
						<div class="row">
							<div class="col-xl-6 col-md-6 col-xs-12">
								<ul class="text-justify">
									<li>Adaptation de l’offre à l’évolution de la demande et du contexte concurrentiel (étude de marché locale ou régionale, analyse stratégique de positionnement des acteurs locaux) ;</li><br>
									<li>l’élaboration d’un plan stratégique de développement de l’activité (croissance, essaimage, duplication) ;</li><br>
									<li>l’évolution du modèle économique de la structure ;</li><br>
									<li>la fusion, la mutualisation et le regroupement de structures ;</li><br>
									<li>le renforcement de la stratégie financière de la structure ;</li><br>
								</ul>
							</div> <!-- col -->

							<div class="col-xl-6 col-md-6 col-xs-12">
								<ul class="text-justify">
									<li>l’accompagnement à la fonction managériale et à l’amélioration de la qualité de la vie au travail et de la fonction employeur ;</li><br>
									<li>l’ancrage territorial de la structure et son lien aux collectivités (notamment en accompagnant la mesure de l’utilité sociale sur son territoire) ;</li><br>
									<li>la diversification des partenariats, dont les partenariats avec les entreprises non ESS ;</li><br>
									<li>les modalités de gouvernance des structures de l’ESS.</li><br>
								</ul>
							</div> <!-- col -->
						</div> <!-- row -->
					</div> <!-- collapse -->
				</div> <!-- container -->


				<div class="container">
					<p id="form_contenu" class="form_txt">
						<a class="cl-a" data-toggle="collapse" data-parent="#accordion" href="#collapse3">
							<ul class="cl-ul">
								<li  class="cl-collapse text-center text-bold">Les principes d'intervention du dispositif (charte d'engagements réciproques) : <i class="fas fa-angle-down"></i></li>
							</a>
							<br>
						</p>
						<div id="collapse3" class="panel-collapse collapse form_txt">
							<div class="row">
								<div class="col-xl-6 col-md-6 col-xs-12">
									<ul class="text-justify">
										<li>Gratuité : prise en charge du financement et de la mise en oeuvre d’actions d’ingénieries individuelles ou collectives ;</li> <br>
										<li>la libre adhésion des structures bénéficiaires et leur participation à chaque étape de l’accompagnement ;</li><br>
										<li>suivi des structures dans une logique de plan d’accompagnement inscrit dans le temps ;</li><br>
										<li>concertation et coopération globale avec l’ensemble des acteurs concernés du territoire (acteurs représentatifs de l’ESS, collectivités territoriales, services déconcentrés et correspondants régionaux de l’ESS, Plans Locaux pour l’Insertion et l’Emploi (PLIE), missions locales, etc.) dans le cadre de l’analyse des besoins territoriaux ;</li><br>
										<li>cadre d’intervention complémentaire aux dispositifs existants ;</li><br>
									</ul>
								</div> <!-- col -->

								<div class="col-xl-6 col-md-6 col-xs-12">
									<ul class="text-justify">
										<li>mise à disposition d’un réseau d’experts ;</li><br>
										<li>accompagnement centré sur les projets et les activités pour soutenir l’emploi dans les structures de l’ESS ;</li><br>
										<li>DLA : outil d’animation territorial (neutralité dans la mise en lien des acteurs territoriaux) ;</li><br>
										<li>ingénierie individuelle : accompagnement personnalisé à votre structure ;</li><br>
										<li>ingénierie collective : accompagnement ouvert à tous les bénéficiaires sur une thématique sectorielle, d’actualité, de gestion générale ou de rapprochement.</li><br>
									</ul>
								</div> <!-- col -->
							</div> <!-- row -->
						</div> <!-- collapse -->
					</div> <!-- container -->


					<div class="container">
						<p class="text-justify font-italic">
							Ce dispositif est gratuit pour les bénéficiaires, il a été créé en 2002 par l’État et la Caisse des Dépôts, avec le soutien du Fonds social européen, rapidement rejoints par le Mouvement associatif.
						</p>
					</div>
					<div class="container">
						<img class="img-fluid" src="/BGE/files/images/DLA/resume-dla.jpg" alt="résumer dla">
					</div>	

				</div> <!--  row -->
			</div> <!--  container -->

		</div> <!--  col-8 -->
	</div> <!--  row -->
</div> <!--  container -->

<!--FOOTER-->
<?php include('C:/wamp/www/BGE/communs/footer.inc.php'); ?>

</body>

</html>