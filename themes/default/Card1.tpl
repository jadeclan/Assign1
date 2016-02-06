<!-- HTML used to create the Card1 Table view -->
<div class="row">
    <div class="col12 m6">
        <div class="card z-depth-1-half" id="card1">
            <div class="card-content hoverable">
                <span class="card-title">Browser Statistics</span>
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
                        <td><?= $browser['hits'] ?></td>
                        <td><?= $browser['percentage'] ?></td>
                    </tr>

                    <?php endforeach; ?>

                </table>
            </div>
        </div>
    </div>
</div>
