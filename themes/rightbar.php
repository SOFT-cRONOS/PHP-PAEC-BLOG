
<h2>Novedades <?php 
$posts = getPosts();
$contador = 0; ?></h2>
<ul  style="list-style: none;">
<?php foreach ($posts as $post): 
    if ($contador < 4) {?>
<li>
<h6>
<a href="post.php?id=<?php echo $post['id'] ?>">
    <div class="row">
    <h5><?php echo $post['title'] ?></h5>
    </div>
    <div class="row">
    <div class="col">
        <img src="<?php echo $post['image_url'] ?>" class="img-fluid" alt="">
        <p><?php echo $post['sinopsis'] ?>...</p>
    </div>
    </div>

</a>
<h6>
</li>
<hr class="separator">
<?php 
        $contador++;
    }
endforeach; ?>