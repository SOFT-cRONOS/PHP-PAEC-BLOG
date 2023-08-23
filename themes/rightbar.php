<h1>Ultimos post <?php echo $categoria ?></h1>
<ul>
<?php foreach ($posts as $post): ?>
<li>
<h2>
<a href="post.php?id=<?php echo $post['id'] ?>">
    <div class="row">
    <?php echo $post['title'] ?>
    </div>
    <div class="row">
    <div class="col">
        <img src="<?php echo $post['image_url'] ?>" class="img-fluid" alt="">
        <p><?php echo $post['sinopsis'] ?></p>
    </div>
    </div>

</a>
<h2>

</li>
<?php endforeach; ?>