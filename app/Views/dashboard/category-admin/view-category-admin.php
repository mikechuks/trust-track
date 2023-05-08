<?php helper(['UserName']); ?>
<?= $this->extend("layout/baseDashboardAdmin") ?>
<?= $this->section("body-dashboard") ?>
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="col-12">
        <div class="card">
            <div class="card-body">

                <a class="btn btn-info mb-2 text-white mb-4" href=" "><i
                        class="fas fa-plus"></i>&nbsp; Add
                    New Batch</a>
                <div class="table-responsive">
                    <table id="lang_file" class="table table-striped table-bordered display" style="width:100%">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Category Name</th>
                                <th>Created_by</th>                                
                                <th>Date Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                                $count = 1;
                        if($category_records)
                        {
                            foreach($category_records as $category_List)
                            {
                              echo '<tr>
                                     <td>'.$count.'</td>
                                    <td>'.$category_List["category_name"].'</td>
                                    <td>'.getUserName($category_List["personal_id"]).'</td>
                                    <td>'.$category_List["date_created"].'</td>
                                    <td>

                                    <div class="btn-group">
                                    <button type="button" class="btn btn-dark dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="ti-settings"></i>
                                    </button>
                                    <div class="dropdown-menu"
                                        x-placement="bottom-start"
                                        style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 35px, 0px);">
                                        <a class="dropdown-item" href="'.base_url('edit-category-admin/'.$category_List["category_id"]).'"><i
                                                class="ti-pencil-alt"></i> Edit</a>                                                           
                                    </div>
                                </div>
                        
                        </td>
                    </tr>';
                                    $count++;
                            }
                        }

                        ?>
                        </tbody>
                        <tfoot>
                            <tr>
                            <th>S/N</th>
                                <th>Category Name</th>
                                <th>Created_by</th>        
                                <th>Date Created</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
            <!-- content-wrapper ends -->
<?= $this->endSection() ?>