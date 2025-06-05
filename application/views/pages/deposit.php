<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="col-lg-6 col-md-12 col-sm-12">
						<div class="title_left">
							<h4><a href="<?=base_url('main');?>"><i class="fa fa-home fa-2x"></i></a> | <?=$title;?></h4>
						</div>

						<!-- <div class="title_right">
							<div class="col-md-5 col-sm-5  form-group pull-right top_search">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Search for...">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button">Go!</button>
									</span>
								</div>
							</div>
						</div> -->
					</div>
					<div class="clearfix"></div>					
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="x_panel">
								<div class="x_title">
									<h2>Deposit Details</h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a href="<?=base_url('deposit_history');?>" style="color:black;"><i class="fa fa-history"></i> History</a>
										</li>										
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />                                   
                                    <div class="form-group row">
											<div class="col-lg-6 col-md-12 col-sm-12 text-center">
												<button type="button" class="btn btn-primary btn-sm bet_amount" onclick="betAmount('100')">100</button>
												<button class="btn btn-primary btn-sm bet_amount" type="button" onclick="betAmount('200')">200</button>
                                                <button type="button" class="btn btn-primary btn-sm bet_amount" onclick="betAmount('500')">500</button>
												<button class="btn btn-primary btn-sm bet_amount" type="button" onclick="betAmount('1000')">1000</button>
                                                <button type="button" class="btn btn-primary btn-sm bet_amount" onclick="betAmount('5000')">5000</button>																							
											</div>
										</div>     
									<form class="form-label-left input_mask" action="<?=base_url('save_deposit');?>" method="POST">                                        
										<div class="col-md-6 col-sm-6  form-group has-feedback">
											<input type="number" class="form-control has-feedback-left" id="bet_amount" placeholder="Deposit Amount" name="amount" required>
											<span class="fa fa-money form-control-feedback left" aria-hidden="true"></span>
										</div>																			
										
										<div class="form-group">
											<div class="col-lg-12 col-md-9 col-sm-12">												
												<button type="submit" class="btn btn-success" id="btnBetAmount" disabled>Submit</button>
											</div>
										</div>																					
									</form>
                                    <?php
                                            if($this->session->success){
                                                ?>
                                                <div class="alert alert-success"><?=$this->session->success;?></div>
                                                <?php
                                            }
                                            ?>

                                            <?php
                                            if($this->session->failed){
                                                ?>
                                                <div class="alert alert-danger"><?=$this->session->failed;?></div>
                                                <?php
                                            }
                                            ?>
								</div>
							</div>
						</div>											
					</div>													
				</div>
			</div>
			<!-- /page content -->