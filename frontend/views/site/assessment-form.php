<?php 
    $this->title = 'แบบประเมินผลออนไลน์การเข้าร่วมกิจกรรม';
?>
<h3><?= $this->title; ?></h3>
<?php if ($id != ''): ?>
    <a class="btn btn-default" href="/site/assessment-form"><i class="glyphicon glyphicon-arrow-left"></i> ย้อนกลับ</a>
    <br/><br/>
    <?= $model->detail; ?>
<?php else: ?>
    <?php foreach ($model as $k => $v): ?>
        <div>
            <a href="/site/assessment-form?id=<?= $v['id'] ?>"> <?= $v->title; ?></a>
        </div>
    <?php endforeach; ?>
<?php endif; ?>