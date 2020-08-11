<?//require_once('errors.php');?>  

<? require_once('conf_global.php');?>  
<? require_once('components/header/index.php');?>  


<div>Ваша корзина</div>
<div>Товары резервируються на ограниченное время</div>

<hr>

<div>АДРЕС ДОСТАВКИ</div>
<div>Все поля обязательны для заполнения</div>
<div class='basketForm'>
    <form action="#">
        <div class='basketInput1'><input type="text"placeholder="Курьерская служба - 500 руб."></div> 

        <div class='basketText1'>
            <div>Имя</div>
            <div>Фамилия</div>
        </div>

        <div class='basketInput2'>
            <div><input type="text"></div> 
            <div><input type="text"></div> 
        </div>

        <div class='basketText1'>Адрес</div>

        <div class='basketInput1'><input type="text"></div> 
            
        <div class='basketText1'>
            <div>Город</div>
            <div>Индекс</div>
        </div>

        <div class='basketInput2'>
            <div><input type="text"></div> 
            <div><input type="text"></div> 
        </div>
        
        <div class='basketText1'>
            <div>Телефон</div>
            <div>E-mail</div>
        </div>

        <div class='basketInput2'>
            <div><input type="text"></div> 
            <div><input type="text"></div> 
        </div>
        
    </form>

</div>


<?
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
include_once('components/dbconnect/index.php');

session_start();
$items = $_SESSION['basket'];

$str = implode(',',$items);

//делаем запрос к БД (прокидываем запрос) и сохраняем в переменной
$result = mysqli_query($link,"SELECT * FROM core_goods WHERE id IN($str)");

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
		<div>
			<a href="<?=PROJECT_URL?>system/controllers/basket/from_basket.php?id=<?=$item['id']?>">     
                x
            </a>
		</div>  
    </div>
<? } ?>




<? require_once('components/footer/index.php');?>
