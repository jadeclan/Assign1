<?php
   require_once('helpers/visits-setup.inc.php');
   $browsersHitsGate = new BrowserHitsTableGateway($dbAdapter);
   $browsersHitsResults = $browsersHitsGate->findAll();
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Driving Data</title>
      <?php include 'helpers/visits-head.inc.php'; ?>
      <script>
          var browserStats = <?php echo json_encode($browsersHitsResults); ?>;
      </script>
   </head>
   <body>  
      <?php include 'helpers/visits-header.inc.php'; ?>
      <h1>All Our Code Goes here - Data required for cards 1 and 2 shown below</h1>
      <table>
        <tr>
            <th>Browser ID</th>
            <th>Browser Name</th>
            <th>Number of Hits</th>
            <th>% of total</th>
        </tr>
        <?php createTableRows($browsersHitsResults) ?>
      </table>
      <select id="bSelection" name=browserName onchange="createBrowserBox(browserStats)" >
        <?php createOptionList($browsersHitsResults); ?>
      </select>
      <p id="browserBox"></p>
      <?php include 'helpers/visits-footer.inc.php'; ?>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<!--      <script type="text/javascript" src="javaScript/materialize.js"></script>  -->
      <script type="text/javascript" src="javaScript/card2.js"></script>
   </body>
</html>                                                                                             