<div class="titolo">
 
 
  
   <h1>Prodotti:</h1>    <div class="btn nuovo btn-default"><a href="index1.php?name=nuovo"><i class="glyphicon glyphicon-cloud-upload"> Nuovo </i></a></div>

<hr />

<div class="clear"></div>
  
</div>




<table class="table table-striped">
  <thead>
      <tr>
        <th>Prodotto</th>
        <th>Thumb</th>
        <th>Modifica</th>
        <th>Elimina</th>
      </tr>
   </thead>
   <tbody>
   <?php 
   
   $result = $mysqli->query("SELECT * FROM `prodotti` ORDER BY id_prod DESC ");  


    while ( $row = $result->fetch_array()){
	
?>
      <tr>
        <td><?php echo $row["nome_prod"]; ?></td>
        <td><img src="../imgs/thumbs/<?php echo $row["thumb_prod"]; ?>" width="60" /></td>
        <td><div class="btn btn-default"><a href="index1.php?name=modifica&id=<?php echo $row["id_prod"]; ?>"><i class="glyphicon glyphicon-list"></i></a></div></td>
        <td>
         <form action="action.php" method="post"  enctype="multipart/form-data">
            <input name="id" type="hidden" value="<?php echo $row["id_prod"]; ?>" />
            <button name="del" class="btn btn-default"><i class="glyphicon glyphicon-remove"></i></button>
         </form>
       </td>
      </tr>
      
    <?php } ?>  
     
  </tbody>
</table>