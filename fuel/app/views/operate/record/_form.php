<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Loginid', 'loginid', array('class'=>'control-label')); ?>

				<?php echo Form::input('loginid', Input::post('loginid', isset($operate_record) ? $operate_record->loginid : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Loginid')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Type', 'type', array('class'=>'control-label')); ?>

				<?php echo Form::input('type', Input::post('type', isset($operate_record) ? $operate_record->type : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Type')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Param', 'param', array('class'=>'control-label')); ?>

				<?php echo Form::input('param', Input::post('param', isset($operate_record) ? $operate_record->param : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Param')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Time', 'time', array('class'=>'control-label')); ?>

				<?php echo Form::input('time', Input::post('time', isset($operate_record) ? $operate_record->time : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Time')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>