<div class="titremembres">
    <h3>Recherche de film</h3>
</div>
 <!-- FORMULAIRE DE RECHERCHE -->	
 <form action="<?=BASE_URI?>/film" method = "POST">
   <p>Recherche par titre :</p> 
   <input type = "search" name = "film">
   <input type = "submit" name = "seek" value = "Rechercher"><br />
  </form>
  <?php
  if(isset($recherche)=== true){
    echo'<section>
  <!--for demo wrap-->
  <h2>Résultat de la recherche</h2>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>Titre</th>
          <th>Genre</th>
          <th>Année de production</th>
          <th>Durée du film</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>';

  foreach($recherche as $result){
    echo "<tr>
    <td>".$result["titre"]."</td>
    <td>".$result["nom"]."</td>
    <td>".$result["annee_prod"]."</td>
    <td>".$result["duree_min"]."</td>
    </tr>";
  }
      echo'</tbody>
    </table>
  </div>
</section>';
}
?>
<script src="http://webacademie/PiePHP/js/table.js"></script>  