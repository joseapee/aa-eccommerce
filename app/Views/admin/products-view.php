        
            <!-- Layout Begin -->
            <?= $this->extend('layouts/adminLayout') ?>
   
   <?= $this->section('content') ?>

           <!-- Main Container -->
           <div class="content-page">
               <div class="content">
                <form method="post" action="/admin/catalogue/products/delete">
                   <!-- Start Content-->
                   <div class="container-fluid">

                       <!-- Display flash message here -->
                       <?php if (session()->getFlashdata('success_message')) : ?>
                           <div class="alert alert-success alert-dismissible fade show" role="alert">
                               <?= session()->getFlashdata('success_message'); ?>
                               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                           </div>
                       <?php elseif(session()->getFlashdata('error_message')): ?>
                           <div class="alert alert-danger alert-dismissible fade show" role="alert">
                               <?= session()->getFlashdata('success_message'); ?>
                               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                           </div>
                       <?php endif; ?>
                       <!-- end of display flash message -->

                       <div class="row mt-3 mb-3">
                           
                               <div class="col-sm-12 col-md-6"> 
                                   <h3 class="mt-0 text-secondary"><?= $page_title ?></h3>
                               </div>

                               <div class="col-sm-12 col-md-6">

                                    <button type="submit" name="delete"
                                      onclick="return confirm('Do you want to delete all this Products')"

                                     class="ml-3 btn btn-dark waves-effect waves-light float-right">
                                         <i class="mdi mdi-trash-can-outline"></i> 
                                         <span>Delete</span> 
                                     </button>

                                    <a href="/admin/catalogue/products/new" class="ml-3 btn btn-dark waves-effect waves-light float-right">
                                         <i class="mdi mdi-account-plus"></i> 
                                         <span>New Product</span> 
                                    </a>


                               </div>

                               <!-- <div class="col-sm-12 col-md-6">
                                   
                               </div> -->
                           
                       </div>

                       <div class="row">
                           <div class="col-12">
                               <div class="card-box">

                                   <table id="datatable-buttons" class="table table-striped table-bordered nowrap">
                                       <thead>
                                           <tr>
                                               <th>Image</th>
                                               <th>Product Name</th>
                                               <th>Price</th>
                                               <th>Quantity</th>
                                               <th>Stock Status</th>
                                               <th>Status</th>
                                               <th>Action</th>
                                           </tr>
                                       </thead>


                                       <tbody>
                                        <?php if ($products): ?>
                                          
                                           <?php foreach ($products as $product): ?>
                                               
                                           <tr>
                                               <td><img width="50" src="/uploads/products/thumbs/thumb_<?= $product['main_image'] ?>"></td>
                                               <td><?= $product['name'] ?></td>
                                               <td><?= $product['price'] ?></td>
                                               <td><?= $product['quantity'] ?></td>
                                               
                                              <?php if ($product['stock_status'] == 1): ?>
                                                <td>In Stock</td>
                                              <?php else: ?>
                                                <td>Out of Stock</td>
                                              <?php endif ?>

                                              <?php if ($product['status'] == 1): ?>
                                               <td>Active</td>
                                              <?php else: ?>
                                                <td>Disabled</td>
                                              <?php endif ?>


                                               <td width="2">
                                                   <div class="dropdown float-right">
                                                       <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                                           <i class="mdi mdi-dots-vertical text-info"></i>
                                                       </a>

                                                       <div class="dropdown-menu dropdown-menu-right">
                                                           <!-- item-->
                                                           <a href="/admin/catalogue/products/edit/<?= $product['id'] ?>" class="dropdown-item">Edit</a>
                                                           <!-- item-->
                                                           <a 
                                                            href="/admin/catalogue/products/delete/<?= $product['id'] ?>" class="dropdown-item"
                                                            onclick="return confirm('Do you want to delete this Product?');"
                                                            >Delete</a>

                                                           <!-- item-->

                                                           <?php if ($product['status'] == 1): ?>
                                                              <a href="/admin/catalogue/products/deactivate/<?= $product['id'] ?>" 
                                                            class="dropdown-item"
                                                            onclick="return confirm('Do you want to deactivate this Product?');"
                                                           >Deactivate</a>
                                                          <?php else: ?>
                                                            
                                                            <a href="/admin/catalogue/products/activate/<?= $product['id'] ?>" 
                                                            class="dropdown-item"
                                                            onclick="return confirm('Do you want to activate this Product?');"
                                                           >Activate</a>
                                                          <?php endif ?>
                                                           
                                                       </div>
                                                   </div>
                                               </td>
                                           </tr>
                                           <?php endforeach ?>
                                           <?php endif ?>
                                       </tbody>
                                   </table>
                               </div>
                           </div>
                       </div>
                       <!-- end row -->
                       
                   </div> <!-- container-fluid -->
                  </form>
               </div> <!-- content -->

    <?= $this->endSection() ?>
    
           
