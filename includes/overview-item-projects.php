<?php
global $post;
$item = $args['item'] ?? $post;
?>

<a href="<?= get_the_permalink($item); ?>" class="overview-item">
    <div class="overview-item-image">
        <?= get_thumbnail_or_fallback('medium_large', '', $item); ?>
    </div>
    <div class="overview-item-text">
<<<<<<< HEAD
        <p><?=get_field('date', $item)?></p>
=======
>>>>>>> b0efa286e0d088018486fe025f782af35396f090
        <h3><?= get_the_title($item); ?></h3>
        <span class="btn">Bekijk project</span>
    </div>
</a>