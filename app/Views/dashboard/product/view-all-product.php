<?= $this->extend("layout/baseDashboard") ?>
<?= $this->section("body-dashboard") ?>
      <div class="main-panel">
        <div class="content-wrapper">
        <section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
               <?php if(session()->getFlashdata('errormessage')):?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <div class="alert-icon contrast-alert">
                                <i class="fa fa-times"></i>
                            </div>
                            <div class="alert-message"><?= session()->getFlashdata('errormessage') ?></div>
                        </div>
               <?php endif;?>
               <?php if(session()->getFlashdata('sucmessage')):?>
               <div class="alert alert-danger alert-dismissible" role="alert">
                     <button type="button" class="close" data-dismiss="alert" name="addToCart">×</button>
                     <div class="alert-icon contrast-alert">
                        <i class="fa fa-times"></i>
                     </div>
                     <div class="alert-message"><?= session()->getFlashdata('sucmessage') ?></div>
               </div>
               <?php endif;?>
            </div>
            <div class="row">
            <?php
                        if($cat_pro_records)
                        {
                           $items = [];
                            foreach($cat_pro_records as $category_List)
                            {
                            $items[] = '
                            <div class="col-sm-6 col-md-4 col-lg-3">
                              <div class="box">
                                 <div class="option_container">
                                    <div class="options">
                                    <form method="post">
                                    <input type="hidden" name="income-id" value="'. $category_List['product_id'] .'" />
                                       <input type="submit" style="border-radius:30px; width:10em; height:40px;" value="Add To Cart" name="addToCart" formaction="'.base_url('view-all-product/'.$category_List['personal_id'].'/'.$category_List['category_id']).'" class="option1" />
                                    </form>
                                    <a href="'.base_url('view-specific-product/'.$category_List['personal_id'].'/'.$category_List['rand_pro']).'" class="option2">
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
                     <script>
                     /*function showData(a,b){
                          if(a == 12){
                           alert("Noting daey") ;  
                           }else{
                              var xmlhttp = new XMLHttpRequest();
                              xmlhttp.onreadystatechange = function(){
                              if(this.readyState == 4 && this.status == 200){
                                 document.getElementById("change").innerHTML= this.responseText; 
                              }
                              };
                              xmlhttp.open("Get", "<?php echo base_url() ?>view-all-product/"+ a +"/"+ b, true);
                              xmlhttp.send();
                           }
                        }*/
                        </script>
         </div>
      </section>
</div>
            <!-- content-wrapper ends -->
<?= $this->endSection() ?>