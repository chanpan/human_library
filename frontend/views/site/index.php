<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
$this->title = Yii::$app->name;
$url = isset(\Yii::$app->params['storageUrl']) ? \Yii::$app->params['storageUrl'] : '';
?>

<div class="row">
    
    <div class="">
        <div class="row">
            <div class="col-md-8"><?php echo $this->render('_slider')?></div>
            <div class="col-md-4">
                <?php if($news):?>
                    <?php foreach($news as $k=>$n):?>
                        <?php 
                            if ($n->photo) {
                                $url = isset(\Yii::$app->params['storageUrl']) ? \Yii::$app->params['storageUrl'] : '';
                                 
                            }
                        ?>
                        <div style="display:block;height:158px;" class="col-md-6 col-xs-6 ">
                            <a href="<?= Url::to(["/site/news-detail?id={$n->id}"]) ?>" rel="nofollow">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="text-center">
                                            <img src="<?= "{$url}/files/{$n->photo}"; ?>" class="img-thumbnail" style=" border-radius:5px;    height: 100px;    width: 100%;" >
                                        </div>
                                        <div style="    text-align: center;
    font-size: 14px;
    height: 40px;
    color: #000;
    overflow: hidden;
    word-wrap: break-word;
    text-overflow: ellipsis;
    white-space: nowrap;">
                                            <span> <?= isset($n->title)?$n->title:'ไม่ได้ตั้งชื่อ'; ?> </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div style="margin-bottom:14px"></div>
                        </div>
                    <?php endforeach; ?>
                <?php endif;?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-info">
                    <div class='panel-heading'><img src="/img/event.png" style="width: 25px;"> กิจกรรม</div>
                    <div class="panel-body">
                        <?php if ($model): ?>
                            <?php foreach ($event as $k => $v): ?> 
                                <?php 
                                    $title = isset($v['title'])?$v['title']:'';
                                    $user_id = isset($v->create_at)?$v->create_at:'';
                                    $userName = backend\classes\CNUser::get_fullname_by_user_id($user_id);
                                    $date = isset($v->create_date) ? appxq\sdii\utils\SDdate::mysql2phpThDate($v->create_date) : '';
                                    $renderTime = renderTime($v);

                                ?>

                                <div class="col-md-6">
                                    <a href="<?= Url::to(["/site/event-detail?id={$v->id}"]) ?>">
                                        <div class="col-md-3 col-sm-3 col-xs-12"> 
                                                        <img src="<?= "{$url}/files/{$v->file}"; ?>" class="img-thumbnail">
                                                    </div> 
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <div style="font-size:12px;color:#000000"> <?= "เรื่อง : {$title}"; ?> </div> 
                                                        <div style="font-size:12px;color:#e74c3c"><i class="glyphicon glyphicon-user"></i> <?= "ชื่อผู้บรรยาย {$userName}"; ?> </div> 
                                                        <div style="font-size:12px;color:#000000"><i class="glyphicon glyphicon-calendar"></i> <?= "วันที่จัดการการบรรยาย {$date} {$renderTime}"; ?> </div>
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
                <div class="panl panel-info">
                    <div class="panel-heading"><img src="/img/news.png" style="width: 25px;"> ข่าวประกาศ</div>
                    <div class="panel-body">
                        <?php if ($news2): ?>
                            <?php foreach ($news2 as $k => $v): ?>
                                 <?php 
                                    $title = isset($v['title'])?$v['title']:'';
                                    $user_id = isset($v->create_by)?$v->create_by:'';
                                    $userName = backend\classes\CNUser::get_fullname_by_user_id($user_id);
                                    $date = isset($v->create_date) ? appxq\sdii\utils\SDdate::mysql2phpDate($v->create_date) : '';

                                ?>
                                <div class="col-md-12">
                                    <a href="<?= Url::to(["/site/news-detail?id={$v->id}"]) ?>">
                                        <div class="col-md-3 col-sm-3 col-xs-12"> 
                                                        <img src="<?= "{$url}/files/{$v->photo}"; ?>" class="img-thumbnail">
                                                    </div> 
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <div style="font-size:12px;color:#000000"> <?= "เรื่อง : {$title}"; ?> </div> 
                                                        <div style="font-size:12px;color:#e74c3c"><i class="glyphicon glyphicon-user"></i> <?= "ชื่อผู้บรรยาย {$userName}"; ?> </div> 
                                                        <div style="font-size:12px;color:#000000"><i class="glyphicon glyphicon-calendar"></i> <?= "วันที่ประกาศ {$date}"; ?> </div>
                                                    </div> 
                                    </a>
                                    
                                </div>
                                <div class="clearfix" style="    margin-bottom: 10px;border-bottom: 1px solid whitesmoke;padding-bottom: 10px;"></div>
                            <?php endforeach; ?>
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
