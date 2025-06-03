<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3><?=$title;?></h3>
                            <h4><a href="<?=base_url('main');?>"><i class="fa fa-arrow-left"></i> Back</a></h4>
						</div>						
					</div>
					<div class="clearfix"></div>					
					<div class="row">
						<div class="col-lg-6 col-md-12 col-sm-12">
							<div class="x_panel">
								<div >
									<h2>Betting Details</h2>									
									<div class="clearfix"></div>
								</div>
								<div class="x_content">						   
                                    <table class="table" style="font-size:14px;">
                                        <?php
                                        $totaldeposit=0;
                                        foreach($items as $item){
                                            // if($item['status']=="pending" || $item['status']=="cancelled"){
                                            //     $color="red";
                                            //     $amount="";
                                            // }else{
                                            //     $color="green";
                                            //     $amount=number_format($item['amount'],2);
                                            //     $totaldeposit += $item['amount'];
                                            // }
                                        ?>
                                        <tr>
                                            <td>Fight #<?=$item['fight_no'];?></td>
                                            <td colspan="2" align="right"><?=$item['datearray'];?> | <?=$item['timearray'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Bet Side: <b><?=$item['bet_side'];?></b></td>
                                            <td colspan="2">Result: <b><?=$item['win_result'];?></b></td>
                                        </tr>
                                        <tr>
                                            <td>Bet Amount: <?=$item['betamount'];?></td>
                                            <td colspan="2">Valid Bet: <?=$item['betamount'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Win/Loss: <?=$item['betamount'];?></td>
                                            <td colspan="2">Valid Bet: <?=$item['betamount'];?></td>
                                        </tr>
                                        <!-- <tr>
                                            <td width="37%">Request<br><?=number_format($item['amount'],2);?></td>
                                            <td width="30%">Received Amount<br><?=$amount;?></td>
                                            <td width="20%">Status<br><font color="<?=$color;?>"><?=$item['status'];?></font></td>
                                        </tr> -->
                                        <tr>
                                            <td colspan="3">&nbsp;</td>
                                        </tr>                                        
                                        <?php
                                        }
                                        ?>                                        
                                        <tr>
                                            <td colspan="2"><b>Total Amount:</b></td>
                                            <td align="right"><b><?=number_format($totaldeposit,2);?></b></td>
                                        </tr>
                                    </table>                                     
								</div>
							</div>
						</div>											
					</div>													
				</div>
			</div>
			<!-- /page content -->