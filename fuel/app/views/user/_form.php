<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('姓名', 'name', array('class'=>'control-label')); ?>

				<?php echo Form::input('name', Input::post('name', isset($user) ? $user->name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Name')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('性别', 'sex', array('class'=>'control-label')); ?>
            <?php echo Form::select('sex', Input::post('sex', isset($user) ? $user->sex : 1), array(
            '1' => '男',
            '2' => '女'
            ), array('class' => 'col-md-4 form-control', 'placeholder'=>'Sex'));?>
		</div>
		<div class="form-group">
			<?php echo Form::label('出生日期', 'birthday', array('class'=>'control-label')); ?>

				<?php echo Form::input('birthday', Input::post('birthday', isset($user) ? $user->birthday : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Birthday')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('学历', 'education', array('class'=>'control-label')); ?>
            <?php echo Form::select('education', Input::post('education', isset($user) ? $user->education : '40'), array(
                '0' => '未指定',
                '10' => '初中及以下',
                '20' => '高中及同等学历',
                '30' => '大专',
                '40' => '本科',
                '50' => '硕士',
                '60' => '博士',
                '70' => '博士后及以上'
            ), array('class' => 'col-md-4 form-control', 'placeholder'=>'Education'));?>
		</div>
		<div class="form-group">
			<?php echo Form::label('爱好特长', 'hobbies', array('class'=>'control-label')); ?>
                <?php echo Form::textarea('hobbies', Input::post('hobbies', isset($user) ? $user->hobbies : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Hobbies', 'rows' => 6, 'cols' => 8));?>
		</div>
		<div class="form-group">
			<?php echo Form::label('班级', 'class', array('class'=>'control-label')); ?>
                <?php echo Form::input('class', Input::post('class', isset($user) ? $user->class : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Class'));?>
		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', '保存', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>
