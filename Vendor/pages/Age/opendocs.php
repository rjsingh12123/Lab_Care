<?php
   if(isset($_GET['url']))
   {
	     header('Content-type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
      readfile($_GET['url']);
       exit;  
   }


?>