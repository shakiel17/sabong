<script>
    function statRefresh(){            
          <?php                   
            $this->session->set_userdata('betstat',$fight['status']);            
          ?>  
          var status = '<?=$this->session->betstat;?>';  
          var id = '<?=$fight['fight_no'];?>';   
        $.ajax({
          url:'<?=base_url();?>index.php/pages/fetchBetStat',
          type:'post',
          data: {id: id},
          dataType:'json',
          success: function(response){
            if(status !== response[0]['status']){
                //alert(totalbet);
              window.location = window.location.href;
            }else{            
              //alert(response[0]['totalamount']);
            }           
            //alert(prev_[0]['amount']);
          }
        });
        }
        setInterval('statRefresh()', 3000);        
</script>
 <!-- page content --> 
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?=$title;?></h3>
              </div>                
            </div>

            <div class="clearfix"></div>
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
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Manual Bet User Account</h2>     
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a href="#" class="btn btn-primary btn-sm text-white btn-round addManualBetAccount" data-toggle="modal" data-target="#ManageManualBetAccount"><i class="fa fa-plus"></i> Add User</a></li>
                      <li><a href="<?=base_url('clear_users');?>" class="btn btn-danger btn-sm text-white btn-round" onclick="return confirm('Do you wish to clear all users?');return false;"><i class="fa fa-trash"></i> Clear User</a></li>
                    </ul>               
                    <div class="clearfix"></div>                    
                  </div>
                  <div class="x_content">
                      <div class="row">
                            <div class="col-sm-12 table-responsive">
                                <table class="table table-bordered" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Customer ID</th>
                                            <th>Name</th>
                                            <th>Remaining Balance</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $x=1;
                                        foreach($items as $item){
                                            if($item['amount']==0){
                                                $redeem="style='display:none;'";
                                            }else{
                                                $redeem="";
                                            }
                                            echo "<tr>";
                                                echo "<td align='center'>$x.</td>";
                                                echo "<td align='center'>$item[customer_id]</td>";
                                                echo "<td align='center'>$item[fullname]</td>";
                                                echo "<td align='right'>".number_format($item['amount'],2)."</td>";
                                                ?>
                                                <td>
                                                    <a href="#" class="btn btn-warning btn-sm editManualBetAccount" data-toggle="modal" data-target="#ManageManualBetAccount" data-id="<?=$item['id'];?>_<?=$item['fullname'];?>_<?=$item['amount'];?>"><i class="fa fa-edit"></i> Edit</a>
                                                    <a href="#" class="btn btn-success btn-sm betAmount" data-toggle="modal" data-target="#BetAmount" data-id="<?=$item['customer_id'];?>_<?=$item['amount'];?>"><i class="fa fa-money"></i> Bet</a>
                                                    <a href="#" class="btn btn-info btn-sm claimAmount" data-toggle="modal" data-target="#ClaimAmount" data-id="<?=$item['customer_id'];?>_<?=$item['amount'];?>" <?=$redeem;?>><i class="fa fa-money"></i> Redeem Amount</a>                                                                                                        
                                                </td>
                                                <?php
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
              </div>             
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->