
<div class="input-field col s12">
    <div class="select-wrapper">
    <select class="initialized" style="display:inline;">
        <option value="" diabled selected>Select a Continent</option>
        <?php foreach($continents as $continent): ?>
            <option value="<?=$continent['ContinentName']?>"><?= $continent['ContinentName'] ?></option>
        <?php endforeach;?>
    </select>
    </div>
</div>


<table id="continentBox" class="hide">
    <thead>
    <tr id="selectedContinent"></tr>
    <tr>
        <th>Country</th>
        <th>Visits</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
</table>
