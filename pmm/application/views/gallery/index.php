<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Pixel Marshals | Home Page</title>
	<?php echo link_tag('css/styles.css'); ?>
	<?php echo link_tag('css/bootstrap.min.css'); ?>
	<?php echo link_tag('css/oxygen.css'); ?>
</head>
<body>

<div id="container">
	<h1 align="center"><img src="/pmm/css/images/banner.png"></h1>

	<div id="body">
		<?php if($images->num_rows() > 0) : ?>
			
			<?php if($this->session->flashdata('message')) : ?>
				<div class="alert alert-success" role="alert" align="center">
					<?=$this->session->flashdata('message')?>
				</div>
			<?php endif; ?>
			<div align="center"><?=anchor('gallery/admeen','Admin Menu',['class'=>'btn btn-primary'])?></div>
			<hr />	
			<div class="row">
			<table style="margin: 20px;">
				<tr>
					<td><h4>Caption</h4></td>
					<td><h4>Author</h4></td>
					<td><h4>Lists</h4></td>
					<td><h4>Category</h4></td>
					<td><h4>Description</h4></td>
				</tr>
				
				<?php foreach($images->result() as $img) : ?>
				<tr>
					<td><b><?php echo anchor('gallery/view/'.$img->id, $img->caption);?></b></td>
					<td><b><?=$img->author?></b></td>
					<td><p><?=$img->lists?></p></td>
					<td><p><?=$img->category?></p></td>
					<td><p><?=substr($img->description, 0,100)?></p></td>
				</tr>
				<?php endforeach; ?>
			</table>
			</div>
		<?php else : ?>
			<div align="center">We don't have any image yet.</div>
		<?php endif; ?>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>