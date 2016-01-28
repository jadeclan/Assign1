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
         <div class="row">
            <?php include 'helpers/visits-header.inc.php'; ?>
            <div class="col s5"><!-- start of Card 1 and 2-->
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
            </div><!-- End of Card 1 and 2 -->
            <div class="col s7"><!-- Start of Card 3-->
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
              </div><!-- End of Card 3 -->
         </div><!-- End of Cards -->
         <div class="row">
                <?php include 'helpers/visits-footer.inc.php'; ?>
            </div><!-- End of Footer -->
      </div><!-- End of Container -->
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="javaScript/materialize.js"></script>
      <script type="text/javascript" src="javaScript/card2.js"></script>
      <script type="text/javascript" src="javaScript/card3.js"></script>
   </body>
</html>
