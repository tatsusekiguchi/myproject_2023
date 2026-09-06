<?php
/*
Template Name: 募集要項
*/
?>
<?php get_header(); ?>
	<!-- ▽メイン▽-->
	<main class="pageMain" id="requirementsMain">
		<div class="pageKvPanel">
			<div class="pageKvTitle">
				<p>Recruitment <br class="spBreak">information</p>
				<h1>募集要項</h1>
			</div>
		</div>
		<div class="requirementsSection">
			<div class="secWrap01">
				<?php
					$field = SCF::get('requirements');
					foreach ($field as $fields) {
				?>
				<div class="secPanel">
					<div class="accordHead">
						<div class="title">
							<h2><?php echo $fields['requirements_title']; ?></h2>
						</div>
						<div class="arrow"><img src="<?php bloginfo('template_url'); ?>/image/requirements/requirements_accord_arrow.png" alt=""></div>
					</div>
					<div class="accordBody">
					<?php echo $fields['requirements_content']; ?>
					</div>
				</div>
				<?php  } ?>
			</div>
		</div>
	</main>
	<!-- △メイン△-->
<?php get_footer(); ?>