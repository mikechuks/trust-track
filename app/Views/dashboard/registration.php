<?= $this->extend("layout/base") ?>
<?= $this->section("body-content") ?>
<!-- inner page section -->
      <section class="inner_page_head">
         <div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <h3>Sign Up</h3>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end inner page section -->
      <!-- client section -->
      <section class="client_section layout_padding">
      <div class="container">
         
         <div class="row">
            <div class="col-lg-8 offset-lg-2">
               <div class="full">
                  <form action="<?= base_url('register') ?>" method="post">
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
                     <fieldset>
                        <input type="text" placeholder="Enter your full name" name="name" value="<?= set_value('name') ?>" />
                        <input type="email" placeholder="Enter your email address" name="email" value="<?= set_value('email') ?>" />
                        <input type="password" placeholder="Enter your password" name="password" value="<?= set_value('password') ?>" />
                        <input type="password" placeholder="Enter confirmation password" name="con-pass" value="<?= set_value('con-pass') ?>"/>
                        <input type="text" placeholder="Enter your address" name="address" value="<?= set_value('address') ?>" />
                        <input type="text" placeholder="Enter your city" name="city" value="<?= set_value('city') ?>" />
                        <input type="text" placeholder="Enter your state" name="state" value="<?= set_value('state') ?>" />
                        <input type="text" placeholder="Enter zip code" name="zip" value="<?= set_value('zip') ?>" />
                        <input type="submit" value="Submit" name="submitReg"/>
                     </fieldset>
                  </form>
               </div>
            </div>
         </div>
      </div>
      </section>
      <!-- end client section -->
      <?= $this->endSection() ?>