<?php
   require_once('helpers/visits-setup.inc.php');
   $gate = new BrowserTableGateway($dbAdapter);
   $result = $gate->findAll();
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Driving Data</title>
      <?php include 'helpers/visits-head.inc.php'; ?>
   </head>
   <body>  
      <?php include 'helpers/visits-header.inc.php'; ?>
      <h1>All Our Code Goes here - example 'class' use below</h1>
      <?php
          foreach ($result as $row)
          {
             echo $row->id . " - " . $row->name . "<br/>";
          }
      ?>
      <?php include 'helpers/visits-footer.inc.php'; ?>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
   </body>
</html>                                                                                             