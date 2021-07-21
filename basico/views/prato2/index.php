<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use app\models\Prato;
?>

<h1>Pratos</h1>
<ul>
<?php foreach ($pratos as $prato): ?>
    <li>
        <h4><?=$prato->id_prato?> (<?=$prato->nome?>)</h4>
        <h5><?= $prato-> precovenda?>€</h4>
        <p><img src="<?php echo $prato-> image?>" style="height:150px;width:266px;"></p>
    </li>
<?php endforeach; ?>
</ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>
