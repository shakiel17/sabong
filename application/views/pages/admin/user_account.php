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
                          <th>Designation</th>
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
                                echo "<td>$item[role]</td>";
                                echo "<td>$item[username]</td>";
                                echo "<td><input type='text' value='$item[password]' style='border:0;background:transparent;cursor: zoom-in;' readonly></td>";
                                ?>
                                <td width="20%" align="center"> 
                                    <a href="#" class="btn btn-warning btn-sm btn-round editUser" data-toggle="modal" data-target="#NewUser" data-id="<?=$item['id'];?>_<?=$item['fullname'];?>_<?=$item['role'];?>_<?=$item['username'];?>_<?=$item['password'];?>"><i class="fa fa-edit"></i> Edit</a>
                                    <a href="<?=base_url('delete_user_account/'.$item['id']);?>" class="btn btn-danger btn-sm btn-round" onclick="return confirm('Do you wish to delete this user account?'); return false;"><i class="fa fa-trash"></i> Delete</a>
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