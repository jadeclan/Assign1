<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $title ?></title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="#">

    <!-- Material Icons -->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Materialize -->
    <link type="text/css" rel="stylesheet" href="<?= $themedir ?>/assets/materialize/css/materialize.css"/>

    <!-- Custom styles -->
    <link type="text/css" rel="stylesheet" href="<?= $themedir ?>/css/style.css"/>

    <!--<script type="text/javascript" src="<?= $themedir ?>/assets/jquery-2.2.0.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script type="text/javascript" src="<?= $themedir ?>/assets/materialize/js/materialize.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
</head>
<body>
<?= $c->Render("header"); ?>
<main>
    <div>
        <div class="row">
            <div class="col offset-m1 s12 m11">
                <?= $c->Render("content"); ?>
            </div>
        </div>
    </div>
</main>

<?= $c->Render("footer"); ?>

</body>
</html>
