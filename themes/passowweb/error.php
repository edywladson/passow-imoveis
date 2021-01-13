<?php $v->layout("_theme"); ?>

<section class="not_found">
    <div class="container content">
        <div class="not_found_header">
            <p class="error"><?= $error->code; ?></p>
            <h1><?= $error->title; ?></h1>
            <p><?= $error->message; ?></p>
            <?php if ($error->link): ?>
                <a href="<?= $error->link; ?>" title="<?= $error->linkTitle; ?>" class="btn btn-primary btn-lg"><?= $error->linkTitle; ?></a>
            <?php endif; ?>

        </div>
    </div>
</section>