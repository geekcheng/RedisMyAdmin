<!DOCTYPE html>
<html lang=en>
<head>
<meta charset=utf-8>
<?php if (is_ie()){ ?>
<meta http-equiv=X-UA-Compatible content="IE=edge,chrome=1">
<?php } ?>
<title><?= $title; ?></title>
<link rel=stylesheet href="<?= base_url('static/css/common.css'); ?>" media=all>
<link rel=stylesheet href="<?= base_url('static/css/frame.css'); ?>" media=all>
<link rel="shortcut icon" href="<?= base_url('static/images/favicon.png'); ?>">
<script src="<?= base_url('static/js/jquery-1.7.2.min.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('static/js/frame.js'); ?>" type="text/javascript"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
<h2>
	<?= format_html($key)?>
	<?php if ($exists) { ?>
	<a href="<?= manager_site_url('rename', 'index', 'key=' . urlencode($key)); ?>"><img src="<?= base_url('static/images/edit.png'); ?>" width="16" height="16" title="重命名" alt="重命名"></a> <a href="<?= manager_site_url('delete', 'index', 'key=' . urlencode($key)); ?>" class="delkey"><img src="<?= base_url('static/images/delete.png'); ?>" width="16" height="16" title="删除" alt="删除"></a> <a href="<?= manager_site_url('export', 'index', 'key=' . urlencode($key)); ?>"><img src="<?= base_url('static/images/export.png'); ?>" width="16" height="16" title="导出" alt="导出"></a>
	<?php } ?>
</h2>
<?php 
if ( ! $exists ) {
?>
此key不存在。
<?php 
	die();
} 
?>
<table>
	<tr>
		<td><div>类型(Type):</div></td>
		<td><div>
				<?= format_html($type)?>
			</div></td>
	</tr>
	<tr>
		<td><div><abbr title="键的生存期">生存期(TTL)</abbr>:</div></td>
		<td><div>
				<?= ($ttl == -1) ? '永不过期' : $ttl . ' 秒';?>
				<a href="<?= manager_site_url('ttl', 'index', 'key=' . urlencode($key)); ?>"><img src="<?= base_url('static/images/edit.png'); ?>" width="16" height="16" title="修改生存期" alt="修改生存期" class="imgbut"></a></div></td>
	</tr>
	<tr>
		<td><div>编码类型(Encoding):</div></td>
		<td><div>
				<?= format_html($encoding)?>
			</div></td>
	</tr>
	<tr>
		<td><div>大小(Size):</div></td>
		<td><div>
				<?= $size?>
				<?= ($type == 'string') ? '字符' : '项'?>
			</div></td>
	</tr>
</table>
<br />
<table>
	<tr>
		<th><div>Score</div></th>
		<th><div>Value</div></th>
		<th><div>&nbsp;</div></th>
		<th><div>&nbsp;</div></th>
	</tr>
	<?php 
		$alt = 0;
		foreach ($values as $value => $score) {
	?>
	<tr <?= $alt ? 'class="alt"' : ''?>>
		<td><div>
				<?= $score?>
			</div></td>
		<td><div>
				<?= nl2br(format_html($value)); ?>
			</div></td>
		<td><div> <a href="<?= manager_site_url('edit', 'index', 'key=' . urlencode($key) . '&type=' . $type . '&value=' .  $value . '&score=' . $score); ?>"><img src="<?= base_url('static/images/edit.png'); ?>" width="16" height="16" title="编辑" alt="编辑"></a> <a href="<?= manager_site_url('delete', 'index', 'key=' . urlencode($key) . '&type=' . $type . '&value=' .  $value . '&score=' . $score); ?>" class="delval"><img src="<?= base_url('static/images/delete.png'); ?>" width="16" height="16" title="删除" alt="删除"></a> </div></td>
	</tr>
	<?php 
	$alt = ! $alt;
}
?>
</table>
<p> <a href="<?= manager_site_url('edit', 'index', 'key=' . urlencode($key) . '&type=' . $type ); ?>" class="add">新增一个值</a> </p>
</body>
</html>
