<?php
$choose = get_field('choose_overview');
$posts_per_page = 9;
$today = date('Ymd');
if ($choose) :
    $args = array(
        'post_type' => $choose,
        'posts_per_page' => $posts_per_page,
        'order' => 'ASC',
        'meta_query' => array(
            array(
                'key' => 'date',
                'compare' => '>=',
                'value' => $today,
            )
        ),
        'meta_key' => 'date',
        'orderby' => 'meta_value',
    );

    $query = new WP_Query($args);
    $items = $query->posts;

    if ($items) : ?>
        <section class="overview with-margin">
            <div class="wrapper">
                <div class="overview-items ajax-container">
                    <?php foreach ($items as $item) : ?>
                        <?php get_template_part('includes/overview-item', $choose, ['item' => $item]) ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php get_template_part('includes/overview-more', null, [
                'query' => $query,
                'post_type' => $choose,
                'posts_per_page' => $posts_per_page
            ]) ?>
        </section>
    <?php endif;
endif;