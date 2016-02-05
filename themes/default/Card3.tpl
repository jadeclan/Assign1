<select id="cSelection" name="continent" onchange="createContinentBox(continentStats)" >
    <?php //createContinentOptionList($continentVisitsResults); ?>
</select>
<table id="continentBox" class="hide">
    <thead>
    <tr id="selectedContinent">
        <th>Country</th>
        <th>Visits</th>
    </tr>
    </thead>
    <tbody></tbody>
</table>