<!-- page content -->
  <style>
      .date-time {
        font-size: 2rem;
        padding: 30px;
        background-color: #000;
        border-radius: 10px;
        box-shadow: 0 0 10px #00000080;
        }
        .time {
        font-size: 2.5rem;
        margin-bottom: 10px;
        font-weight: bold;
        text-align:center;
        color:#fff;
        }
        .date {
        font-size: 2.2rem;
        text-align:center;
        color:#fff;
        box-shadow:0 0 10px gray;
        border-radius: 10px;
        }
    </style>
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

            if($fight['status']=="close"){
              $stat="closed";
              $bet="disabled";
              $btn="danger";
              $undo="disabled";
            }else{
              $stat="open";
              $bet="";
              $btn="success";
              $undo="";
            }
           $chkbetMeron=$this->Sabong_model->checkbet($fight['fight_no'],$this->session->customer_id,'meron');
           $myBetmeron=0;
           foreach($chkbetMeron as $betam){
              $myBetmeron += $betam['amount'];
           }
           $myBetwala=0;
           $chkbetWala=$this->Sabong_model->checkbet($fight['fight_no'],$this->session->customer_id,'wala');
            foreach($chkbetWala as $betam){
              $myBetwala += $betam['amount'];
           }          
        ?>        

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

    <script>
              function fightRefresh(){                                                
                  $.ajax({
                    url:'<?=base_url();?>index.php/pages/checkActiveFight',
                    type:'post',          
                    dataType:'json',
                    success: function(response){
                    // alert('Fight');
                      if(response.length > 0){
                          //alert(totalbet);
                        
                      }else{    
                        window.location = window.location.href;        
                        //alert(response.length);
                        //window.location = window.location.href;
                      }           
                      //alert(prev_[0]['amount']);
                    }
                  });
              }
              setInterval('fightRefresh()', 3000);
            </script> 
            <?php
            if($video){
              $link=$video['video_link'];
            }else{
              $link="";
            }
            ?>
        <div class="right_col" role="main">          
            <div class="row">
              <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Fight #<?=$fight['fight_no'];?> <span class="btn bg-<?=$btn;?> btn-sm text-white"><?=$stat;?></span></h2>
                    <!-- <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul> -->
                    <div class="clearfix"></div>
                  </div>                  
                  <div class="">                                        
                    <iframe width="100%" height="315" src="<?=$link;?>?autoplay=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin"></iframe>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="50%" align="center" class="bg-danger" style="color:white;"><h3 style="font-size:2em;">MERON</h3></td>
                            <td width="50%" align="center" class="bg-primary" style="color:white;"><h3 style="font-size:2em;">WALA</h3></td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>                        
                        </tr>
                        <tr>
                            <td width="50%" align="center" style="font-size:2.5em;"><b><?=$meron;?></b></td>
                            <td width="50%" align="center" style="font-size:2.5em;"><b><?=$wala;?></b></td>
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
                            <td width="50%" align="center" style="font-size:1em;">Your Bet: <?=$myBetmeron;?></td>
                            <td width="50%" align="center" style="font-size:1em;">Your Bet: <?=$myBetwala;?></td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>                        
                        </tr>
                        <form action="<?=base_url('submit_bet');?>" method="POST">
                        <input type="hidden" name="fight_no" value="<?=$fight['fight_no'];?>">
                        <tr>
                            <td colspan="2" style="padding-bottom:2px;" align="center">
                              <button type="button" class="btn btn-outline-info btn-sm" onclick="betAmount('100')" <?=$bet;?>>100</button>
                              <button type="button" class="btn btn-outline-info btn-sm" onclick="betAmount('200')" <?=$bet;?>>200</button>
                              <button type="button" class="btn btn-outline-info btn-sm" onclick="betAmount('500')" <?=$bet;?>>500</button>
                              <button type="button" class="btn btn-outline-info btn-sm" onclick="betAmount('1000')" <?=$bet;?>>1000</button>                              
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding-bottom:2px;" align="center"><input type="number" required class="form-control" <?=$bet;?> id="bet_amount" name="amount" placeholder="Bet Amount" style="width:68%; float:left;"> <input type="reset" class="btn btn-outline-secondary" value="Clear All"></td>                        
                        </tr>
                        <tr>
                            <td width="50%" align="center"><input type="submit" class="btn" style="width:98%; background:green; color:white;" name="btnBet" value="Bet Meron" <?=$bet;?>></td>
                            <td width="50%" align="center"><input type="submit" class="btn" style="width:98%; background:green; color:white;" name="btnBet" value="Bet Wala" <?=$bet;?>></td>
                        </tr>
                        <tr>
                            <td width="50%" align="center">
                              <?php
                              $chkbetMeron=$this->Sabong_model->checkbet($fight['fight_no'],$this->session->customer_id,'meron');
                              if(count($chkbetMeron)>0 && $fight['status']=="open"){
                                ?>
                                <a href="<?=base_url('undo_bet/'.$fight['fight_no']."/".$this->session->customer_id."/meron");?>" class="btn" style="width:98%; background:red; color:white;<?=$meronbet;?>">Undo Bet</a>
                                <?php
                              }
                              ?>                              
                            </td>
                            <td width="50%" align="center">
                              <?php
                              $chkbetWala=$this->Sabong_model->checkbet($fight['fight_no'],$this->session->customer_id,'wala');
                              if(count($chkbetWala) > 0 && $fight['status']=="open"){
                                ?>
                                <a href="<?=base_url('undo_bet/'.$fight['fight_no']."/".$this->session->customer_id."/wala");?>" class="btn" style="width:98%; background:red; color:white;<?=$walabet;?>">Undo Bet</a>
                                <?php
                              }
                              ?>                              
                            </td>
                        </tr>                                         
                        </form>     
                    </table>                    
                  </div>
                  <?php
                  if($this->session->error){
                  ?>
                  <div class="alert alert-danger"><?=$this->session->error;?></div>
                  <?php
                  }
                  ?>
                  <div class="date-time">
                    <div class="time" id="time"></div>
                    <div class="date" id="date"></div>
                    </div>
                </div>
              </div>                                         
            </div>
          </div>
        </div>        
        <?php        
          }else{
            ?>    
            <script>
              function fightRefresh(){                                                
                  $.ajax({
                    url:'<?=base_url();?>index.php/pages/checkActiveFight',
                    type:'post',          
                    dataType:'json',
                    success: function(response){
                    // alert('Fight');
                      if(response.length > 0){
                          //alert(totalbet);
                        window.location = window.location.href;
                      }else{            
                        //alert(response.length);
                        //window.location = window.location.href;
                      }           
                      //alert(prev_[0]['amount']);
                    }
                  });
              }
              setInterval('fightRefresh()', 3000);
            </script>        
            <div class="right_col" role="main">          
            <div class="row">
              <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>No Active Fight</h2>                    
                    <!-- <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul> -->
                    <div class="clearfix"></div>
                  </div>                  
                  <div>                    
                    <div class="date-time">
                    <div class="time" id="time"></div>
                    <div class="date" id="date"></div>
                    </div>
                  </div>
                  <?php
                  if($this->session->error){
                  ?>
                  <div class="alert alert-danger"><?=$this->session->error;?></div>
                  <?php
                  }
                  ?>
                </div>
              </div>                                         
            </div>
          </div>
        </div>
            <?php
          }
          ?>
        <!-- /page content -->    
         <script>
          function updateDateTime() {
            const now = new Date();
            const dateOptions = { year: 'numeric', month: 'long', day: 'numeric' };
            const formattedDate = now.toLocaleDateString(undefined, dateOptions);
            document.getElementById('date').textContent = formattedDate;
            const timeOptions = { hour: '2-digit', minute: '2-digit', second: '2-digit' };
            const formattedTime = now.toLocaleTimeString(undefined, timeOptions);
            document.getElementById('time').textContent = formattedTime;
            }
            updateDateTime();
            setInterval(updateDateTime, 1000);
         </script>     