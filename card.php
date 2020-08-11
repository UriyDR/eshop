

<? require_once('conf_global.php');?>  


<? require_once('components/header/index.php');?>

<?



$id = $_GET['id'];

include_once('components/dbconnect/index.php');

//делаем запрос к БД (прокидываем запрос) и сохраняем в переменной
$result = mysqli_query($link,"SELECT * FROM core_goods WHERE id=$id ");  


while($item = mysqli_fetch_assoc($result)){?>   
    <div class="item">
        <div>
            <img src="<?=$item['photo']?>" />
        </div>
        <div>
            <a href="card.php?id=<?=$item['id']?>">     
                <?= $item['title']  ?>
            </a>    
        </div>
        <div><?= $item['price']  ?></div>
        <div><?= $item['articul']  ?></div>
        <div><?= $item['description']  ?></div>  
		<div>
			<a href="<?=PROJECT_URL?>system/controllers/basket/to_basket.php?id=<?=$item['id']?>">     
                В корзину
            </a> 
		</div>	
    </div>
<? } ?>


<?php require_once('components/footer/index.php');?>

