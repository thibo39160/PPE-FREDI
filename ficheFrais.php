
	
<html>

<select name="utilisateur">
       <?php
                  
        ?>
</select>
<select name="utilisateur">
       <?php
                      $requete=mysql_query("SELECT * FROM etudiants");
                      while ($ligne= mysql_fetch_array($requete))
                  {
                         echo '<option value="'.$ligne['NomEtudiant'].'">'.$lignes['PrenomEtudiant'].'</option>';
                  }
        ?>
</select>
</html>