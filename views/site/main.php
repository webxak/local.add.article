<?php if (!empty($articles)): ?>
<?php foreach ($articles as $article): ?>
<div>
    <h2><?php echo $article['title']; ?></h2>
    <p>Дата: <?php echo $article['new_date']; ?>
        / Автор: <?php echo $article['fname'] . ' '. $article['sname']; ?></p>
</div>
<?php endforeach; ?>
<?php endif; ?>