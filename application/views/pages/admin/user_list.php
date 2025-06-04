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
                    <h2>List of Users</h2>     
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a href="#" class="btn btn-primary btn-sm text-white btn-round" data-toggle="modal" data-target="#NewUser"><i class="fa fa-plus"></i> New User</a></li>                                          
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
                          <th>#</th>
                          <th>Full Name</th>
                          <th>Account Balance</th>
                          <th>Username</th>
                          <th>Password</th>
                          <th>Action</th
                        </tr>
                      </thead>                      
                      <tbody>
                        <?php
                        $x=1;
                        foreach($items as $item){                            
                            echo "<tr>";
                                echo "<td>$x.</td>";
                                echo "<td>$item[fullname]</td>";
                                echo "<td align='right'>".number_format($item['amount'],2)."</td>";
                                echo "<td>$item[username]</td>";
                                echo "<td><input type='password' value='$item[password]' style='border:0;background:transparent;cursor: zoom-in;' readonly></td>";
                                ?>
                                <td width="20%" align="center"> 
                                    
                                </td>
                                <?php                            
                            echo "</tr>";
                            $x++;
                            
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