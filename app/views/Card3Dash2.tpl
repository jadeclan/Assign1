<!-- begin Card3Dash2.tpl -->

<script>
    var continentData = <?php echo json_encode($continentData); ?>;
</script>


<div class="card z-depth-1-half" id="card3">
    <div class="card-content hoverable">
        <span class="card-title">Country Statistics</span>
        <div class="input-field">
            <select id="cSelection" name="continent" class="initialized" style="display:block;">
                <option value="" disabled selected>Select a Continent</option>
                <option value="ADD VALUE">ADD CONTINENT DROPDOWN</option>
            </select>
        </div>


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
<script type="text/javascript" src="<?= $themedir ?>/js/card3.js"></script>
<!-- end Card3Dash2.tpl -->