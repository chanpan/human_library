<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
$this->title = Yii::$app->name;
$url = isset(\Yii::$app->params['storageUrl']) ? \Yii::$app->params['storageUrl'] : '';
?>

<div class="row">
    
    <div class="">
        <?php echo $this->render('_slider')?>
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-info">
                    <div class='panel-heading'><img src="/img/event.png" style="width: 25px;"> กิจกรรม</div>
                    <div class="panel-body">
                        <?php if ($model): ?>
                            <?php foreach ($event as $k => $v): ?>
                                <?php 
                                    $title = isset($v['title'])?$v['title']:'';
                                    $userName = isset($v->user_name)?$v->user_name:'';
                                    $date = isset($v->date) ? appxq\sdii\utils\SDdate::mysql2phpThDate($v->date) : '';
                                    $renderTime = renderTime($v);
                                ?>
                                <div class="col-md-3">
                                    <a href="<?= Url::to(["/site/event-detail?id={$v->id}"]) ?>">
                                        <div class="text-center">
                                           <img src="<?= "{$url}/files/{$v->file}"; ?>" class="img-thumbnail img-card" style=" border-radius:5px;">
                                        </div>
                                        <div style="text-align:center;font-size:14px ">
                                            <div style="font-size:12px;color:#000000"> <?= "{$title}"; ?> </div> 
                                        </div>          
                                    </a>
                                    <div style="margin-bottom:14px"></div>
                                </div>
                        
                                
                                 
                        
                            <?php endforeach; ?>
                        <?php else: ?>
                            <h3 class='alert alert-info'>ไม่พบข้อมูล</h3>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-info">
                    <div class='panel-heading'>การบรรยาย</div>
                    <div class="panel-body">
                        <?php if ($model): ?>
                            <?php foreach ($model as $k => $v): ?>
                                <?php 
                                    $title = isset($v['title'])?$v['title']:'';
                                    $userName = isset($v->user_name)?$v->user_name:'';
                                    $date = isset($v->date) ? appxq\sdii\utils\SDdate::mysql2phpThDate($v->date) : '';
                                    $renderTime = renderTime($v);
                                ?>
                                <div class="row" style="border-bottom: solid 1px #f0f0f0;padding: 2px;">
                                        <a href="<?= Url::to(["/site/view?id={$v->id}"]) ?>">
                                                    <div class="col-sm-3"> 
                                                        <img src="<?= "{$url}/files/{$v->user_image}"; ?>" class="img-thumbnail">
                                                    </div> 
                                                    <div class="col-sm-9">
                                                        <div style="font-size:12px;color:#000000"> <?= "เรื่อง : {$title}"; ?> </div> 
                                                        <div style="font-size:12px;color:#e74c3c"> <?= "ชื่อผู้บรรยาย {$userName}"; ?> </div> 
                                                        <div style="font-size:12px;color:#000000"> <?= "เรื่อง : {$title}"; ?> </div>
                                                        <div style="font-size:12px;color:#000000"> <?= "เวลาจัดการการบรรยาย {$date} {$renderTime}"; ?> </div>
                                                    </div>
                                        </a>   
                                     
                                </div>
                        
                            <?php endforeach; ?>
                        <?php else: ?>
                            <h3 class='alert alert-info'>ไม่พบข้อมูล</h3>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
             
        </div> 

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
