<h2>操作日志</h2>
<br>
<?php if ($operate_records): ?>
<table class="table table-striped">
	<thead>
		<tr>
            <th>序号</th>
			<th>操作者账户</th>
			<th>操作类型</th>
			<th>操作对象</th>
			<th>操作时间</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($operate_records as $item): ?>		<tr>
            <td><?php echo $item->id; ?></td>
			<td><?php echo (isset($logins[$item->loginid]) ? $logins[$item->loginid] :''); ?></td>
			<td><?php 
			switch($item->type)
			{
				case 10: echo '登录';break;
				case 11: echo '登出';break;
				case 20: echo '用户管理-增加';break;
				case 21: echo '用户管理-修改';break;
				case 22: echo '用户管理-删除';break;
			}?></td>
			<td><?php echo (isset($users[$item->param]) ? $users[$item->param] : ''); ?></td>
			<td><?php echo $item->time; ?></td>

		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Operate_records.</p>

<?php endif; ?>
