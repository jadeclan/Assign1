<header>
    <nav>
        <div class="nav-wrapper">
            <a href="#" class="brand-logo">POW-B Analytics</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <?php foreach($nav as $label => $link): ?>

                <li><a href="<?= $link ?>"><?= $label ?></a></li>

                <?php endforeach; ?>
            </ul>
        </div>
    </nav>
</header>