<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="row">
					    <div class="col-lg-6 col-md-12 col-sm-12">
						    <div class="title_left">
							    <h4><?=$title;?></h4>
                                <h4><a href="<?=base_url('main');?>"><i class="fa fa-arrow-left"></i> Back</a></h4>
						    </div>						
                        </div>
					</div>
					<div class="clearfix"></div>					
					<div class="row">
						<div class="col-lg-6 col-md-12 col-sm-12">
							<div class="x_panel">
								<div class="x_title">
									<h2>Betting Details</h2>
                                    <div>
                                        <form action="<?=base_url('search_bet_history');?>" method="POST">
                                        <table width="100%" border="0">
                                            <tr>
                                                <td>                                                    
                                                    <input type="date" name="datearray" class="form-control" value="<?=date('Y-m-d');?>">
                                                </td>
                                                <td>
                                                    <input type="submit" class="btn btn-primary" value="Search">
                                                </td>
                                            </tr>
                                        </table>	
                                        </form>
                                    </div>                                    								
									<div class="clearfix"></div>                                    
								</div>
								<div class="x_content">						   
                                    <table class="table" style="font-size:14px;">
                                        <?php
                                        $totaldeposit=0;
                                        foreach($items as $item){   
                                                $query=$this->Sabong_model->db->query("SELECT * FROM fight WHERE fight_no='$item[fight_no]' AND datearray='$item[datearray]'");
                                                $row=$query->row_array(); 
                                            if($item['bet_side']==$item['win_result']){                                                
                                                if($item['win_result']=="meron"){
                                                    $totaldeposit += $item['betamount']*$row['odds_meron'];
                                                }else if($item['win_result']=="wala"){
                                                    $totaldeposit += $item['betamount']*$row['odds_wala'];
                                                }else{
                                                    
                                                }                                                
                                            }                                        
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
                                            <td>Win/Loss: 
                                                <?php
                                                if($item['bet_side']==$item['win_result']){
                                                    echo "<b style='color:green;'>Win</b>";
                                                }else{
                                                    echo "<b style='color:red;'>Loss</b>";
                                                }
                                                ?>
                                            </td>
                                            <td colspan="2">Winnings: 
                                                <?php
                                                if($item['bet_side']==$item['win_result']){
                                                    if($item['win_result']=="meron"){
                                                        echo "<b style='color:green;'>".$item['betamount']*$row['odds_meron']."</b>";
                                                    }else if($item['win_result']=="wala"){
                                                        echo "<b style='color:green;'>".$item['betamount']*$row['odds_wala']."</b>";
                                                    }else{
                                                        
                                                    }
                                                }else{
                                                    echo "<b style='color:red;'>0.00</b>";
                                                }
                                                ?></td>
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