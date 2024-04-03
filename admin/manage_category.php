<?php 
require_once 'inc/header.php'; 
active_status();

$value = view_cat();


?>
<?php

if(!isset($_SESSION['ADMIN'])){
    header("location: index.php");
    
}
?>
<?php require_once 'inc/nav.php'; ?>



<?php require_once 'inc/footer.php'; ?>