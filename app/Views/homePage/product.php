<?= $this->extend("layout/base") ?>
<?= $this->section("body-content") ?>
      <!-- inner page section -->
      <section class="inner_page_head">
         <div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <h3>Product Grid</h3>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end inner page section -->
      <!-- product section -->
      <section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
            </div>
            </div>
            <div class="row">
            <?php
                        if($cat_pro_records)
                        {  
                           $items = [];
                            foreach($cat_pro_records as $category_List)
                            {
                              $items[] =  ' 
                              <div class="col-sm-6 col-md-4 col-lg-3">
                              <div class="box">
                                 <div class="option_container">
                                    <div class="options">
                                    <a href="'.base_url('buy-now/'.$category_List['rand_pro']).'" class="option2">
                                    Buy Now
                                    </a>
                                    </div>
                                 </div>
                                 <div class="img-box">
                                    <img style="height: 10em; width: 300px;" src="/uploads/'.$category_List['image'].'" alt="">
                                 </div>
                                 <div class="detail-box">
                                    <h5>
                                       Mens Shirt
                                    </h5>
                                    <h6>
                                       $75
                                    </h6>
                                 </div>
                              </div>
                           </div>';
                            }
                            shuffle($items);
                            $randItems = array_slice($items, 0, 20);
                            foreach($randItems as $fewitems){
                             echo $fewitems;
                            }
                        }

                        ?>
            </div>
                   <div class="btn-box" id="change">
                        <a href="" onclick="showData(25,12)">
                        View More products
                     </a>
                  </div>
         </div>
      </section>
      <!-- end product section -->
      <?= $this->endSection() ?>