<?= $this->extend("layout/baseDashboardAdmin") ?>
<?= $this->section("body-dashboard") ?>
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Product</h4>
                  <form class="form-sample" action="<?= base_url('add-product-admin') ?>" method="post" enctype="multipart/form-data">
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
                      Add Product
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Product Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="p-name">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Amount</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="amount">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">quantity</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" name="quantity">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Details</label>
                          <div class="col-sm-9">
                          <textarea class="form-control" id="exampleTextarea1" rows="4" name="details"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Category</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="category-id">
                            <option value="" <?= set_select('category-product', ' ', true) ?>>Select Product</option>
                            <?php
                              if($category_product_records)
                              {

                                  foreach($category_product_records as $mortalityList)
                                  {

                                      echo ' <option value="'.$mortalityList["category_id"].'" '.set_select('category-product',$mortalityList["category_id"], true).'>'.$mortalityList["category_name"].'</option>';
                                  
                                  }
                              }
                            ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Image</label>
                          <div class="col-sm-9">
                          <input type="file" class="form-control" name="pro-image[]" multiple>
                          </div>
                        </div>
                      </div>
                    </div>
                    <input type="submit" class="btn btn-primary mr-2" name="add-product" />
                  </form>
                </div>
              </div>
            </div>
        <!-- content-wrapper ends -->
<?= $this->endSection() ?>