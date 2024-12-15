<!-- STANDARD PROGRAM (DON'T CHANGE IT) -->

<?php
session_start();
session_unset(); 
session_destroy();
header('Location: ../../');
exit();
?>
