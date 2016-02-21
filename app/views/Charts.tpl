<div>
    <div class="row">
        <div class="col s12">
            <h2 class="center-align">Charts</h2>
        </div>
    </div>

    <div class="row">
        <div class="col s12 m5">
            <div class="row">
                <div class="col s12">
                    <?= $c->Render("chart1") ?>
                </div>
            </div>
        </div> <!-- /.col -->
        <div class="col s12 m7">
            <?= $c->Render("chart2") ?>
        </div>
    </div><!-- /.row -->

    <div class="row">
        <div class="col s8 offset-s2">
            <?= $c->Render("chart3") ?>
        </div>
    </div>

</div><!-- /.container -->