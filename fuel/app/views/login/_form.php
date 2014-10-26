<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('用户名称', 'userid', array('class'=>'control-label')); ?>
            <?php echo Form::select('userid', '', array(), array('class' => 'col-md-4 form-control', 'placeholder'=>'Sex'));?>
				<?php echo Form::input('userid', Input::post('userid', isset($login) ? $login->userid : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Userid')); ?>
{users}{1233}
		</div>
		<div class="form-group">
			<?php echo Form::label('帐号名称', 'type', array('class'=>'control-label')); ?>

				<?php echo Form::input('account', Input::post('account', isset($login) ? $login->account : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Account')); ?>

		</div>

		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>