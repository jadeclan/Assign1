
<table class="striped">
    <tr>
        <th>Browser ID</th>
        <th>Browser Name</th>
        <th>Number of Hits</th>
        <th>% of total</th>
    </tr>

    <?php foreach($browsers as $browser): ?>

    <tr>
        <td><?= $browser['id'] ?></td>
        <td><?= $browser['name'] ?></td>
        <td><?= $browser['visits'] ?></td>
        <td><?= $browser['percent'] ?></td>
    </tr>

    <?php endforeach; ?>

</table>