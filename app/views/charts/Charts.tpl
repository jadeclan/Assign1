<div>
    <div class="row hide-on-med-and-up">
        <div class="col s12">
            <h2 class="center-align">Charts</h2>
        </div>
    </div>

    <div class="row">
        <div class="col s12">
            <?= $c->Render("chart1") ?>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m6">
            <?= $c->Render("chart2") ?>
        </div>
        <div class="col s12 m6">
            <?= $c->Render("chart3") ?>
        </div>
    </div>
</div><!-- /.container -->