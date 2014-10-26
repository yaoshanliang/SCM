<h2>新增登录帐号</h2>
<br>

<?php echo Form::open(array("class"=>"form-horizontal")); ?>

<fieldset>
    <div class="form-group">
        <?php echo Form::label('用户名称', 'userid', array('class'=>'control-label')); ?>
        <?php echo Form::select('userid',  Input::post('userid', isset($login) ? $login->userid : ''), $users, array('class' => 'col-md-4 form-control', 'placeholder'=>'Userid'));?>
   </div>
    <div class="form-group">
        <?php echo Form::label('帐号名称', 'username', array('class'=>'control-label')); ?>

        <?php echo Form::input('username', Input::post('', isset($login) ? $login->username : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Account')); ?>

    </div>
    <div class="form-group">
        <?php echo Form::label('密码', 'password', array('class'=>'control-label')); ?>

        <?php echo Form::password('password', '', array('class' => 'col-md-4 form-control', 'placeholder'=>'Password')); ?>

    </div>
    <div class="form-group">
        <label class='control-label'>&nbsp;</label>
        <?php echo Form::submit('submit', '保存', array('class' => 'btn btn-primary')); ?>		</div>
</fieldset>
<?php echo Form::close(); ?>

<p><?php echo Html::anchor('login', 'Back'); ?></p>
