 <!-- page content -->
  <!-- <script>
    function depositRefresh(){
          <?php
          $deposit=$this->Sabong_model->getAllDepositRequest();
          $this->session->set_userdata('depositcount',count($deposit));          
          ?>
          var prev_val = '<?=$this->session->depositcount;?>';        
        $.ajax({
          url:'<?=base_url();?>index.php/pages/fetchDepositRequest',
          type:'post',          
          dataType:'json',
          success: function(response){
            if(prev_val !== response[0]['totalcount']){
              window.location = window.location.href;
            }else{            
              //alert(response[0]['totalcount']);
            }           
            //alert(prev_[0]['amount']);
          }
        });
        }
        setInterval('depositRefresh()', 3000);
        
    </script> -->
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
                    <h2>List of Fights</h2>                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">                    
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Fight #</th>
                          <th>Meron</th>
                          <th>Wala</th>
                          <th>Status</th>
                          <th>Action</th>                          
                        </tr>
                      </thead>                      
                      <tbody>
                        <?php
                        
                        foreach($items as $item){
                            echo "<tr>";
                                echo "<td>#$item[fight_no]</td>";
                                echo "<td>$item[fullname]</td>";
                                echo "<td>$item[refno]</td>";
                                echo "<td align='right'>".number_format($item['amount'],2)."</td>";
                                ?>
                                <td width="20%">
                                    <a href="<?=base_url('approve_deposit/'.$item['refno']);?>" class="btn btn-success" onclick="return confirm('Do you wish to approve this deposit request?'); return false;">Approved</a>
                                    <a href="<?=base_url('cancel_deposit/'.$item['refno']);?>" class="btn btn-danger" onclick="return confirm('Do you wish to cancel this deposit request?'); return false;">Cancel</a>
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