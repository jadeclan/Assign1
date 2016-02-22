<!-- begin Card3.tpl -->

<script>
    var continentData = <?php echo json_encode($continentData); ?>;
</script>


<div class="card z-depth-1-half" id="card3">
    <div class="card-content hoverable">
        <span class="card-title">Country Statistics</span>
        <div class="input-field">
            <select id="cSelection" name="continent" class="initialized">
                <option value="" disabled selected>Select a Continent</option>
                <?php foreach($continents as $continent): ?>
                <option value="<?=$continent['continentName']?>"><?= $continent['continentName'] ?></option>
                <?php endforeach;?>
            </select>
        </div>

        <div id="card3Scroll">
            <table id="continentBox" class="hide">
                <thead>
                <tr id="selectedContinent">
                    <th>Country</th>
                    <th>Visits</th>
                </tr>
                </thead>
                <tbody id="contBody">
                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?= $themedir ?>/js/card3.js"></script>
<!-- end Card3.tpl -->
<script>
    $(function(){
        $('#cSelection').material_select();
    });
</script>