<!-- EDITER LE PROFIL -->
<?php if(isset($user)):?>
<div class="edit">
<?= $message ?>
<form method="POST" action="<?=BASE_URI?>/profil/delete" id="supprimed"></form>
<form action="<?=BASE_URI?>/profil" method="POST" enctype="multipart/form-data" id="assasincreeted">
<fieldset> <legend>Mon profil</legend>
<h4>Nom<h4>
<input type="text" name="nom" value ="<?=$user["nom"]?>"><br>
<h4>Prénom<h4>
<input type="text" name="prenom" value ="<?=$user["prenom"]?>"><br>
<h4>Date de naissance<h4>
<input type="date" name="anniversaire" value ="<?=$user["anniversaire"]?>"><br>
<h4>Adresse email <span>*</span><h4>
<input type="email" name="email" value ="<?=$user["email"]?>"><br>
<h4>Mot de passe <span>*</span><h4>
<input type ="password" name="password"><br><br>
<!-- <h4>Choisissez votre photo de profil :</h4>
<input type="file" name="avatar"><br><br> -->
<script src='https://www.google.com/recaptcha/api.js'></script>
<input type="hidden" name="recaptcha_response" id="recaptchaResponse">
<input type="submit" class="btn" name="envoyer" value="Editer" form="assasincreeted">&nbsp;&nbsp;&nbsp;
<input type="submit" class="btn btn-red" name="delete" value="Supprimer mon compte" form="supprimed">
</fieldset>
</form>
</div>
<?php else:?>
    <?="Vous n'êtes pas connecté";?>
<?php endif;?>