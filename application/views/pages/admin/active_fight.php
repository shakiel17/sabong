<!-- page content -->
        <?php
        if($fight){
            $query=$this->Sabong_model->getFightDetailsBySide('meron',$fight['fight_no']);
            $meron=0;
            foreach($query as $row){
                $meron += $row['amount'];
            }
            $query=$this->Sabong_model->getFightDetailsBySide('wala',$fight['fight_no']);
            $wala=0;
            foreach($query as $row){
                $wala += $row['amount'];
            }              
            if($fight['status']=="open"){
                $win="style='display:none;'";
                $view="";
                $btn="success";
            }else{
                $win="";
                $view="style='display:none;'";
                $btn="danger";
            }
        ?>

        <script>
    function betRefresh(){            
          <?php
            $query=$this->Sabong_model->getFightDetailsBySide('meron',$fight['fight_no']);
            $meronbet=0;
            foreach($query as $row){
                $meronbet += $row['amount'];
            }
            $query=$this->Sabong_model->getFightDetailsBySide('wala',$fight['fight_no']);
            $walabet=0;
            foreach($query as $row){
                $walabet += $row['amount'];
            }  
            $totalbet=$walabet+$meronbet;        
            $this->session->set_userdata('betamount',$totalbet);            
          ?>  
          var totalbet = '<?=$this->session->betamount;?>';  
          var id = '<?=$fight['fight_no'];?>';   
        $.ajax({
          url:'<?=base_url();?>index.php/pages/fetchBetAmount',
          type:'post',
          data: {id: id},
          dataType:'json',
          success: function(response){
            if(totalbet !== response[0]['totalamount']){
                //alert(totalbet);
              window.location = window.location.href;
            }else{            
              //alert(response[0]['totalamount']);
            }           
            //alert(prev_[0]['amount']);
          }
        });
        }
        setInterval('betRefresh()', 3000);
        
    </script>    
        <div class="right_col" role="main">                                 
            <div class="row">
                <?php
                if($this->session->success){
                ?>
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="alert alert-success"><?=$this->session->success;?></div>
                </div>
                <?php
                }
                ?>
                <?php
                if($this->session->failed){
                ?>
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="alert alert-danger"><?=$this->session->failed;?></div>
                </div>
                <?php
                }
                ?>
              <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Fight #<?=$fight['fight_no'];?> <small><div class="btn btn-<?=$btn;?>"><?=$fight['status'];?></div></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a href="<?=base_url('close_betting/'.$fight['fight_no']);?>" <?=$view;?> class="btn btn-danger btn-sm text-white" onclick="return confirm('Do you wish to close betting?');return false;"><i class="fa fa-times"></i> Close Bet</a>
                      </li>                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table width="100%" border="0">
                        <tr>
                            <td width="50%" align="center" class="bg-danger" style="color:white;"><h3 style="font-size:2em;">MERON</h3></td>
                            <td width="50%" align="center" class="bg-primary" style="color:white;"><h3 style="font-size:2em;">WALA</h3></td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>                        
                        </tr>
                        <tr>
                            <td width="50%" align="center" style="font-size:3em;"><b><?=$meron;?></b></td>
                            <td width="50%" align="center" style="font-size:3em;"><b><?=$wala;?></b></td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>                        
                        </tr>
                        <tr>
                            <td width="50%" align="center" style="font-size:1em;"><b>Odds: <?=number_format($fight['odds_meron'],3);?></b></td>
                            <td width="50%" align="center" style="font-size:1em;"><b>Odds: <?=number_format($fight['odds_wala'],3);?></b></td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>                        
                        </tr>
                        <tr>
                            <td width="50%" align="center"><a href="<?=base_url('fight_result/'.$fight['fight_no'].'/meron');?>" class="btn btn-success btn-lg" <?=$win;?> style="width:90%;">Winner</a></td>
                            <td width="50%" align="center"><a href="<?=base_url('fight_result/'.$fight['fight_no'].'/wala');?>" class="btn btn-success btn-lg" <?=$win;?>  style="width:90%;">Winner</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"><a href="<?=base_url('fight_result/'.$fight['fight_no'].'/draw');?>" class="btn btn-secondary btn-lg" <?=$win;?> style="width:50%;">Draw</a></td>                        
                        </tr>                                              
                    </table>
                  </div>
                </div>
              </div>                                         
            </div>
          </div>
        </div>
        <?php
        }else{
            ?>
            <div class="right_col" role="main">                                 
            <div class="row">
                <?php
                if($this->session->success){
                ?>
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="alert alert-success"><?=$this->session->success;?></div>
                </div>
                <?php
                }
                ?>
                <?php
                if($this->session->failed){
                ?>
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="alert alert-danger"><?=$this->session->failed;?></div>
                </div>
                <?php
                }
                ?>
              <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>No Active Fight</h2>                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">                    
                  </div>
                </div>
              </div>                                         
            </div>
          </div>
        </div>
            <?php
        }
        ?>
        <!-- /page content -->