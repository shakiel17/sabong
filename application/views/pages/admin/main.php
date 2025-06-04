 <div class="right_col" role="main">
    <div class="row" style="display: inline-block;">
            <div class=" top_tiles" style="margin: 10px 0;">
              <div class="col-md-3 col-sm-3  tile">
                <span>Today's Fight</span>
                <h2><?=count($fight);?></h2>
                <span class="sparkline_one" style="height: 160px;">
                      <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                  </span>
              </div>
              <div class="col-md-3 col-sm-3  tile">
                <span>Today's Bet</span>
                <h2>
                  <?php
                  if($bet){
                    echo number_format($bet['totalbet'],2);
                  }else{
                    echo "0.00";
                  }
                  ?>
                </h2>
                <span class="sparkline_one" style="height: 160px;">
                      <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                  </span>
              </div>
              <div class="col-md-3 col-sm-3  tile">
                <span>Today's Deposits</span>
                <h2>
                  <?php
                  if($deposit){
                    echo number_format($deposit['totaldeposit'],2);
                  }else{
                    echo "0.00";
                  }
                  ?>
                </h2>
                <span class="sparkline_one" style="height: 160px;">
                      <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 125px;"></canvas>
                  </span> 
              </div>
              <div class="col-md-3 col-sm-3  tile">
                <span>Today's Withdrawal</span>
                <h2>
                  <?php
                  if($withdraw){
                    echo number_format($withdraw['totalwithdraw'],2);
                  }else{
                    echo "0.00";
                  }
                  ?>
                </h2>
                <span class="sparkline_one" style="height: 160px;">
                      <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                  </span>
              </div>
            </div>
    </div>                           
 </div>
        <!-- /page content -->