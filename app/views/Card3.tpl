<!-- begin Card3.tpl -->

<script>
    var continentData = <?php echo json_encode($continentData); ?>;
</script>
<div class="input-field col s12">
    <div class="select-wrapper">
    <select id="cSelection" name="continent" class="initialized" style="display:inline;">
        <option value="" disabled selected>Select a Continent</option>
        <?php foreach($continents as $continent): ?>
            <option value="<?=$continent['continentName']?>"><?= $continent['continentName'] ?></option>
        <?php endforeach;?>
    </select>
    </div>
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

<script type="text/javascript" src="<?= $themedir ?>/js/card3.js"></script>

<!-- end Card3.tpl -->