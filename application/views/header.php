<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<head>
	<script src='<?= base_url(); ?>application/js/jquery.js' type='text/javascript'></script>	
	<link rel='stylesheet' href='<?= base_url(); ?>application/css/bootstrap.413.css' type='text/css'>
	<link rel='stylesheet' href='<?= base_url(); ?>application/css/bootstrap.337.css' type='text/css'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel='stylesheet' href='<?= base_url(); ?>application/css/header_universal.css' type='text/css'>
<?php
	foreach($css_list as $css){
?>
	<link rel='stylesheet' href='<?= base_url() . $css ?>'>
<?php
	}
	foreach($js_list as $js){
?>
	<script src='<?= base_url() . $js ?>'></script>
<?php
	}
	$user_id	= $profile_information->id;
	$first_name = $profile_information->first_name;
	$last_name 	= $profile_information->last_name;
?>
</head>
<html>
	<body>
		<div class='side_nav_universal' id='large_side_nav'>
			<button type='button' class='btn-transparent' title='Hide Side Navigation' id='hide_side_navigation_button'>
				-
			</button>
			<span class='pattern_one'>
				<a href='<?= site_url("Users/Edit_user/" . $user_id) ?>' style='text-decoration:none;color:white'>
					<h4><?= $first_name . " " . $last_name ?></h4>
				</a>
			</span>
			<hr style='border-bottom:1px solid #eee;width:60%'>
			<span class='menu_list'>
				<ul>
					<li>
						<a href='#'>
							Dashboard
						</a>
					</li>
					<li>
						<span class='tier_one'>Report<span>
						<div class='tier_one_container'>
							<a href='<?= site_url('Report/Create_report')?>'>Create report</a>
							<br>
							<a href='#'>Edit report</a>
						</div>
					</li>
					<li>
						<span class='tier_one'>Data master<span>
						<div class='tier_one_container'>
							<a href='<?= site_url('Weather')?>'>Data cuaca</a>
							<br>
							<a href='Client'>Data klien</a>
							<br>
							<a href='#'>Data SDM</a>
							<br>
						</div>
					</li>
					<li>
						<span class='tier_one'>Project<span>
						<div class='tier_one_container'>
							<a href='<?= site_url('Project') ?>'>Add project</a>
							<br>
							<a href='#'>View progress</a>
							<br>
						</div>
					</li>
				</ul>				
			</span>
		</div>
		<div class='side_nav_small' id='small_side_nav' style='display:none'>
			<button type='button' class='btn-transparent' title='Show Side Navigation' id='show_side_navigation_button'>
				+
			</button>
			<br><br><br>			
			<div class='menu_list_small'>
				<a href='#'>
					<i class="fa fa-home" aria-hidden="true"></i>				
				</a>
				<br>
				<br>
				<a id='report_small'>
					<i class="fa fa-flag" aria-hidden="true"></i>
				</a>
				<div class='sub_menu' id='report_small_sub_1' style='display:none'>
					<a href='#'>Create report</a>
					<hr>
					<a href='#'>Edit report</a>
				</div>
			</div>
		</div>
		<script>
			$('.tier_one').click(function(){
				var child = $(this).find('.tier_one_container');
				console.log(child);
				child.toggle(200);			
			});
			$('#hide_side_navigation_button').click(function(){
				$('#large_side_nav').toggle(300);
				$('.main').css('margin-left','5%');
				setTimeout(function(){
					$('#small_side_nav').toggle(300);
				},300)
			});
			$('#show_side_navigation_button').click(function(){
				$('#small_side_nav').toggle(300);
				setTimeout(function(){
					$('.main').css('margin-left','20%');
					$('#large_side_nav').toggle(200);
				},200)
			});
			$('#report_small').click(function(){
				var position = $(this).position().top;
				var left = $('#small_side_nav').width();
				$('#report_small_sub_1').css('left',left);
				$('#report_small_sub_1').css('top',position);
				$('#report_small_sub_1').toggle(100);
			})
		</script>
		<div class='main'>