<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if($this->input->post()){
	$caption 		= set_value('caption');
	$author 		= set_value('author');
	$lists 			= set_value('lists');
	$category 		= set_value('category');
	$description 	= set_value('description');
} else {
	$caption 		= $image->caption;
	$author 		= $image->author;
	$lists 			= $image->lists;
	$category 		= $image->category;
	$description 	= $image->description;
}
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Pixel Marshals | <?=$caption?></title>
	<?php echo link_tag('css/styles.css'); ?>
	<?php echo link_tag('css/bootstrap.min.css'); ?>
	<?php echo link_tag('css/oxygen.css'); ?>
</head>
<body>

<div id="container">
	<h1><?=$caption?></h1>

	<div id="body">
		<?php if(validation_errors() || isset($error)) : ?>
			<div class="alert alert-danger" role="alert" align="center">
				<?=validation_errors()?>
				<?=(isset($error)?$error:'')?>
			</div>
		<?php endif; ?>
		<?=form_open_multipart('gallery/view/'.$image->id)?>
		  <div class="form-group" style="">
			<table>
			<tr>
			<td><h4>Author:</h4></td>
			<td><h4>List:</h4></td>
			<td><h4>Category:</h4></td>
			<td><h4>Description:</h4></td>
			</tr>
			<tr>
			<td><h5><?=$author?></h5></td>
			<td><h5><?=$lists?></h5></td>
			<td><h5><?=$category?></h5></td>
			<td><h5><?=$description?></h5></td>
			</tr>
			</table>
		    <div class="row"><div align="center"><?=img(['src'=>$image->file,])?></div></div>
		  </div>
		  <?=anchor('gallery','Back',['class'=>'btn btn-default'])?>

		</form>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>