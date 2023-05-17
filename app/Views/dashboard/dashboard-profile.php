<?= $this->extend("layout/baseDashboard") ?>
<?= $this->section("body-dashboard") ?>
<?php helper(['UserName','CatName','Email','Price','ProId','ProName','State']); ?>

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Welcome  <?php echo $user_records["name"]; ?></h3>
                  <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                     <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                      <a class="dropdown-item" href="#">January - March</a>
                      <a class="dropdown-item" href="#">March - June</a>
                      <a class="dropdown-item" href="#">June - August</a>
                      <a class="dropdown-item" href="#">August - November</a>
                    </div>
                  </div>
                 </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img src="<?php echo base_url() ?>/assets/images/dashboard/people.svg" alt="people">
                  <div class="weather-info">
                    <div class="d-flex">
                      <div>
                        <h2 class="mb-0 font-weight-normal"><i>&#8358;</i>0.00</h2>
                      </div>
                      <div class="ml-2">
                        <h4 class="location font-weight-normal">Nigeria</h4>
                        <h6 class="font-weight-normal">Lagos</h6>
                        <button type="button" class="payment-btn btn btn-success">Add Cash</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">No Of Transactions Pending </p>
                      <p class="fs-30 mb-2">
                        <?php
                        if($trans_pend_list)
                        $count="";
                        $completePending ="";
                        {
                            foreach($trans_pend_list as $category_List)
                            {   
                            if($category_List['status'] == 0){
                              $completePending = $count++;
                            }else{
                              $completePending = 0;
                            } 
                            }
                            echo $completePending;
                        }

                        ?></p>
                      <p>10.00% (30 days)</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">No Of Transactions Completed</p>
                      <p class="fs-30 mb-2">
                         <?php
                        if($trans_com_list)
                        $count="";
                        $completePending ="";
                        {
                            foreach($trans_com_list as $category_List)
                            {   
                            if($category_List['status'] == 1){
                              $completePending = $count++;
                            }else{
                              $completePending = 0;
                            } 
                            }
                            echo $completePending;
                        }

                        ?></p>
                      <p>22.00% (30 days)</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">No Of Orders</p>
                      <p class="fs-30 mb-2">
                      <?php
                        if($income_list)
                        $count="";
                        $completePending ="";
                        {
                            foreach($income_list as $category_List)
                            {   
                            if($category_List['status'] == 1 OR $category_List['status'] == 0){
                              $completePending = $count++;
                            }else{
                              $completePending = 0;
                            } 
                            }
                            echo $completePending;
                        }

                        ?>
                      </p>
                      <p>2.00% (30 days)</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">No Of Transactions</p>
                      <p class="fs-30 mb-2">
                      <?php
                        if($income_list)
                        $count="";
                        $completePending ="";
                        {
                            foreach($income_list as $category_List)
                            {   
                            if($category_List['status'] == 1 OR $category_List['status'] == 0){
                              $completePending = $count++;
                            }else{
                              $completePending = 0;
                            } 
                            }
                            echo $completePending;
                        }

                        ?>
                      </p>
                      <p>0.22% (30 days)</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Advanced Table</p>
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="lang_file" class="display expandable-table" style="width:100%">
                          <thead>
                            <tr>
                              <th>S/N</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>State</th>
                              <th>Product Nmae</th>
                              <th>Product Id</th>
                              <th>Price</th>
                              <th>Date Purchased</th>
                              <th>status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                        if($income_list)
                        $count="";
                        $completePending ="";
                        {
                            foreach($income_list as $category_List)
                            {   
                            if($category_List['status'] == 1){
                               $completePending = 'complete';
                            }else{
                              $completePending = 'pending';
                            } 
                              echo ' 
                              <tr>
                              <td>'.$count.'</td>
                              <td>'.getUserName($category_List['name_id']).'</td>
                              <td>'.getEmail($category_List['email_id']).'</td>
                              <td>'.getState($category_List['state_id']).'</td>
                              <td>'.getProName($category_List['product_name']).'</td>
                              <td>'.getProId($category_List['product_id']).'</td>
                              <td>'.getPrice($category_List['price']).'</td>
                              <td>'.$category_List['date_created'].'</td>
                              <td>'.$completePending.'</td>
                            </tr>';
                            $count++;
                            }
                        }

                        ?>
                          </tbody>
                      </table>
                      </div>
                    </div>
                  </div>
                  </div>
                </div>

                
              </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
<?= $this->endSection() ?>