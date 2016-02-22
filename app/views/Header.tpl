<header>
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper">
                <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
                <a href="<?= $brandLink ?>" class="brand-logo">POW-B Analytics</a>
                <div class="center-align hide-on-med-and-down">
                    <span id="page-title"><?= $title ?></span>
                </div>
            </div>
        </nav>
    </div>
    <ul id="nav-mobile" class="side-nav fixed">
        <?php foreach($nav as $label => $link): ?>
        <?php if($active == $link){ ?>
        <li class="active"><a href="<?= $link ?>"><?= $label ?></a></li>
        <?php }else{ ?>
        <li><a href="<?= $link ?>"><?= $label ?></a></li>
        <?php } ?>
        <?php endforeach; ?>
    </ul>
</header>
<!--this is added for the mobile nav bar-->
<script>
    $( document ).ready(function(){
        $(".button-collapse").sideNav({
            menuWidth: 190
        });
    });
</script>