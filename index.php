<?php
session_start();
include_once('include/header.php');
if (!empty($_SESSION['user_id'])) {
    header('location:fcstmr_type.php');
}
?>
<div class="login-form">
    <form>
        <h2 class="text-center">Sign in</h2>   
        <div class="form-group">
          <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <span class="fa fa-user"></span>
                    </span>                    
                </div>
                <input type="text" class="form-control" name="username" placeholder="Username" required="required">       
            </div>
        </div>
    <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fa fa-lock"></i>
                    </span>                    
                </div>
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">       
            </div>
        </div>        
        <div class="form-group">
            <button type="submit" name="submit" value="Submit" class="btn btn-primary login-btn btn-block"><i class="fa fa-sign-in"></i> Sign in</button>
        </div>
    </form>
    <p id="version-center">&copy; <?php echo date('Y');?> - V1.0</p>
</div>
 <?php include_once('include/footer.php'); ?>
