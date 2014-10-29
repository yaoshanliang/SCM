<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<style>
		body { margin: 40px; }
	</style>
</head>
<body>
	<div class="container">
        <?php if(Auth::instance()->get_screen_name() != 'guest'):?>
        <div style="float: right"><h5><?php echo  '当前用户: '.Auth::instance()->get_screen_name(); ?>
    <?php echo Html::anchor('user/logout', '退出', array('class' => 'btn btn-success')); ?></h5> </div>
	<?php echo Html::anchor('user/index', '用户管理', array('class' => 'btn btn-success')); ?>
	<?php echo Html::anchor('login/index', '账号管理', array('class' => 'btn btn-success')); ?>
	<?php echo Html::anchor('operate_record/index', '操作日志', array('class' => 'btn btn-success')); ?>
    <?php echo Html::anchor('user/work', '分工合作', array('class' => 'btn btn-success')); ?>
    <?php echo Html::anchor('user/suggest', '需求建议', array('class' => 'btn btn-success')); ?>
        <?php endif;?>
		<div class="col-md-12">
			<h1><?php echo $title; ?></h1>
			<hr>
<?php if (Session::get_flash('success')): ?>
			<div class="alert alert-success">
				<strong>Success</strong>
				<p>
				<?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
				</p>
			</div>
<?php endif; ?>
<?php if (Session::get_flash('error')): ?>
			<div class="alert alert-danger">
				<strong>Error</strong>
				<p>
				<?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
				</p>
			</div>
<?php endif; ?>
		</div>
		<div class="col-md-12">
<?php echo $content; ?>
		</div>
		<footer>
            <p class="pull-right">Copyright © 2014 Powered by iat. All Rights Reserved</p>
			<!--<p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>
			<p>
				<a href="http://fuelphp.com">FuelPHP</a> is released under the MIT license.<br>
				<small>Version: <?php /*echo e(Fuel::VERSION); */?></small>
			</p>-->
		</footer>
	</div>
</body>
</html>
