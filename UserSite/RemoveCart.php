<?php
  session_start();
  include "connect.php";   

if(isset($_GET['dss']))
{	
   $link->where('CartID',$_GET['dss']);
   $h=$link->update('CartTB',Array('Is_Active'=>0));
}
  
if(isset($_GET['dss1']))
{	
   $link->where('CartPackageID',$_GET['dss1']);
   $h=$link->update('cartpackagetb',Array('Is_Active'=>0));
}?>