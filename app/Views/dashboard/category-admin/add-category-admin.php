<?= $this->extend("layout/baseDashboardAdmin") ?>
<?= $this->section("body-dashboard") ?>
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Category</h4>
                  <form class="form-sample" action="<?= base_url('add-category-admin') ?>" method="post">
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
                     Add Category
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Category Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="c-name">
                          </div>
                        </div>
                      </div>
                    </div>
                    <input type="submit" class="btn btn-primary mr-2" name="add-category" />
                  </form>
                </div>
              </div>
            </div>
        <!-- content-wrapper ends -->
<?= $this->endSection() ?>