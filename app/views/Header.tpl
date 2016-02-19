<ul class="hide-on-med-and-down">
    <?php foreach($nav as $label => $link): ?>

    <li><a href="<?= $link ?>"><?= $label ?></a></li>

    <?php endforeach; ?>
</ul>
<ul id="slide-out" class="side-nav fixed">
    <?php foreach($nav as $label => $link): ?>
    <?php if($active == $link){ ?>
            <li class="active"><a href="<?= $link ?>"><?= $label ?></a></li>
    <?php }else{ ?>
            <li><a href="<?= $link ?>"><?= $label ?></a></li>
    <?php } ?>
    <?php endforeach; ?>
</ul>

<!--this is added for the mobile nav bar-->
<script>
    $( document ).ready(function(){
        $(".button-collapse").sideNav({
            menuWidth: 190
        });
    });
</script>