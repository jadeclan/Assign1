<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $title ?></title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="">

    <!-- Material Icons -->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Materialize -->
    <link type="text/css" rel="stylesheet" href="<?= $themedir ?>/assets/materialize/css/materialize.css"/>

    <!-- Custom styles -->
    <link type="text/css" rel="stylesheet" href="<?= $themedir ?>/style.css"/>

</head>
<body>
    <?= $app->{"/header"}; ?>

    <div class="container">

        <div class="row">
            <div class="col s5">
                <div class="row">
                    <div class="col s12">
                        <?= $app->{"/card1"} ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <?= $app->{"/card2"} ?>
                    </div>
                </div>
            </div> <!-- /.col -->
            <div class="col s7">
                <?= $app->{"/card3"} ?>
            </div>
        </div><!-- /.row -->

    </div><!-- /.container -->

    <?= $app->{"/footer"} ?>

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="<?= $themedir ?>/assets/materialize/js/materialize.js"></script>
</body>
</html>
