<!-- page content -->
        <?php
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
        ?>
        <div class="right_col" role="main">          
            <div class="row">
              <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Fight #<?=$fight['fight_no'];?></h2>
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
                  <div class="x_content">
                    <table width="100%" border="0">
                        <tr>
                            <td width="50%" align="center"><h3 style="font-size:2em;">MERON</h3></td>
                            <td width="50%" align="center"><h3 style="font-size:2em;">WALA</h3></td>
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
                            <td width="50%" align="center" style="font-size:1em;"><b>Odds: <?=$fight['odds_meron'];?></b></td>
                            <td width="50%" align="center" style="font-size:1em;"><b>Odds: <?=$fight['odds_wala'];?></b></td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>                        
                        </tr>
                        <tr>
                            <td width="50%" align="center"><a href="<?=base_url('fight_result/'.$fight['fight_no'].'/meron');?>" class="btn btn-primary btn-lg">Winner</a></td>
                            <td width="50%" align="center"><a href="<?=base_url('fight_result/'.$fight['fight_no'].'/wala');?>" class="btn btn-primary btn-lg">Winner</a></td>
                        </tr>                                              
                    </table>
                  </div>
                </div>
              </div>                                         
            </div>
          </div>
        </div>
        <!-- /page content -->