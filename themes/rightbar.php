<h2>Ultimos post <?php echo $categoria;
$contador = 0; ?></h2>
<ul>
<?php foreach ($posts as $post): 
    if ($contador < 4) {?>
<li>
<h5>
<a href="post.php?id=<?php echo $post['id'] ?>">
    <div class="row">
    <h4><?php echo $post['title'] ?></h4>
    </div>
    <div class="row">
    <div class="col">
        <img src="<?php echo $post['image_url'] ?>" class="img-fluid" alt="">
        <p><?php echo $post['sinopsis'] ?></p>
    </div>
    </div>

</a>
<h5>

</li>
<?php 
        $contador++;
    }
endforeach; ?>