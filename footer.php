    <footer>
        <div class="footer-content">
            <div class="wrapper">
                <div>
                    <a class="header-logo" href="/"><?= svg('logo'); ?></a>
                </div>
                <?php
                    $adress_title = get_field('adress_title', 'option');
                    $adress = get_field('adress', 'option');
                    if($adress) : ?>
                    <div>
                        <div class="text-container">
                            <?= ($adress_title ? '<h3>'. $adress_title .'</h3>' : ''); ?>
                            <?= $adress; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if(have_rows('menus', 'option')) : ?>
                    <?php while(have_rows('menus', 'option')) : the_row();
                        $menu_title = get_sub_field('menu_title');
                        ?>
                        <div>
                            <?= ($menu_title ? '<h3>'. $menu_title .'</h3>' : ''); ?>
                            <?php if(have_rows('menu_items')) : ?>
                            <ul>
                                <?php while(have_rows('menu_items')) : the_row();
                                    $menu_link = get_sub_field('menu_link');
                                    ?>
                                <li><a href="<?= $menu_link['url'] ?>" target="<?= $menu_link['target'] ?>"><?= $menu_link['title'] ?></a></li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="footer-copyright">
            <div class="wrapper">
                <p>&copy; <?= date('Y'); ?> | <?= get_bloginfo('name'); ?></p>
            </div>
        </div>
    </footer>

    </div><?php // #content-container ?>
    </div><?php // #site-container ?>
    <?php wp_footer(); ?>
</body>
</html>