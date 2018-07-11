<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Add New Image</title>
	<?php echo link_tag('css/styles.css'); ?>
	<?php echo link_tag('css/bootstrap.min.css'); ?>
	<?php echo link_tag('css/oxygen.css'); ?>
	</style>
</head>
<body>

<div id="container">
	<h1>Pixel Marshals | Add New Image</h1>

	<div id="body">
		<?php if(validation_errors() || isset($error)) : ?>
			<div class="alert alert-danger" role="alert" align="center">
				<?=validation_errors()?>
				<?=(isset($error)?$error:'')?>
			</div>
		<?php endif; ?>
		<?=form_open_multipart('gallery/add')?>

		  <div class="form-group">
		    <label for="userfile">Image File</label>
		    <input type="file" class="form-control" name="userfile">
		  </div>

		  <div class="form-group">
		    <label for="caption">Caption</label>
		    <input type="text" class="form-control" name="caption" value="">
		  </div>

		  <div class="form-group">
		    <label for="caption">Author</label>
		    <input type="text" class="form-control" name="author" value="">
		  </div>

		  <div class="form-group">
		    <label for="caption">List</label>
			<select class="form-control" name="lists" >
				<option value="Masters">Masters</option>
				<option value="Historical_-_Ancient">Historical - Ancient</option>
				<option value="Historical_-_Medieval">Historical - Medieval</option>
				<option value="Historical_-_Renaissance">Historical - Renaissance</option>
				<option value="Historical_-_18th_Century">Historical - 18th Century</option>
				<option value="Historical_-_19th_Century">Historical - 19th Century</option>
				<option value="Historical_-_Early_20th_Century">Historical - Early 20th Century</option>
				<option value="Historical_-_WWII">Historical - WWII</option>
				<option value="Historical_-_Cold_War">Historical - Cold War</option>
				<option value="Historical_-_Modern">Historical - Modern</option>
				<option value="Non-Historical_-_Alternate_History_and_Universe">Non-Historical - Alternate History and Universe</option>
				<option value="Non-Historical_-_Fantasy">Non-Historical - Fantasy</option>
				<option value="Non-Historical_-_Science_Fiction">Non-Historical - Science Fiction</option>
			</select>
		  </div>

		  <div class="form-group">
		    <label for="caption">Category</label>
		    <input type="text" class="form-control" name="category" value="">
		  </div>

		  <div class="form-group">
		    <label for="description">Description</label>
		    <textarea class="form-control" name="description"></textarea>
		  </div>

		  <button type="submit" class="btn btn-primary">Upload</button>
		  <?=anchor('gallery','Cancel',['class'=>'btn btn-warning'])?>

		</form>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>