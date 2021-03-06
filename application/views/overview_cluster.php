<!DOCTYPE html>
<html lang=en>
<head>
<meta charset=utf-8>
<?php if (is_ie()){ ?>
<meta http-equiv=X-UA-Compatible content="IE=edge,chrome=1">
<?php } ?>
<title><?= $title ?></title>
<link rel=stylesheet href="<?= base_url('static/css/common.css'); ?>" media=all>
<link rel=stylesheet href="<?= base_url('static/css/frame.css'); ?>" media=all>
<link rel="shortcut icon" href="<?= base_url('static/images/favicon.png'); ?>">
<script src="<?= base_url('static/js/jquery-1.7.2.min.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('static/js/frame.js'); ?>" type="text/javascript"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
<?php 
	$i = -1;
	foreach ($infos as $name => $info) { 
		$i += 1;
?>
<div class="server">
	<h2><?= $server_name ?> [<?= $i ?>]</h2>
	<table>
		<tr>
			<td><div>服务器地址：</div></td>
			<td><div><?= $name ?></div></td>
		</tr>
		<tr>
			<td><div>服务端版本：</div></td>
			<td><div><?= $info['redis_version']?></div></td>
		</tr>
		<tr>
			<td><div>Keys数量：</div></td>
			<td><div><?= isset($info['key_infos']['keys']) ? $info['key_infos']['keys'] : 0 ?></div></td>
		</tr>
		<tr>
			<td><div>内存使用量：</div></td>
			<td><div><?= format_size($info['used_memory'])?></div></td>
		</tr>
		<tr>
			<td><div>运行时间：</div></td>
			<td><div><?= format_ago($info['uptime_in_seconds'])?></div></td>
		</tr>
		<tr>
			<td><div>上次保存：</div></td>
			<?php
				$last_save_time = NULL;
				if ( isset($info['rdb_last_save_time']) ) {
					$last_save_time = $info['rdb_last_save_time'];
				} elseif ( isset($info['last_save_time']) ) {
					$last_save_time = $info['last_save_time'];
				}
			?>
			<td>
				<div>
					<?= ( $last_save_time === NULL ? '未知' : format_ago(time() - $last_save_time, true) ) ?> 
				</div>
			</td>
		</tr>
	</table>
</div>
<?php } ?>
</body>
</head>
