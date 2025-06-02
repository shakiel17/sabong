<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3><a href="<?=base_url('main');?>"><i class="fa fa-home"></i></a> | <?=$title;?></h3>
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
									<h2>Withdrawal Details</h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a href="<?=base_url('withdraw_history');?>" style="color:black;"><i class="fa fa-history"></i> History</a>
										</li>										
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />        
                                    <div class="form-group">
                                        <div class="col-lg-12 col-md-9 col-sm-12">
                                             <?php
                                                $acct=$this->Sabong_model->getCustomerAccount($this->session->customer_id);
                                                ?>
                                         Available Amount to withdraw: <?=number_format($acct['amount'],2);?>
                                        </div>
                                    </div>    
                                    <br>                                                         
									<form class="form-label-left input_mask" action="<?=base_url('save_withdraw');?>" method="POST">
                                        <input type="hidden" name="avail_balance" value="<?=$acct['amount'];?>">                                        
										<div class="col-md-6 col-sm-6  form-group has-feedback">
											<input type="number" class="form-control has-feedback-left" id="bet_amount" placeholder="Withdrawal Amount" name="amount" required>
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