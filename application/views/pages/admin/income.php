
    <div class="right_col" role="main">                                 
            <div class="row">                
              <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Generate Income Summary</h2>                    
                    <div class="clearfix"></div>                    
                  </div>
                  <div class="x_content">       
                    <?=form_open(base_url('print_income'),array('target' => '_blank'));?>
                    <div class="form-group">
                        <label>Fight Date</label>
                        <input type="date" name="datearray" class="form-control" value="<?=date('Y-m-d');?>">
                    </div>
                    <div class="form-group">                        
                        <input type="submit" class="btn btn-primary" value="Generate Report">
                    </div>
                    <?=form_close();?>             
                  </div>
                </div>
              </div>                                         
            </div>
          </div>
        </div>
 
        <!-- /page content -->