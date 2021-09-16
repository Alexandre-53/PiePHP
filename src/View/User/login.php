<div class="login">
<fieldset>  
<form  action="login" method="POST"><legend>S'identifier</legend>
<?= $message ?>
<h4>email <span>*</span><h4>
<input type="email" name="email" required><br>
<h4>Mot de passe <span>*</span><h4>
<input type ="password" name="password" required><br><br>
<input type="submit" class="btn btn-info" name="envoyer" value="Envoyer">
</form>
</fieldset>
</div>
