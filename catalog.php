<?php //require_once('errors.php'); ?>


<?php require_once('conf_global.php');?> 
<?php require_once('system/classes/autoload.php');?> 
<?php include_once('components/dbconnect/index.php');?>
<?php require_once('components/header/index.php');?>  



<?php

$lib_user= new \Lib\User();
$lib_user->getWord();

$filter_str='';
if($category_id=$_GET['category_id']){
    $filter_str="WHERE category_id=$category_id";
}

$category_id=$_GET['category_id'];

//делаем запрос к БД (прокидываем запрос) и сохраняем в переменной
$result = mysqli_query($link,"SELECT * FROM core_goods $filter_str");

while($item = mysqli_fetch_assoc($result)){?> 
<? $good=new  \Nordic\Good($item['id'])   ?>

    <div class="item">
        <div>
            <img src="<?=$good->getField('photo');?>" />
        </div>
        <div>
            <a href="<?=PROJECT_URL?>card.php?id=<?=$item['id']?>">     
                <?= $good->getField('title');  ?>
            </a>    
        </div>
        <div><?= $good->getField('price');  ?></div>
    </div>
<?php } ?>

<?php require_once('components/footer/index.php');?>
