        
            <!-- Layout Begin -->
    <?= $this->extend('layouts/adminLayout') ?>
   
    <?= $this->section('content') ?>

            <!-- Main Container -->
            <div class="content-page">

                <!-- Display flash message here -->
                        <?php if (session()->getFlashdata('success_message')) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('success_message'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                        <?php elseif(session()->getFlashdata('error_message')): ?>

                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <?= session()->getFlashdata('error_message'); ?>
                            </div>

                        <?php endif; ?>
                        <!-- end of display flash message -->

                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <div class="row mt-3 mb-3">
                            
                                <div class="col-sm-12 col-md-6"> 
                                    <h3 class="mt-0 text-secondary"><?= $page_title ?></h3>
                                </div>

                                <!-- <div class="col-sm-12 col-md-6">
                                    <button class="btn btn-dark waves-effect waves-light float-right" data-toggle="modal" data-target="#staticBackdrop">
                                        <i class="mdi mdi-account-plus"></i> 
                                        <span>Add Staff</span> 
                                    </button>
                                </div> -->
                            
                        </div>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="card-box">
                                            <h4 class="mt-0 header-title">ADD NEW BRAND</h4>
                                            
                                            <form action="/catalogue/category/new" method="POST" id="classform" class="form-horizontal" role="form">
                                                <div class="form-group">
                                                    <label for="class">Name</label>
                                                    <small class="req">*</small>
                                                    <input name="brand" type="text" class="form-control" id="brand" placeholder="Brand / Manufacturer's name" required="">
                                                </div>
                                                
                                                <div class="form-group">
                                                    <h4 class="header-title mt-1 mb-3 text-center">Profile Picture</h4>
                                                    <span id="img_err" class="text-danger text-center"></span>
                                                    <input name="img" type="file" class="dropify" data-max-file-size="1M" />
                                                </div>

                                                <!-- <input type="hidden" name="new-class"> -->
                                                <div class="form-group mb-0 justify-content-end row">
                                                    <div class="col-sm-12">
                                                        <button name="new-category" value="1" type="submit" class="btn btn-success waves-effect waves-light">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>  <!-- card-box  -->
                                    </div>  <!-- col-md-6  -->

                                </div>  <!-- row  -->

                            </div>  <!-- col-md-12  -->

                            <div class="col-md-12 col-sm-12">
                                <div class="card-box">
                                    <h4 class="mt-0 header-title">BRAND</h4>
                                    <div class="table-responsive">
                                        <table id="datatable-buttons" class="table table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>BRAND</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $cnt = 1;
                                                foreach ($categories as $category): ?>
                                                    <tr>
                                                        <th scope="row"><?= $cnt ?></th>
                                                        <td style="text-transform: uppercase;"><?= $category['name'] ?></td>
                                                        <?php if ( $category['parent']>0): ?>
                                                        	<?= $category['parent_category'] ?>
                                                        <?php else: ?>
                                                        <td> --- </td>
                                                        <?php endif ?>
                                                        <td>

                                                            <a href="/admin/catalogue/categories/edit/<?= $category['id'] ?>" class="btn btn-sm waves-effect btn-warning" title="edit class"> <i class="dripicons-document-edit"></i> </a>

                                                            <a href="/admin/catalogue/category/delete/<?= $category['id'] ?>" onclick="return confirm('Do you want to delete this Category ?');" class="btn btn-danger btn-sm waves-effect" title="delete">
                                                                <i class="dripicons-trash"></i>
                                                            </a>
                                                        </td>

                                                    </tr>

                                                <?php $cnt++;
                                                 endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- end row -->          
                                
                        
                    </div> <!-- container-fluid -->

                </div> <!-- content -->

     <?= $this->endSection() ?>
     
            
