<div class="container">

    <div class="row">
        <div class="col s5">
            <div class="row">
                <div class="col s12">
                    <?= $app->Render("/dashboard/card1") ?>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <?= $app->Render("/dashboard/card2") ?>
                </div>
            </div>
        </div> <!-- /.col -->
        <div class="col s7">
            <?= $app->Render("/dashboard/card3") ?>
        </div>
    </div><!-- /.row -->

</div><!-- /.container -->