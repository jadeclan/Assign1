<div>
    <div class="row">
        <div class="col s12">
            <h2 class="center-align">Dashboard 2</h2>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m6">
            <div class="row">
                <div class="col s12">
                    <?= $c->Render("card1") ?>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <?= $c->Render("card2") ?>
                </div>
            </div>
        </div> <!-- /.col -->
        <div class="col s12 m6">
            <?= $c->Render("card3") ?>
        </div>
    </div><!-- /.row -->

</div><!-- /.container -->