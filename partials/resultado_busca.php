<div class="resultado-busca-item">
    <img src="assets/images/img-default.jpg" alt="">
    <h3><?=$item['titulo'];?></h3>
    <a href="voto.php?id=<?=$item['id'];?>&voto=1"><i class="fa-solid fa-star"></i></a>
    <a href="voto.php?id=<?=$item['id'];?>&voto=2"><i class="fa-solid fa-star"></i></a>
    <a href="voto.php?id=<?=$item['id'];?>&voto=3"><i class="fa-solid fa-star"></i></a>
    <a href="voto.php?id=<?=$item['id'];?>&voto=4"><i class="fa-solid fa-star"></i></a>
    <a href="voto.php?id=<?=$item['id'];?>&voto=5"><i class="fa-solid fa-star"></i></a>
    <span>(<?=number_format($item['media'], 2);?>)</span>
</div>
