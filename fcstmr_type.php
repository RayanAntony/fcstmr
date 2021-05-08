<?php 
session_start();
if(!empty($_SESSION['user_id'])) {
    include_once('include/header.php');
    ?>
    <a href="action.php?action=logout" class="pull-right"><i class="fa fa-sign-out"></i> Logout</a><br>
    <div class="container">
     <div class="col-sm-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="card-title">FCSTMR Types List</h5>
                </div>
                <div class="col-sm-6">
                    <button type="button" class="btn btn-primary pull-right" data-toggle="modal" onclick="generateFcstmrForm();">
                      <i class="fa fa-plus-circle"></i> Add
                  </button>
              </div>
          </div><br>
          <div class="table-responsive">
              <table id="fcstmr_type_list" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Magento ID</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Magento ID</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
</div>
</div>
<p class="pull-right">&copy; <?php echo date('Y'); ?> - V1.0</p>
<?php 
include_once('include/footer.php'); 
}
else{
    header("Location:index.php");
}?>