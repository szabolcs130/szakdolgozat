<?php
class tablazat{
    public static function tablazatOsztalynak($fejlec,$adat){
        
          ?>
          <table>
          <thead> <?php
         
              
              foreach ($fejlec as $value) {
                ?> <td> <?php echo $value; ?> <td> <?php
              }
            ?>
          </thead>
          <tbody>
          <?php
         
          foreach ($adat as $value) {
            var_dump($value); echo "<br>";
              ?>   <tr> <?php
              foreach ($value as $v) {
                ?> <td> <?php echo $v->getId(); ?> </td> <?php
              }
              ?>   </tr> <?php
            }
            ?>
            
          </tbody>
            </table>
            <?php
       
         
      }
}
?>