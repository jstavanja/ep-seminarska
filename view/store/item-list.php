

<div class="featured-items container is-fluid has-text-centered">
    <?php $i = 0; ?>
    <?php foreach ($items as $item): ?>
        <?php if ($i % 4 == 0): ?>
        <div class="columns">
        <?php endif ?>
            <div class="column is-one-quarter">
                <a href="<?= BASE_URL . "item/" . $item["id"] ?>">
                    <div class="card">
                        <div class="card-image">
                            <figure class="image is-4by3">
                                <img src="<?php echo IMAGES_URL . "majca.jpg"?>" alt="Placeholder image">
                            </figure>
                        </div>
                        <div class="card-content">
                            <div class="media">
                                <div class="media-content">
                                    <p class="title is-4"><?= $item["name"] ?></p>
                                    <p class="subtitle is-6"><?= $item["price"] ?>$</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php if ($i % 4 == 3): ?>
        </div>
        <?php endif ?>
        <?php $i = $i + 1; ?>
    <?php endforeach; ?>
</div>


