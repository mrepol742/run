<?php 
//GET
<?php
if(isset($_GET['name'])){
   echo "Hello " . $_GET['name'];
}
?>

//POST
<?php
if(isset($_POST['name'])){
   echo "Hello " . $_POST['name'];
}
?> 
?>