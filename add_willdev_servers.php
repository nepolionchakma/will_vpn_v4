<?php 
include('includes/header.php');
$is_edit = false;
$serverName =  "";
$flagURL =  "";
$ovpnConfiguration =  "";
$vpnUserName =  "";
$vpnPassword =  "";
$isFree =  "";
$id = 0;

if(isset($_GET['edit'])){
  $is_edit = true;
  $id = $_GET['edit'];
  $query = $DBcon->query("SELECT * FROM servers WHERE id='".$_GET['edit']."'");
  $row=$query->fetch_array();
  $count = $query->num_rows; 
  $serverName =  $row['serverName'];
  $flagURL =  $row['flagURL'];
  $ovpnConfiguration =  $row['ovpnConfiguration'];
  $vpnUserName =  $row['vpnUserName'];
  $vpnPassword =  $row['vpnPassword'];
  $isFree =  $row['isFree'];
}
?>
<body>
<div class="wrapper ">
    <?php include('includes/sidenav.php')?>
    <div class="main-panel">
      <!-- Navbar -->
      <?php include("includes/navbar.php")?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- Servers Table -->
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">List of Free Servers</h4>
                  <p class="card-category"> Server configuration information</p>
                </div>
                <div class="card-header card-header-primary">
<h4 class="card-title"><?php if($is_edit){ echo "Edit Server"; }else{ echo "Add Server"; }?></h4>
                </div>
                <div class="card-body">
                  <form method="POST" action="includes/routes.php">
                    <div class="row">

                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Server Name</label>
                          <input type="text" value="<?php echo $serverName; ?>" name="serverName" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Country Flag (URL)</label>
                          <input type="text" value="<?php echo $flagURL; ?>" name="flagURL" class="form-control">
                        </div>
                      </div>


                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">OVPN Configuration Scripts</label>
                          <textarea name="ovpn"  class="form-control"><?php echo $ovpnConfiguration; ?></textarea>
                        </div>
                      </div>


                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">VPN Username</label>
                          <input type="text"  value="<?php echo $vpnUserName; ?>"name="vpnUsername" class="form-control">
                        </div>
                      </div>


                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">VPN Password</label>
                          <input type="text"  value="<?php echo $vpnPassword; ?>" name="vpnPassword" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">VPN Type</label>
                            <select name="isFree" class="form-control">
                              <option value="free" <?php if($isFree==1){echo "selected";} ?>>Free User</option>
                              <option value="pro"  <?php if($isFree==0){echo "selected";} ?>>Pro User</option>
                            </select>
                        </div>
                      </div>
                      <input type="text" value="<?php echo $id; ?>" name="id" style="display:none" class="form-control">

                    </div>

                    <br>
                    <br>
                    <br>
                    <button type="submit" name="<?php if($is_edit){echo "editServer";}else{echo "addServer";}?>" class="btn btn-primary pull-right"><?php if($is_edit){echo "Submit";}else{echo "Submit";}?></button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
            
        </div>
      </div>
    <?php include('./includes/footer.php')?>
</body>

</html>