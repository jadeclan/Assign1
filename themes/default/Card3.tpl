<select id="cSelection" name="continent" onchange="createContinentBox(continentStats)" >
    <?php //createContinentOptionList($continentVisitsResults); ?>
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