<!DOCTYPE html>
<html>
<head>
	<title>formulaire</title>
</head>
<body id="formulaireres">
<?php

	session_start();
	if (!isset($_SESSION['loggedin'])) 
        header("Location: login.php");
    
?>


	<link rel="stylesheet" href="css/form.css">
	<link rel="stylesheet" type="text/css" href="css/style1.css">
	


	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript"></script>
	


	<div class="panel panel-default shadow container euh" >
			
		<form class="frmlr" id="frm" name="euh" enctype="multipart/form-data" action="insert.php" method="POST">
			<div class="sticky-top " style="background-color: #ffffffff;">
			<legend class="display-4 text-center">Reservation</legend>
			<hr>
				<div style="text-align:center;margin-top:40px;">
  					<span class="step"></span>
  					<span class="step"></span>
  					<span class="step"></span>
				</div>

		</div>
			<div class="etape">
			<div class="form-group">
				<label  for="nom">Nom</label>
				<input class="form-control" type="text" name="nom" placeholder="nom" required pattern="[A-Za-z]{1,15}">
				<small class="form-text text-muted">ne depasse pas 15 characters</small>		
			</div>
				<hr>
			<div class="form-group">
				<label for="prenom">Prenom</label>
				<input class="form-control" type="text" name="prenom" placeholder="prenom" required pattern="[A-Za-z]{1,20}">
				<small class="form-text text-muted">ne depasse pas 20 characters</small>
			</div><hr>
			<div class="form-group">
				<label for="matricule">Matricule</label>
				<input class="form-control" type="text" name="matricule" placeholder="matricule" required pattern="[A-Za-z0-9]{1,12}">
				<small class=" form-text text-muted">ne depasse pas 12 characters </small>
			</div class="form-group"><hr>
			<div class="form-group">
				<label for="annee">Annee</label>
				<select name="annee" id="annee" tabindex="5">
					<option value="">Choisir le niveau</option>
					<optgroup label="niveau">
						<option value="1CP">1CP</option>
						<option value="2CP">2CP</option>
						<option value="1CS">1CS</option>
						<option value="2CS">2CS</option>
						<option value="3CS">3CS</option>
					</optgroup>
				</select>
			</div><hr>

			<div class="form-group">
				<label for="descp">Description</label>
				<input class="form-control"type="text" name="descp" placeholder="description" required pattern="[A-Za-z0-9]{1,255}"></div>
			<div class="form-group">
				<label for="event">Evenement</label>
				<input  class="form-control" type="text" name="event"placeholder="event" required pattern="[A-Za-z0-9]{1,255}"></div><hr>
			<div class="form-group">
				<label for="mail">Email</label> 
				<div class="input-group">
				<input class="form-control" type="email" name="mail" placeholder="email" required ></div></div><hr>
			<div class="custom-file"><label class="custom-file-label" for="Filename">Fichier</label>
				<input class="custom-file-input" type="file" name="Filename" >
				<small class="form-text text-muted">Taille maximale du ficher 128M</small></div>
				</div>	


				<div class="etape">
				<div class="form-group">
				<label for="date_db">Date/heure debut</label>
				<input type="datetime-local" id="ddb" name="date_db"></div>
				<hr>
				<div class="form-group">
				<label for="date_db">Date/heure fin  </label>
				<input type="datetime-local" id="dfn" name="date_fn"></div>
				

								
							</div>

								<div class="etape"><div class="form-group" id="salle_libre"></div>


							</div><!--div reservé pur la creation du <selec> des salles libres--> 

									<!--<input type="submit" name="envoyer">
									<br>
									<button class="btn btn-outline-primary" type="button" id="btn" onclick="salleLibre();">euh</button>-->

									<div style="overflow:auto;">
  											<div style="float:right;">
   									 			<button class=" btn btn-outline-danger" type="button" id="prevBtn" onclick="nextPrev(-1)">Precedant</button>
   									 			<button class=" btn btn-outline-success"type="button" id="nextBtn" onclick="nextPrev(1)">Suivant</button>
  											</div>
									</div>

								</form>

								
							</div>
							<script type="text/javascript" src="js/form.js"></script>

							

						
	 </body>
	 </html>