<!-- begin Card1.tpl -->

<div class="row">
    <div class="col12 m6">
        <div class="card z-depth-1-half" id="card1">
            <div class="card-content hoverable">
                <span class="card-title">Browser Statistics</span>
                <table class="striped">
                    <thead>
                        <tr>
                            <th>Browser Name</th>
                            <th>Number of Hits</th>
                            <th>% of total</th>
                        </tr>
                    </thead>
                    <tbody id="card1Content">
                    <?php foreach($browsers as $browser): ?>
                        <tr>
                            <td><?= $browser['name'] ?></td>
                            <td><?= $browser['hits'] ?></td>
                            <td><?= $browser['percentage']?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>

<!-- end Card1.tpl -->