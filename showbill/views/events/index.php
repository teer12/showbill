<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
?>
<!-- Page Header -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Page Heading
            <small>Secondary Text</small>
        </h1>
    </div>
</div>

<?php 
$total = count($events);
$counter = 0;
	foreach ($events as $key => $event):
	//print_r($event->show);exit;
	if($counter == 0 || $counter%3 == 0) echo "<div class='row'>";
?>
    <div class="col-md-4 portfolio-item">
        <a href="#">
        	<?= Html::img("@web/images/events/{$event['image']}", ["alt"=>'img', 'class'=>'event_img img-responsive']);?>
        </a>
        <h3>
            <a href="#"><?php echo $event->show['title']; ?></a>
        </h3>
        <p><?php echo date('d-m-Y', $event['date']); ?></p>
        <a href="<?= Url::to(['place/view','id'=>$event->places['id']]); ?>"><?php echo $event->places['title']; ?></a>
        <p><?php 
			echo \yii\helpers\StringHelper::truncateWords($event->show['desc'], 20, '...');
		?></p>
		<a href="#" class="btn btn-default">More Info</a>
    </div>
<?php 
	if(($counter + 1)%3 == 0 || ($counter + 1) == $total) echo "</div>"; 
	$counter++;
	endforeach;
?>

<!-- Pagination -->
<div class="row text-center">
    <div class="col-lg-12">
<?php
	echo \yii\widgets\LinkPager::widget([
	    'pagination' => $pages,
	]);
?>
	</div>
</div>
