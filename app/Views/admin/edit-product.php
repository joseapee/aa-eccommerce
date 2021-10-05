        
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
                        <form action="/admin/catalogue/products/edit/" method="POST" id="" enctype="multipart/form-data">
                            <div class="row mt-3 mb-3">
                                
                                    <div class="col-sm-12 col-md-6"> 
                                        <h3 class="mt-0 text-secondary"><?= $page_title ?></h3>
                                    </div>

                                    <div class="col-sm-12 col-md-6">
                                        <button name="submit" value="1" type="submit" class="btn btn-success waves-effect waves-light float-right">Save <i class="fas fa-plus"></i></button>    
                                   </div>
                                
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card-box">
                                        <!-- <h4 class="mt-0 header-title">ADD NEW PRODUCT</h4> -->
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="class">Product Name</label>
                                                <small class="req">*</small>
                                                <input name="name" type="text" class="form-control" id="name" placeholder="Product name"
                                                value="<?= $product['name'] ?>" 
                                                required="">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="class">Price (&#8358;)</label>
                                                <small class="req">*</small>
                                                <input name="price" type="text" class="form-control" id="price" placeholder="E.g. 1000" 
                                                value="<?= $product['price'] ?>"
                                                required="">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="class">Product Type</label>
                                                <small class="req">*</small>
                                                <select name="product-type" class="form-control" required="">
                                                    <option 
                                                    <?php if ($product['product_type'] == 'ready-wear'): ?>
                                                        selected="" 
                                                    <?php endif ?>
                                                    value="ready-wear">Ready to Wear</option>
                                                    <option 
                                                    <?php if ($product['product_type'] == 'pre-order'): ?>
                                                        selected="" 
                                                    <?php endif ?>
                                                    value="pre-order">Pre Order</option>
                                                </select>
                                            </div>
                                        </div>



                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="control-label">Quantity</label>
                                                <small class="req">*</small>
                                                <input name="quantity" class="vertical-spin"type="text" 
                                                value="<?= $product['quantity'] ?>"
                                                required
                                                >
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="class">Weight (Kg)</label>
                                                <small class="req">*</small>
                                                <input name="weight" type="text" class="form-control" id="weight" placeholder="Product weight in kg" 
                                                value="<?= $product['weight'] ?>"
                                                required="">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="class">Stock Status</label>
                                                <small class="req">*</small>
                                                <select name="stock-status" class="form-control" required="">
                                                    <option
                                                    <?php if ($product['stock_status'] == 1): ?>
                                                        selected="" 
                                                    <?php endif ?>
                                                     value="1">In Stock</option>

                                                    <option 
                                                    <?php if ($product['stock_status'] == 0): ?>
                                                        selected="" 
                                                    <?php endif ?>
                                                    value="0">Out of Stock</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="class">Gender</label>
                                                <small class="req">*</small>
                                                <select name="gender" class="form-control" required="">
                                                    <option
                                                     <?php if ($product['gender'] == 'male'): ?>
                                                        selected="" 
                                                    <?php endif ?>
                                                     value="male">Male</option>

                                                    <option
                                                    <?php if ($product['gender'] == 'female'): ?>
                                                        selected="" 
                                                    <?php endif ?>
                                                     value="female">Female</option>

                                                    <option
                                                    <?php if ($product['gender'] == 'unisex'): ?>
                                                        selected="" 
                                                    <?php endif ?> 
                                                    value="unisex">Unisex</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="category">Category</label>
                                                <small class="req">*</small>

                                                <select name="category" class="form-control select2" required="">
                                                    <span id="role_err" class="text-danger"></span>

                                                    <option value="">Select</option>
                                                    <optgroup label="Main Category">

                                                    <?php foreach ($categories as $category): ?>

                                                        <option
                                                        <?php if ($product['category_id'] == $category['id']): ?>
                                                        selected="" 
                                                        <?php endif ?>

                                                        value="<?= $category['id'] ?>"><?= ucfirst($category['name']) ?>
                                                        </option>
                                                    <?php endforeach ?>  
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div> 

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="brand">Brand</label>
                                                <small class="req">*</small>

                                                <select name="brand" class="form-control select2" required="">
                                                    <span id="role_err" class="text-danger"></span>

                                                    <option value="">Select</option>
                                                    <optgroup label="Product Brand">

                                                    <?php foreach ($brands as $brand): ?>

                                                        <option
                                                        <?php if ($product['brand_id'] == $brand['id']): ?>
                                                        selected="" 
                                                    <?php endif ?>
                                                         value="<?= $brand['id'] ?>"><?= ucfirst($brand['name']) ?>
                                                        </option>
                                                    <?php endforeach ?>  
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="class">Discount(%)</label>
                                                <!-- <small class="req">*</small> -->
                                                <input class="form-control" type="text" name="discount"
                                                value="<?= $product['discount'] ?>"
                                                >
                                            </div>
                                        </div>
                                        

                                    </div>  <!-- card-box  -->
                                </div>  <!-- col-md-6  -->


                                <div class="col-lg-6">
                                    <div class="card-box">
                                        <!-- <h4 class="mt-0 header-title">ADD NEW PRODUCT</h4> -->
                                        <div class="row">

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="class">Description</label>
                                                    <!-- <small class="req">*</small> -->
                                                    <textarea name="description" class="form-control" rows="5" id="example-textarea"><?= $product['description'] ?></textarea>

                                                </div>
                                            </div> 

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="class">Sizes (Enter multiple sizes seperated by a comma)</label>
                                                    <small class="req">*</small>
                                                   <input name="sizes" type="text" data-role="tagsinput" class="form-control" id="sizes" placeholder="Seperate sizes with Comma" required="" 
                                                   value='
                                                   <?php foreach ($product['sizes'] as $size)
                                                   {
                                                    echo $size['size'].",";
                                                   } ?>

                                                   '>

                                                </div>
                                            </div> 

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Color</label>
                                                    <input type="color" name="color" class="form-control" value="<?= $product['color'] ?>">
                                                    <!-- <div data-color-format="rgb" data-color="#000" class="colorpicker-default input-group">
                                                        <input type="text" readonly="readonly" value="" class="form-control">
                                                        <span class="input-group-append add-on">
                                                            <button class="btn btn-light" type="button">
                                                            <i style="background-color: #111;margin-top: 2px;"></i>
                                                        </button>
                                                        </span>
                                                    </div> -->
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="class">Meta Tag Title</label>
                                                    <!-- <small class="req">*</small> -->
                                                    <input name="meta-tag-title" type="text" class="form-control" id="" placeholder="Meta Tag title"
                                                    value="<?= $product['meta_tag_title'] ?>">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="class">Meta Tag Keywords</label>
                                                    <!-- <small class="req">*</small> -->
                                                    <input name="meta-tag-keywords" value="<?= $product['meta_tag_keywords'] ?>" data-role="tagsinput" type="text" class="form-control" id="category" placeholder="Separate Keywords with comma">
                                                </div>
                                            </div> 

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="class">Meta Tag Description</label>
                                                    <!-- <small class="req">*</small> -->
                                                    <textarea name="meta-tag-description" class="form-control" rows="5" id="example-textarea"><?= $product['meta_tag_description'] ?></textarea>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="row">
                                                    <?php $cnt = 1;
                                                     foreach ($product['images'] as $image): 
                                                        ?>

                                                    <div class="form-group">
                                                        <h4 class="header-title mt-0 mb-3">Change Image <?= $cnt?></h4>

                                                        <div class="radio radio-success form-check-inline">
                                                            <input
                                                            <?php if ($image['main'] = 1 ): ?>
                                                                checked
                                                            <?php endif ?>
                                                             type="radio" id="inlineRadio<?= $cnt ?>" value="<?= $image['id'] ?>" name="main-image">
                                                            <label for="inlineRadio<?= $cnt ?>"> Main Image </label>
                                                        </div>

                                                        <input name="img-<?= $image['id'] ?>" type="file" class="dropify" data-default-file="/uploads/products/thumbs/thumb_<?= $image['image'] ?>"  />

                                                    </div>
                                                        
                                                    <?php 
                                                    $cnt++;
                                                    endforeach ?>
                                                    

                                                </div>
                                                    
                                            </div>

                                        </div>
                                    </div> <!--  card box end  -->
                                </div>
                                    <!-- end second group -->

                            </div>  <!-- row  -->
                        </form>

                    </div>
                    <!-- end row -->          
                                    
                </div> <!-- container-fluid -->

            </div> <!-- content -->

     <?= $this->endSection() ?>
     
            
