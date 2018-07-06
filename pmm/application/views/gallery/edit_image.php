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
	<title>Pixel Marshals | Update Existing Image</title>
	<?php echo link_tag('css/styles.css'); ?>
	<?php echo link_tag('css/bootstrap.min.css'); ?>
	<?php echo link_tag('css/oxygen.css'); ?>
</head>
<body>

<div id="container">
	<h1>Update Image</h1>

	<div id="body">
		<?php if(validation_errors() || isset($error)) : ?>
			<div class="alert alert-danger" role="alert" align="center">
				<?=validation_errors()?>
				<?=(isset($error)?$error:'')?>
			</div>
		<?php endif; ?>
		<?=form_open_multipart('gallery/edit/'.$image->id)?>

		  <div class="form-group">
		    <label for="userfile">Image File</label>
		    <div class="row" style="margin-bottom:5px"><div class="col-xs-12 col-sm-6 col-md-3"><?=img(['src'=>$image->file,'width'=>'100%'])?></div></div>
		    <input type="file" class="form-control" name="userfile">
		  </div>

		  <div class="form-group">
		    <label for="caption">Caption</label>
		    <input type="text" class="form-control" name="caption" value="<?=$caption?>">
		  </div>

		  <div class="form-group">
		    <label for="caption">Author</label>
		    <input type="text" class="form-control" name="author" value="<?=$author?>">
		  </div>

		  <div class="form-group">
		    <label for="caption">List</label>
			<select class="form-control" name="lists" >
				<option value="Masters">Masters</option>
				<option value="Historical - Ancient">Historical - Ancient</option>
				<option value="Historical - Medieval">Historical - Medieval</option>
				<option value="Historical - Renaissance">Historical - Renaissance</option>
				<option value="Historical - 18th Century">Historical - 18th Century</option>
				<option value="Historical - 19th Century">Historical - 19th Century</option>
				<option value="Historical - Early 20th Century">Historical - Early 20th Century</option>
				<option value="Historical - WWII">Historical - WWII</option>
				<option value="Historical - Cold War">Historical - Cold War</option>
				<option value="Historical - Modern">Historical - Modern</option>
				<option value="Non-Historical - Alternate History and Universe">Non-Historical - Alternate History and Universe</option>
				<option value="Non-Historical - Fantasy">Non-Historical - Fantasy</option>
				<option value="Non-Historical - Science Fiction">Non-Historical - Science Fiction</option>
			</select>
		  </div>

		  <div class="form-group">
		    <label for="caption">Category</label>
		    <input type="text" class="form-control" name="category" value="<?=$category?>">
		  </div>

		  <div class="form-group">
		    <label for="description">Description</label>
		    <textarea class="form-control" name="description"><?=$description?></textarea>
		  </div>

		  <button type="submit" class="btn btn-primary">Save</button>
		  <?=anchor('gallery','Cancel',['class'=>'btn btn-warning'])?>

		</form>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>