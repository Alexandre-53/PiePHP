<div class="register">
 
<form  action="register" method="POST" enctype="multipart/form-data"><fieldset> <legend>S'enregistrer</legend>
<?= $message ?>

<h4>Nom<h4>
<input type="text" name="nom" ><br>
<h4>Prénom<h4>
<input type="text" name="prenom" ><br>
<h4>Date de naissance<h4>
<input type="date" name="anniversaire"><br>
<h4>Adresse email <span>*</span><h4>
<input type="email" name="email" required><br>
<h4>Mot de passe <span>*</span><h4>
<input type ="password" name="password" required><br><br>
<!-- <h4>Choisissez votre photo de profil :</h4>
<input type="file" name="avatar"><br><br> -->
<script src='https://www.google.com/recaptcha/api.js'></script>
<input type="hidden" name="recaptcha_response" id="recaptchaResponse">
<input type="submit" class="btn btn-info" name="envoyer" value="Envoyer">
</fieldset>
</form>
</div>
