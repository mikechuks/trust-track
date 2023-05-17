<?= $this->extend("layout/baseDashboard") ?>
<?= $this->section("body-dashboard") ?>
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="card">
                <div class="card-body">
                  <h4 class="card-title">User</h4>
                  <form class="form-sample" action="<?= base_url('settings') ?>" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="user-id" value="<?= $user_records['user_id'] ?>" />
                  <?php if(isset($validation)):?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <div class="alert-icon contrast-alert">
                                <i class="fa fa-times"></i>
                            </div>
                            <div class="alert-message">
                                <?= $validation->listErrors() ?></div>
                        </div>
                        <?php endif;?> 
                        <?php if(session()->getFlashdata('errormessage')):?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <div class="alert-icon contrast-alert">
                                <i class="fa fa-times"></i>
                            </div>
                            <div class="alert-message"><?= session()->getFlashdata('errormessage') ?></div>
                        </div>
               <?php endif;?>
               
                    <p class="card-description">
                      Update User
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="name">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">email</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" name="email">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">New password</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" name="password">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">address</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" name="address">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">city</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" name="city">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">state</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" name="state">
                          </div>
                        </div>
                      </div>
                    </div>
                    <input type="submit" class="btn btn-primary mr-2" name="upadte-user" />
                  </form>
                </div>
              </div>
            </div>
        <!-- content-wrapper ends -->
<?= $this->endSection() ?>