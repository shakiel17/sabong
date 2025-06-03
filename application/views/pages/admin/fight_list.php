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

            <?php
            $check=$this->Sabong_model->check_fight();
            if($check){
              $view="style='display:none;'";
            }else{
              $view="";
            }
            ?>
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>List of Fights <small><?=date('M d, Y');?></small></h2>     
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a href="<?=base_url('create_fight');?>" class="btn btn-primary btn-sm text-white btn-round" onclick="return confirm('Do you wish to create new fight?'); return false;" <?=$view;?>><i class="fa fa-plus"></i> New Fight</a></li>                                          
                    </ul>               
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
                          <th>Result</th>                          
                        </tr>
                      </thead>                      
                      <tbody>
                        <?php
                        
                        foreach($items as $item){
                            $query=$this->Sabong_model->getFightDetailsBySide('meron',$item['fight_no']);
                            $meron=0;
                            foreach($query as $row){
                              $meron += $row['amount'];
                            }
                            $query=$this->Sabong_model->getFightDetailsBySide('wala',$item['fight_no']);
                            $wala=0;
                            foreach($query as $row){
                              $wala += $row['amount'];
                            }
                            $fres=$this->Sabong_model->getFightResult($item['fight_no'],date('Y-m-d'));
                            echo "<tr>";
                                echo "<td>#$item[fight_no]</td>";
                                echo "<td align='right'>".number_format($meron,2)."</td>";
                                echo "<td align='right'>".number_format($wala,2)."</td>";
                                echo "<td align='center'>$item[status]</td>";
                                ?>
                                <td width="20%" align="center">
                                  <?=$fres['win_result'];?>
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