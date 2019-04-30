<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
$this->title = Yii::$app->name;
$url = isset(\Yii::$app->params['storageUrl']) ? \Yii::$app->params['storageUrl'] : '';
?>

<div class="row">
    
    <div class="col-md-8 col-md-offset-2">
        <?php echo $this->render('_slider')?>
        <?php yii\widgets\ActiveForm::begin(['method'=>'get']);?>
            <div class="input-group"> 
                <input class="form-control" name="search" placeholder="ค้นหาการบรรยายได้"> 
                <div class="input-group-btn"> 
                    <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> ค้นหา</button> 
                </div> 
            </div> 
        <?php yii\widgets\ActiveForm::end();?>

        <?php if ($model): ?>
            <?php foreach ($model as $k => $v): ?>
                <?php if ($k % 2 == 0): ?>
                    <div class="media view-book" data-url="<?= Url::to(["/site/view?id={$v->id}"])?>"> 
                        <div class="media-left"> 
				 <?= renderImage($v); ?>
                        </div> 
			 <div class='media-body'><?= renderMediaBody($v); ?></div>
                    </div>
                    <hr/>
                <?php else: ?>
                    <div class="media view-book" data-url="<?= Url::to(["/site/view?id={$v->id}"])?>"> 
			<div class='media-body'><?= renderMediaBody($v); ?></div>
                        <div class="media-right"> 
				<?= renderImage($v); ?>
                        </div> 
                    </div>
                    <hr/>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php else: ?>
		<h3 class='alert alert-info'>ไม่พบข้อมูล</h3>
        <?php endif; ?>

    </div>
</div>
<?php 
	function renderImage($v){
          $url = isset(\Yii::$app->params['storageUrl']) ? \Yii::$app->params['storageUrl'] : '';
	  return  "
		 <a href='#'>
                      <img alt='64x64' class='media-object img-circle' src='{$url}/files/{$v->user_image}' style='width: 100px; height: 100px;border: 3px solid #009688;'>
                 </a>
	  ";
	}
	function renderMediaBody($v){
	   $title = isset($v['title'])?$v['title']:'';
	   $userName = isset($v->user_name)?$v->user_name:'';
	   $date = isset($v->date) ? appxq\sdii\utils\SDdate::mysql2phpThDate($v->date) : '';
	   $renderTime = renderTime($v);
	   $html = "
		<h3 class='media-heading'>{$title}</h3>
		<h4 style='margin-top: 3px;'> เรื่อง : {$title} </h4>
                <h4 style='margin-top: 3px;'>ชื่อผู้บรรยาย {$userName}</h4>
                <h4 style='margin-top: 3px;'>เวลาจัดการการบรรยาย {$date} {$renderTime}
                </h4>

    	   ";
	   return $html;
	
	}
	function renderTime($v){
 	  $time_start = isset($v['time_start'])?$v['time_start']:'';
	  return "เวลา {$time_start}";
       }
?>

<?php richardfan\widget\JSRegister::begin();?>
<script>
   $('.view-book').on('click', function(){
       let url = $(this).attr('data-url');
       location.href = url;
       return false; 
   });
</script>
<?php richardfan\widget\JSRegister::end();?>

<?php \appxq\sdii\widgets\CSSRegister::begin();?>
<style>
    
    .media{
        background: #f3f3f3;
    padding: 5px;
    border-radius: 5px;
    }
</style>
<?php \appxq\sdii\widgets\CSSRegister::end();?>
