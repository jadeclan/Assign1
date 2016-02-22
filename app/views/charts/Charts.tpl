
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>

<script>
    $(function () {
        google.charts.load("current", {packages:['corechart', 'bar']});
    });
</script>

<div>
    <div class="row hide-on-med-and-up">
        <div class="col s12">
            <h3 class="center-align">Charts</h3>
        </div>
    </div>

    <div class="row">
        <div class="col s12 m6">
            <?= $c->Render("chart1") ?>
        </div>
        <div class="col s12 m6">
            <?= $c->Render("chart3") ?>
        </div>
    </div>
    <div class="row">
        <div class="col s12">
            <?= $c->Render("chart2") ?>
        </div>
    </div>
</div>
