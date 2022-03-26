<p>Parte grafica do site</p>

<h3>Meus videos </h3>

<?php
    foreach( $videos as $video ):
?>
<div class="video">
    <a href="<?php echo BASE_URL;?>/video/ver/<?php echo $video['id_video'];?>"> 
        <strong><?php echo $video['titulo'];?></strong>
    </a>
</div>
<?php endforeach; ?>