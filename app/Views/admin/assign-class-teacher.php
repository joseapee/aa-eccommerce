        
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
                            <div class="col-md-5">
                                <div class="card-box">
                                    <h4 class="mt-0 header-title">ADD NEW CLASS</h4>
                                    
                                    <form action="" method="POST" id="classform" class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <label for="class">Class</label>
                                            <small class="req">*</small>
                                            <input name="class" type="text" class="form-control" id="class" placeholder="Class" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="class">Sections</label>
                                            <small class="req">*</small>
                                            <?php foreach ($sections as $section): ?>
                                                <div class="checkbox checkbox-info">
                                                    <input name="sections[]" type="checkbox" id="inlineCheckbox<?= $section['id'] ?>" value="<?= $section['id'] ?>" value="<?= $section['id'] ?>">
                                                <label for="inlineCheckbox<?= $section['id'] ?>"> <?= strtoupper($section['section']) ?> </label>
                                            </div>
                                            <?php endforeach ?>
                                            
                                            
                                        </div>
                                        <!-- <input type="hidden" name="new-class"> -->
                                        <div class="form-group mb-0 justify-content-end row">
                                            <div class="col-sm-9">
                                                <button name="new-class" value="1" type="submit" class="btn btn-info waves-effect waves-light">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="card-box">
                                    <h4 class="mt-0 header-title">CLASSES</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>CLASS</th>
                                                    <th>SECTION</th>
                                                    <th>TEACHER</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $cnt = 1;
                                                foreach ($classes as $class): ?>
                                                    <tr>
                                                        <th scope="row"><?= $cnt ?></th>
                                                        <td style="text-transform: uppercase;"><?= $class['class'] ?></td>
                                                        <td><?= $class['section'] ?></td>
                                                        <td>@mdo</td>
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
     
            
