<h2>Editing <span class='muted'>Operate_record</span></h2>
<br>

<?php echo render('operate/record/_form'); ?>
<p>
	<?php echo Html::anchor('operate/record/view/'.$operate_record->id, 'View'); ?> |
	<?php echo Html::anchor('operate/record', 'Back'); ?></p>
