<?php
   require_once('helpers/visits-setup.inc.php');
   $browsersHitsGate = new BrowserHitsTableGateway($dbAdapter);
   $browsersHitsResults = $browsersHitsGate->findAll();
   $continentVisitsGate = new ContinentVisitsTableGateway($dbAdapter);
   $continentVisitsResults = $continentVisitsGate->findAll();
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Driving Data</title>
      <?php include 'helpers/visits-head.inc.php'; ?>
      <script>
          var browserStats = <?php echo json_encode($browsersHitsResults); ?>;
          var continentStats = <?php echo json_encode($continentVisitsResults); ?>;
      </script>
   </head>
   <body>
     <div class="container">
      <?php include 'helpers/visits-header.inc.php'; ?>
      <h1>All Our Code Goes here - Data required for cards 1 and 2 shown below</h1>
      <table class="striped">
        <tr>
            <th>Browser ID</th>
            <th>Browser Name</th>
            <th>Number of Hits</th>
            <th>% of total</th>
        </tr>
        <?php createTableRows($browsersHitsResults) ?>
      </table>
      <select id="bSelection" name="browserName" onchange="createBrowserBox(browserStats)" >
        <?php createBrowserOptionList($browsersHitsResults); ?>
      </select>
      <p id="browserBox"></p>
      <select id="cSelection" name="continent" onchange="createContinentBox(continentStats)" >
          <?php createContinentOptionList($continentVisitsResults); ?>
      </select>
      <table id="continentBox" class="hide">
          <thead>
            <tr id="selectedContinent"></tr>
            <tr>
                <th>Country</th>
                <th>Visits</th>
            </tr>
          </thead>
          <tbody></tbody>
      </table>
    </div>
      <?php include 'helpers/visits-footer.inc.php'; ?>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="javaScript/materialize.js"></script>
      <script type="text/javascript" src="javaScript/card2.js"></script>
      <script type="text/javascript" src="javaScript/card3.js"></script>
   </body>
</html>
