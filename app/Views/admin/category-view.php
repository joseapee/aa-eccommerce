        
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

                                <div class="col-sm-12 col-md-6">
                                    <button class="btn btn-dark waves-effect waves-light float-right" data-toggle="modal" data-target="#staticBackdrop">
                                        <i class="mdi mdi-account-plus"></i> 
                                        <span>New Category</span> 
                                    </button>
                                </div>
                            
                        </div>


                            <div class="col-md-12 col-sm-12">
                                <div class="card-box">
                                    <h4 class="mt-0 header-title">CATGORIES</h4>
                                    <div class="table-responsive">
                                        <table id="datatable-buttons" class="table table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>IMAGE</th>
                                                    <th>CATEGORY</th>
                                                    <th>PARENT</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $cnt = 1;
                                                foreach ($categories as $category): ?>
                                                    <tr>
                                                        <th scope="row"><?= $cnt ?></th>

                                                        <td ><img width="100" src="/uploads/category/thumbs/thumb_<?= $category['image'] ?>"></td>

                                                        <td style="text-transform: uppercase;"><?= $category['name'] ?>
                                                            
                                                        </td>

                                                        <?php if ( $category['parent_id']>0): ?>
                                                        <td><?= strtoupper($category['parent_name']) ?>
                                                        </td>
                                                        <?php else: ?>
                                                         <td>--- </td>
                                                        <?php endif ?>

                                                        <td>

                                                            
                                                            <button title="edit category" class="btn btn-warning waves-effect waves-light float-right" data-toggle="modal" data-target="#staticBackdrop<?= $category['id'] ?>">
                                                                <i class="dripicons-document-edit"></i>
                                                            </button>

                                                            <!-- <a href="/admin/catalogue/category/delete/<?= $category['id'] ?>" onclick="return confirm('Do you want to delete this Category ?');" class="btn btn-danger btn-sm waves-effect" title="delete">
                                                                <i class="dripicons-trash"></i>
                                                            </a> -->
                                                        </td>

                                                    </tr>


                <!-- Edit Category Modal -->
                <div class="modal fade bs-example-modal-xl" id="staticBackdrop<?= $category['id'] ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-l" role="document">
                        <form action="/admin/catalogue/categories/edit/<?= $category['id'] ?>" method="POST" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-header custom-modal-title">
                                <h5 class="modal-title text-light" id="staticBackdropLabel">Edit Category</h5>
                                <button type="button" class="close btn btn-icon waves-effect waves-light btn-danger" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><i class="far fa-window-close"></i></span>
                                </button>
                            </div>
                            <div class="modal-body">
                                
                                <!-- Row -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Category Name</label>
                                            <small class="req">*</small>
                                            <input class="form-control" type="text" name="name" placeholder="category" value="<?= $category['name'] ?>">
                                            <span id="category_err" class="text-danger"></span>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                            <div class="form-group">
                                                <label for="parent">Parent</label>
                                                <small class="req">*</small>

                                                <select name="parent" class="form-control select2" required="">
                                                    <span id="role_err" class="text-danger"></span>

                                                    <option value="0">---</option>
                                                    <optgroup label="Main Category">

                                                    <?php foreach ($categories as $category2): ?>

                                                        <option

                                                        <?php if ($category2['id'] == $category['parent_id']): ?>
                                                            selected=""
                                                        <?php endif ?>

                                                         value="<?= $category2['id'] ?>"><?= ucfirst($category2['name']) ?>
                                                        </option>
                                                    <?php endforeach ?>  
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="row">

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <h4 class="header-title mt-0 mb-3">Change Image</h4>
                                                        <input name="img" type="file" class="dropify" data-default-file="/uploads/category/thumbs/thumb_<?= $category['image'] ?>"  />
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>  
                                    <!-- Row end -->

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button id="savebtn" type="submit" class="btn btn-primary">Save</button>
                                <div id="loading" class="hidden spinner-border text-info m-2" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- end new category -->


                                                <?php 
                                                    $cnt++;
                                                    endforeach 
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- end row -->          
                                
                        
                    </div> <!-- container-fluid -->

                </div> <!-- content -->




                <!-- New Category Modal -->
                <div class="modal fade bs-example-modal-xl" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-l" role="document">
                        <form action="/admin/catalogue/categories/new" method="POST" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-header custom-modal-title">
                                <h5 class="modal-title text-light" id="staticBackdropLabel">New Category</h5>
                                <button type="button" class="close btn btn-icon waves-effect waves-light btn-danger" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><i class="far fa-window-close"></i></span>
                                </button>
                            </div>
                            <div class="modal-body">
                                
                                <!-- Row -->
                                <div class="row">

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Category Name</label>
                                            <small class="req">*</small>
                                            <input class="form-control" type="text" name="name" placeholder="category" required="">
                                            <span id="category_err" class="text-danger"></span>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                            <div class="form-group">
                                                <label for="parent">Parent</label>
                                                <small class="req">*</small>

                                                <select name="parent" class="form-control select2">
                                                    <span id="role_err" class="text-danger"></span>

                                                    <option value="0">---</option>
                                                    <optgroup label="Main Category">

                                                    <?php foreach ($categories as $category): ?>

                                                        <option value="<?= $category['id'] ?>"><?= ucfirst($category['name']) ?>
                                                        </option>
                                                    <?php endforeach ?>  
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                        <div class="form-group">
                                            <label>Short Description</label>
                                            <!-- <small class="req">*</small> -->
                                            <textarea name="description" class="form-control" placeholder="50 characters maximum"></textarea>
                                            <span id="category_err" class="text-danger"></span>
                                        </div>
                                    </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="class">Image</label>
                                                <span id="img_err" class="text-danger text-center"></span>
                                                <input name="img" type="file" class="dropify" data-max-file-size="1M"/>
                                            </div>
                                        </div>

                                    </div>  
                                    <!-- Row end -->

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button id="savebtn" type="submit" class="btn btn-primary">Save</button>
                                <div id="loading" class="hidden spinner-border text-info m-2" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- end new category -->

     <?= $this->endSection() ?>
     
            
