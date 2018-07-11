<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Pixel Marshals | </title>
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
			
			<div class="nav">
			<ul id="drop-nav">
			<li><?=anchor('gallery/index','Home',['class'=>'btn btn-primary'])?></li>
			<li><?=anchor('#','Categories',['class'=>'btn btn-primary'])?></a>
				<ul>
				<li><a href="gallery/lists/Masters">Masters</a></li>
				<li><a href="gallery/lists/Historical_-_Ancient">Historical - Ancient</a></li>
				<li><a href="gallery/lists/Historical_-_Medieval">Historical - Medieval</a></li>
				<li><a href="gallery/lists/Historical_-_Renaissance">Historical - Renaissance</a></li>
				<li><a href="gallery/lists/Historical_-_18th_Century">Historical - 18th Century</a></li>
				<li><a href="gallery/lists/Historical_-_19th_Century">Historical - 19th Century</a></li>
				<li><a href="gallery/lists/Historical_-_Early_20th_Century">Historical - Early 20th Century</a></li>
				<li><a href="gallery/lists/Historical_-_WWII">Historical - WWII</a></li>
				<li><a href="gallery/lists/Historical_-_Cold_War">Historical - Cold War</a></li>
				<li><a href="gallery/lists/Historical_-_Modern">Historical - Modern</a></li>
				<li><a href="gallery/lists/Non-Historical_-_Alternate_History_and_Universe">Non-Historical - Alternate History and Universe</a></li>
				<li><a href="gallery/lists/Non-Historical_-_Fantasy">Non-Historical - Fantasy</a></li>
				<li><a href="gallery/lists/Non-Historical_-_Science_Fiction">Non-Historical - Science Fiction</a></li>
				</ul>
			</li>
			<li><?=anchor('http://pixelmarshal.boards.net','Forum',['class'=>'btn btn-primary'])?></li>
			<li><?=anchor('gallery/admeen','Admin Menu',['class'=>'btn btn-primary'])?></li>
			</ul>
			</div>
			
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
					<td><p><?= str_replace ("_", " ", $img->lists);?></p></td>
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