<div class="row-fluid">
	<div class="position-relative">
		<div id="login-box" class="login-box visible widget-box no-border">
			<div class="widget-body">
				<div class="widget-main">
					<h4 class="header blue lighter bigger">
						<i class="icon-coffee green"></i>
						Please Enter Your Information
					</h4>

					<div class="space-6"></div>

					<?php echo $this->Form->create('Login'); ?>
						<fieldset>
                                                    <?php echo $this->Session->flash(); ?>
							<label>
								<span class="block input-icon input-icon-right">
									<input type="text" name="data[User][username]" class="span12" placeholder="Username" />
									<i class="icon-user"></i>
								</span>
							</label>

							<label>
								<span class="block input-icon input-icon-right">
									<input type="password" name="data[User][password]" class="span12" placeholder="Password" />
									<i class="icon-lock"></i>
								</span>
							</label>

							<div class="space"></div>

							<div class="clearfix">
								<label class="inline">
									<input type="checkbox" />
									<span class="lbl"> Remember Me</span>
								</label>

								<button type="submit" class="width-35 pull-right btn btn-small btn-primary">
									<i class="icon-key"></i>
									Login
								</button>
							</div>

							<div class="space-4"></div>
						</fieldset>
					<?php echo $this->Form->end(); ?>

					<!-- <div class="social-or-login center">
						<span class="bigger-110">Or Login Using</span>
					</div>

					<div class="social-login center">
						<a class="btn btn-primary">
							<i class="icon-facebook"></i>
						</a>

						<a class="btn btn-info">
							<i class="icon-twitter"></i>
						</a>

						<a class="btn btn-danger">
							<i class="icon-google-plus"></i>
						</a>
					</div> -->
				</div><!--/widget-main-->

				<div class="toolbar clearfix">
					<div>
						<a href="#" onclick="show_box('forgot-box'); return false;" class="forgot-password-link">
							<i class="icon-arrow-left"></i>
							I forgot my password
						</a>
					</div>
				</div>
			</div><!--/widget-body-->
		</div><!--/login-box-->

		<div id="forgot-box" class="forgot-box widget-box no-border">
			<div class="widget-body">
				<div class="widget-main">
					<h4 class="header red lighter bigger">
						<i class="icon-key"></i>
						Retrieve Password
					</h4>

					<div class="space-6"></div>
					<p>
						Enter your email and to receive instructions
					</p>

					<form>
						<fieldset>
							<label>
								<span class="block input-icon input-icon-right">
									<input type="email" class="span12" placeholder="Email" />
									<i class="icon-envelope"></i>
								</span>
							</label>

							<div class="clearfix">
								<button onclick="return false;" class="width-35 pull-right btn btn-small btn-danger">
									<i class="icon-lightbulb"></i>
									Send Me!
								</button>
							</div>
						</fieldset>
					</form>
				</div><!--/widget-main-->

				<div class="toolbar center">
					<a href="#" onclick="show_box('login-box'); return false;" class="back-to-login-link">
						Back to login
						<i class="icon-arrow-right"></i>
					</a>
				</div>
			</div><!--/widget-body-->
		</div><!--/forgot-box-->
		
	</div><!--/position-relative-->
</div>
