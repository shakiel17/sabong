<div class="modal fade" id="NewUser" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel2">User Manager</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
        </div>
        <form action="<?=base_url('save_user_account');?>" method="POST">
            <input type="hidden" name="userid" id="user_id">
            <div class="modal-body">
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" class="form-control" name="fullname" required id="user_fullname">
                </div>
                <div class="form-group">
                    <label>Designation</label>
                    <select name="designation" class="form-control" required id="user_role">
                        <option value="Cashier">Cashier</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" id="user_name">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" id="user_password">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        </div>
    </div>
</div>

<div class="modal fade" id="ChangePassword" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel2">Password Manager</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
        </div>
        <form action="<?=base_url('change_password');?>" method="POST">
            <input type="hidden" name="username" value="<?=$this->session->username;?>">
            <div class="modal-body">                
                <div class="form-group">
                    <label>Current Password</label>
                    <input type="password" class="form-control" name="oldpassword">
                </div>
                <div class="form-group">
                    <label>New Password</label>
                    <input type="password" class="form-control" name="newpassword">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        </div>
    </div>
</div>

<div class="modal fade" id="UserPassword" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel2">Password Manager</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
        </div>
        <form action="<?=base_url('change_user_password');?>" method="POST">
            <input type="hidden" name="customer_id" value="<?=$this->session->customer_id;?>">
            <div class="modal-body">                
                <div class="form-group">
                    <label>Current Password</label>
                    <input type="password" class="form-control" name="oldpassword">
                </div>
                <div class="form-group">
                    <label>New Password</label>
                    <input type="password" class="form-control" name="newpassword">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        </div>
    </div>
</div>

<div class="modal fade" id="ManageVideo" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel2">Manage Video Link</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
        </div>
        <form action="<?=base_url('save_video');?>" method="POST">
            <input type="hidden" name="id" id="video_id">
            <div class="modal-body">                
                <div class="form-group">
                    <label>Paste Video Link</label>
                    <input type="text" class="form-control" name="link">
                </div>                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        </div>
    </div>
</div>

<div class="modal fade" id="ManageManualBetAccount" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel2">Manage Bet Account</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
        </div>
        <form action="<?=base_url('save_manual_bet_account');?>" method="POST">
            <input type="hidden" name="id" id="manual_id">            
            <div class="modal-body">                
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="fullname" id="manual_name" required>
                </div>
                <div class="form-group">
                    <label>Amount</label>
                    <input type="text" class="form-control" name="amount" id="manual_amount" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        </div>
    </div>
</div>

<div class="modal fade" id="BetAmount" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel2">Manage Bet</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
        </div>
        <?php
        $datenow=date('Y-m-d');
        $fight=$this->Sabong_model->getActiveFight($datenow);
        if($fight){
            $fno=$fight['fight_no'];
            if($fight['status']=="open"){
                $allow="";
            }else{
                $allow="disabled";
            }
        }else{
            $fno="";
            $allow="disabled";
        }        
        ?>
        <form action="<?=base_url('submit_manual_bet');?>" method="POST">
            <input type="hidden" name="customer_id" id="customer_bet_id">            
            <div class="modal-body">  
                <div class="form-group">
                    <label>Fight No.: <?=$fno;?></label>                    
                    <input type="hidden" class="form-control" name="fight_no" value="<?=$fno;?>" required>
                </div>                              
                <div class="form-group">
                    <label>Amount</label>
                    <input type="text" class="form-control" name="amount" id="customer_bet_amount" required>
                </div>
                <div class="form-group">
                    <input type="submit" name="btnBet" class="btn btn-danger btn-lg" value="Bet Meron" style="width:47%" <?=$allow;?> id="btnBetMeron">
                    <input type="submit" name="btnBet" class="btn btn-primary btn-lg" value="Bet Wala" style="width:47%" <?=$allow;?> id="btnBetWala">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                
            </div>
        </form>
        </div>
    </div>
</div>

<div class="modal fade" id="ClaimAmount" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel2">Redeem Amount</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
        </div>
        <form action="<?=base_url('redeem_manual_bet_amount');?>" method="POST">
            <input type="hidden" name="customer_id" id="redeem_id">            
            <div class="modal-body">                
                <div class="form-group">
                    <label>Amount</label>
                    <input type="text" class="form-control" name="amount" id="redeem_amount" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        </div>
    </div>
</div>