<!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <img src="<?=base_url('design/assets/production/images/img.jpg');?>" alt=""><?=$this->session->fullname;?>
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item"  href="javascript:;"> Profile</a>
                        <a class="dropdown-item"  href="javascript:;">
                          <span class="badge bg-red pull-right">50%</span>
                          <span>Settings</span>
                        </a>
                    <a class="dropdown-item"  href="javascript:;">Help</a>
                      <a class="dropdown-item"  href="<?=base_url('logout');?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                  </li>
  
                  <li role="presentation" class="nav-item dropdown open">
                    <a href="javascript:;" class="info-number">
                      <i class="fa fa-rub"></i> 0.00
                    </a>
                    <a href="javascript:;" class="info-number" title="Deposit">
                      <i class="fa fa-credit-card"></i>                      
                    </a>
                    <a href="javascript:;" class="info-number" title="Withdraw">
                      <i class="fa fa-database"></i>                      
                    </a>                    
                  </li>
                </ul>
              </nav>
            </div>
          </div>