<?php include_once('common/header.php'); ?>
<!--************************************
		Home Slider Start
*************************************-->
	<div class="th-innerpagebanner th-haslayout th-parallaximg" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/bgparallax/bgparallax-05.jpg">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-xs-12">
					<div class="th-pagetitle">
						<h1>Contact Us</h1>
					</div>
					<ol class="th-breadcrumb">
						<li><a href="#">Home</a></li>
						<li><span>Contact</span></li>
					</ol>
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
	<main id="th-main" class="th-main th-haslayout th-topbottompaddingzero">
		<!--************************************
				Appointment Start
		*************************************-->
		<div class="container">
			<div class="row">
				<div class="th-content th-sectionspace">
				    <ul class="th-contactinfo">
						<li>
							<div class="th-infobox">
								<i class="th-iconbox"><img src="<?php echo base_url();?>assets/images/icon/img-09.png" alt="image description"></i>
								<span>(+91) 988-768-8713,</span>
								<span>(+91) 946-222-0074</span>
							</div>
						</li>
						<li>
							<div class="th-infobox">
								<i class="th-iconbox"><img src="<?php echo base_url();?>assets/images/icon/img-08.png" alt="image description"></i>
								<address>61-A, Ganesh Marg, Surya Nagar,Near Riddhi Siddhi, Gopalpura Bypass, Jaipur-302015</address>
							</div>
						</li>
						<li>
							<div class="th-infobox">
								<i class="th-iconbox"><img src="<?php echo base_url();?>assets/images/icon/img-10.png" alt="image description"></i>
								<a href="mailto:info@drkiranshomeo.com">info@drkiranshomeo.com,</a>
								<a href="#">contact@drkiranshomeo.com</a>
							</div>
						</li>
					</ul>
					<div class="col-sm-10 col-sm-offset-1 col-xs-12">
						<div class="th-sectionhead th-nopattren">
							<div class="th-sectiontitle">
								<h2>Keep in <span>Touch with Us</span></h2>
							</div>
							<div class="th-description">
								<p>Can you tell me how to get how to get to sesame street now the world don't move to the beat of just one drum what might be right for you may not be right for some so join us here each week my friends smile </p>
							</div>
						</div>
					</div>
					<form class="th-formgetintouch" id="get_in_touch" method="post">
						<fieldset>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<input type="text" name="name" required="" class="form-control" placeholder="Your Name *" maxlength="150">
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<input type="Number" name="phone" required="" class="form-control" placeholder="Contact Number *" maxlength="10">
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<input type="email" name="email" class="form-control" placeholder="Your E-mail" maxlength="80">
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<input type="text" name="subject" required="" class="form-control" placeholder="Subject *" maxlength="255">
								</div>
							</div>
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
									<textarea class="form-control th-textarea" name="message" placeholder="Message (if any)"></textarea>
								</div>
							</div>
							<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-12">
								<button id="btn_send" class="th-btnform th-btnform-lg" type="button"><span>Send Your Message</span></button>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
		<div id="myContactModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
			    <!-- Modal content-->
			    <div class="modal-content">
			      	<div class="modal-header">
			        	<button type="button" class="close" data-dismiss="modal">&times;</button>
			        	<h4 class="modal-title"></h4>
			      	</div>
			      	<div class="modal-body">
			        	<p></p>
			     	</div>
			      	<div class="modal-footer">
			        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      	</div>
			    </div>
			</div>
		</div>

		<!--************************************
				Appointment end
		*************************************-->
	</main>
	<!--************************************
			Main End
	*************************************-->
<?php include_once('common/footer.php'); ?>
