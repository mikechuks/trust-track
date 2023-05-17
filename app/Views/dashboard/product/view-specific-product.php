<?= $this->extend("layout/baseDashboard") ?>
<?= $this->section("body-dashboard") ?>
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card position-relative">
                <div class="card-body">
                  <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2" data-ride="carousel">
                    <div class="carousel-inner">
                    <?php
                        if($cat_pro_records)
                        {
                          $active = ""; 
                            foreach($cat_pro_records as $category_List)
                            {
                          if($category_List['count'] == 1){
                            $active = "active";
                          }else{
                            $active = "";
                          }
                              echo ' 
                      <div class="carousel-item '.$active.'">
                        <div class="row">
                          <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                            <div class="ml-xl-4 mt-3">
                            <p class="card-title">Product Details</p>
                              <h1 class="text-primary">'.$category_List['product_amount'].'</h1>
                              <h3 class="font-weight-500 mb-xl-4 text-primary">'.$category_List['product_name'].'</h3>
                              <p class="mb-2 mb-xl-0">'.$category_List['details'].'</p>
                            </div>  
                            </div>
                          <div class="col-md-12 col-xl-9">
                            <div class="row">
                              <div class="col-md-6 border-right">
                                <div class="table-responsive mb-3 mb-md-0 mt-3">
                                <div class="img-box">
                                    <img class="img-vol" src="/uploads/'.$category_List['image'].'" alt="">
                                </div>
                                </div>
                              </div>
                              <div class="col-md-6 mt-3"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                              <div class="template-demo mt-4 d-flex justify-content-center">
                                  <button type="button" class="btn btn-danger btn-lg">Add Cart</button>
                                  </div>
                                <div class="template-demo mt-4 d-flex justify-content-center">
                                  <button type="button" class="btn btn-success btn-lg">Buy Now</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      ';
                    }
                }

                ?>
                    </div>
                    <a class="carousel-control-prev" href="#detailedReports" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#detailedReports" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
</div>
            <!-- content-wrapper ends -->
<?= $this->endSection() ?>