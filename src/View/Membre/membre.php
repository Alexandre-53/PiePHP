<div class="titremembres">
    <h3>Recherche de membres</h3>
</div>
 <!-- FORMULAIRE DE RECHERCHE -->	
<form method ="POST" action="<?=BASE_URI?>/membre">
<div class="recherchemembres">
      <label>Recherche par nom : </label>
    <input name="nom" type="text" size="30"style="width:300px">&nbsp;&nbsp;&nbsp;&nbsp;
      <label>Recherche par prénom: </label>
    <input name="prenom" type="text" size="30"style="width:300px">&nbsp;&nbsp;
    <input type = "submit" name = "seek" value = "Rechercher"><br>
  </div>
</form>
<?php
if($message !=NULL){
  echo "		
  <section>
  <!--for demo wrap-->
  <h2>Résultat de la recherche</h2>
  <div class='tbl-header'>
    <table cellpadding='0' cellspacing='0' border='0'>
      <thead>
<tr>
  <th>Nom</th>
  <th>Prenom</th>
  <th>Email</th>
  <th>Ville</th>
</tr>
</thead>
</table>
</div>
<div class='tbl-content'>
<table cellpadding='0' cellspacing='0' border='0'>
  <tbody>";
foreach($message as $seeknom_trouve)
    {
        echo "
        <tr>
                    <td>".$seeknom_trouve['nom']."</td>
                    <td>".$seeknom_trouve['prenom']."</td>
                    <td>".$seeknom_trouve['email']."</td>
                    <td>".$seeknom_trouve['cpostal']." ".$seeknom_trouve['ville']."</td>
                  </tr>";
    }
    echo'</tbody>
    </table>
  </div>
</section>';
}
?>
<script src="http://webacademie/PiePHP/js/table.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>