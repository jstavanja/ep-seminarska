<ul>

    <?php foreach ($items as $item): ?>
        <li><a href="<?= BASE_URL . "items?id=" . $item["id"] ?>"><?= $item["brand"] ?>: 
        	<?= $item["name"] ?> (<?= $item["price"] ?>)</a></li>
    <?php endforeach; ?>

</ul>
