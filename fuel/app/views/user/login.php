<?php echo Form::open(array("class"=>"form-horizontal")); ?>

    <fieldset>
        <div class="form-group">
            <?php echo Form::label('用户名', 'username', array('class'=>'control-label')); ?>
            <?php echo Form::input('username', Input::post('username', isset($user) ? $user->username : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Name')); ?>
        </div>

        <div class="form-group">
            <?php echo Form::label('密码', 'password', array('class'=>'control-label')); ?>

            <?php echo Form::password('password', '', array('class' => 'col-md-4 form-control', 'placeholder'=>'Password')); ?>

        </div>

        <div class="form-group">
            <label class='control-label'>&nbsp;</label>
            <?php echo Form::submit('submit', '登录', array('class' => 'btn btn-primary')); ?>		</div>
    </fieldset>
<?php echo Form::close(); ?>