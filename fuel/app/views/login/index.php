<h2>帐号管理</h2><div style="float:right"><?php echo Html::anchor('login/create', '新增', array('class' => 'btn btn-success')); ?>
</div>
<br>
<?php if ($logins): ?>
<table class="table table-striped">
	<thead>
		<tr>
            <th>No.</th>
			<th>账户</th>
			<th>用户</th>
			<th>创建时间</th>
			<th>最近登录时间</th>
			<th>最近登录IP</th>
			<th>连续出错次数</th>
            <th>状态</th>
            <th>锁定</th>
            <th>解锁</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($logins as $item): ?>		<tr>
            <td><?php echo $item->id; ?></td>
			<td><?php echo $item->username; ?></td>
			<td><?php echo isset($users[$item->userid]) ? $users[$item->userid] : ''; ?></td>
			<td><?php echo $item->createtime; ?></td>
			<td><?php echo ($item->last_login == null ? '' : date('Y-m-d H:i:s', $item->last_login)); ?></td>
			<td><?php echo $item->email; ?></td>
			<td><?php echo $item->errorloggedtime; ?></td>
            <td><?php echo ($item->status == 0 ? '正常' : '锁定'); ?></td>
            <td><?php echo Html::anchor('login/lock/'.$item->id, '<i class="icon-eye-open"></i> 锁定', array('class' => 'btn btn-small', 'onclick' => "return confirm('确认锁定吗?')")); ?></td>
            <td><?php echo Html::anchor('login/unlock/'.$item->id, '<i class="icon-eye-open"></i> 解锁', array('class' => 'btn btn-small', 'onclick' => "return confirm('确认解锁吗?')")); ?>		</td>
 	</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Logins.</p>

<?php endif; ?>
