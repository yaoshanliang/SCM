<h2>Viewing <span class='muted'>#<?php echo $operate_record->id; ?></span></h2>

<p>
	<strong>Loginid:</strong>
	<?php echo $operate_record->loginid; ?></p>
<p>
	<strong>Type:</strong>
	<?php echo $operate_record->type; ?></p>
<p>
	<strong>Param:</strong>
	<?php echo $operate_record->param; ?></p>
<p>
	<strong>Time:</strong>
	<?php echo $operate_record->time; ?></p>

<?php echo Html::anchor('operate/record/edit/'.$operate_record->id, 'Edit'); ?> |
<?php echo Html::anchor('operate/record', 'Back'); ?>