<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Pixel Marshals | Admin Menu</title>
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

			<div align="center">
			<?=anchor('gallery/add','Add a new image',['class'=>'btn btn-primary'])?>
			<?=anchor('gallery/index','Back',['class'=>'btn btn-primary'])?>
			</div>
			<hr />	
			<div class="row">
				<?php foreach($images->result() as $img) : ?>
				<div class="col-md-3">
					<div class="thumbnail">
						<?php echo anchor('gallery/view/'.$img->id, img($img->file));?>
						<div class="caption">
							<h3><?=$img->caption?></h3>
							<h4><?=$img->author?></h4>
							<h4><?= str_replace ("_", " ", $img->lists);?></h4>
							<h4><?=$img->category?></h4>
							<p><?=substr($img->description, 0,100)?>...</p>
							<p>
								<?=anchor('gallery/edit/'.$img->id,'Edit',['class'=>'btn btn-warning', 'role'=>'button'])?>
								<?=anchor('gallery/delete/'.$img->id,'Delete',['class'=>'btn btn-danger', 'role'=>'button','onclick'=>'return confirm(\'Are you sure?\')'])?>
							</p>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		<?php else : ?>
			<div align="center">We don't have any image yet, go ahead and <?=anchor('gallery/add','add a new one')?>.</div>
		<?php endif; ?>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>