<div id="slider">
    <div class="banner">
        <ul>
            <?php foreach($slides as $slide): ?>
            <li style="background-image: url(<?= $slide->src ?>); background-size: 100%; background-repeat: no-repeat">
                <a href="<?= $slide->url ?>"></a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>