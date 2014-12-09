<h2>用户管理</h2>

<div style="float:right"><?php echo Html::anchor('user/create', '新增', array('class' => 'btn btn-success')); ?>
</div><br>
<?php if ($users): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>No.</th>
			<th>姓名</th>
			<th>性别</th>
			<th>出生日期</th>
            <th>学历</th>
			<th>爱好特长</th>
			<th>班级</th>
			<th>帐号</th>
            <th>修改</th>
            <th>删除</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($users as $item): ?>		<tr>
            <td><?php echo $item->id; ?></td>
			<td><?php echo $item->name; ?></td>
			<td><?php echo ($item->sex == 1 ? '男' : '女'); ?></td>
			<td><?php echo $item->birthday; ?></td>
			<td>
            <?php
                switch($item->education)
                {
                    case 0 : echo '未指定';
                        break;
                    case 10 : echo '初中及以下';
                        break;
                    case 20 : echo '高中及同等学历';
                        break;
                    case 30 : echo '大专';
                        break;
                    case 40 : echo '本科';
                        break;
                    case 50 : echo '硕士';
                        break;
                    case 60 : echo '博士';
                        break;
                    case 70 : echo '博士后及以上';
                        break;
                }
                ?>
            </td>

			<td><?php echo $item->hobbies; ?></td>
			<td><?php echo $item->class; ?></td>
            <td><?php echo isset($logins[$item->id]) ? $logins[$item->id] : '';?></td>
			<!--<td><?php /*echo Html::anchor('user/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-small')); */?></td>-->
            <td><?php echo Html::anchor('user/edit/'.$item->id, '<i class="icon-wrench"></i> 修改', array('class' => 'btn btn-small')); ?></td>
            <td><?php echo Html::anchor('user/delete/'.$item->id, '<i class="icon-trash icon-white"></i> 删除', array('class' => 'btn btn-small btn-danger', 'onclick' => "return confirm('确认删除吗?')")); ?></td>
    <!--<div class="btn-toolbar">
					<div class="btn-group">
						<?php /*echo Html::anchor('user/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-small')); */?>
                        <?php /*echo Html::anchor('user/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-small')); */?>
                        <?php /*echo Html::anchor('user/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-small btn-danger', 'onclick' => "return confirm('Are you sure?')")); */?>					</div>
				</div>

			</td>
		</tr>-->
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Users.</p>

<?php endif; ?>
