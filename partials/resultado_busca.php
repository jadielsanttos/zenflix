<a class="link-item-listagem" href="filme.php?f=<?=base64_encode($item['titulo']);?>">
    <div class="resultado-busca-item" style="background-image: url('<?=$item['dir_foto']?>'); background-size: cover; background-position: center;">
        <div class="area-info">
            <h3><?=$item['titulo'];?></h3>
            <span><?=number_format($item['media'], 1);?> <i class="fa-solid fa-star"></i></span>
        </div>
    </div>
</a>
