<?php 
include(dirname(__DIR__)."/common/header.php"); ?>

<!--************************************
		Home Slider Start
*************************************-->
<div class="th-innerpagebanner th-haslayout th-parallaximg" data-appear-top-offset="600" data-parallax="scroll" data-image-src="<?php echo base_url()?>assets/images/bgparallax/bgparallax-05.jpg">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-xs-12">
				<div class="th-pagetitle">
					<h1><?php echo $status ? 'Booking Success' : 'Booking Failed'; ?></h1>
				</div>				
			</div>
		</div>
	</div>
</div>
<!--************************************
		Home Slider End
*************************************-->

<!--************************************
	Main Start
*************************************-->
<main id="th-main" class="th-main th-haslayout">
	<div class="container">
		<div class="row">
			<div id="th-content" class="th-content">
				<div class="col-sm-10 col-sm-offset-1 col-xs-12">
					<div class="th-404content">
						<div class="th-404tital th-no-margin">
							<h2><?php echo $status ? "<i class='fa fa-check text-success'></i>" : "<i class='fa fa-times text-danger'></i>"?></h2>
						</div>
						<?php if($status) { ?>
						<h3>Expect a Call <span>Shortly</span></h3>
						<div class="th-description">
							<p>Hello <?php echo $name;?>! Your appointment has been booked successfully on <?php echo $date;?>. Our representative will contact you shortly to confirm your appointment. Stay healthy :) </p>
						</div>
						<?php } else {?>
						<h3>Technical <span>Error</span></h3>
						<div class="th-description">
							<p>We were not able to book your appointment due to some technical issue occurred. Please retry filling the appointment form with relavant information. If the error still exists, give us a call on <b>+91-9887-6887-13</b> or email us on <b>drkiran@drkiranshomeo.com</b>. <br/>Sorry for the inconvinience. :( </p>
						</div>
						<?php } ?>
						<div class="th-backhome">
							<a class="th-btn" href="<?php echo base_url(); ?>">Back to Home</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<!--************************************
		Main End
*************************************-->
<?php include(dirname(__DIR__).'/common/footer.php'); ?>