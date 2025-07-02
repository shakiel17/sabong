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
            if($item){
                $id=$item['id'];
                $link=$item['video_link'];
            }else{
                $id="";
                $link="";
            }
            ?>
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Video Manager</h2>     
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a href="#" class="btn btn-primary btn-sm text-white btn-round editVideo" data-toggle="modal" data-target="#ManageVideo" data-id="<?=$id;?>"><i class="fa fa-edit"></i> Update Video Link</a></li>
                    </ul>               
                    <div class="clearfix"></div>                    
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <iframe width="100%" height="500" src="<?=$link;?>?autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> 
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