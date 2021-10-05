        
            <!-- Layout Begin -->
    <?= $this->extend('layouts/adminLayout') ?>
   
    <?= $this->section('content') ?>

            <!-- Main Container -->
            <div class="content-page">
                <div class="content">

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
                                    <button class="btn btn-dark waves-effect waves-light float-right" data-toggle="modal" data-target="#staticBackdrop">
                                        <i class="mdi mdi-account-plus"></i> 
                                        <span>Add Staff</span> 
                                    </button>
                                </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">

                                    <table id="datatable-buttons" class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Staff ID</th>
                                                <th>Name</th>
                                                <th>Role</th>
                                                <th>Contact</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            <?php foreach ($staffs as $staff): ?>
                                                
                                            <tr>
                                                <td><img width="50" src="/uploads/imgs/thumbs/thumb_<?= $staff['image'] ?>"></td>
                                                <td><?= $staff['staff_id'] ?></td>
                                                <td><?= $staff['staff_name'] ?></td>
                                                <td><?= $staff['role_name'] ?></td>
                                                <td><?= $staff['phone_1'] ?></td>
                                                <td width="2">
                                                    <div class="dropdown float-right">
                                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                                            <i class="mdi mdi-dots-vertical text-info"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <!-- item-->
                                                            <button type="button" class="dropdown-item" data-toggle="modal" data-target="#viewProfile-<?= $staff['id'] ?>">View Profile</button>
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item">Delete</a>
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>


                                    <!-- View Staff data Modal -->
                                    <div class="modal fade" id="viewProfile-<?= $staff['id'] ?>" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="exampleModalScrollableTitle"><?= $staff['staff_name'] ?> Profile</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="row">
                                                        <div class="bg-picture card-box">
                                                            <div class="profile-info-name">
                                                                    <img src="/uploads/imgs/thumbs/thumb_<?= $staff['image'] ?>" class="rounded-circle avatar-xl img-thumbnail float-left mr-3" alt="profile-image">
                                                                    <h4 class="mb-2 text-capitalize">
                                                                        <?= $staff['role_name'] ?>
                                                                    </h4>
                                                                

                                                                <div class="profile-info-detail overflow-hidden">
                                                                    <!-- <h4 class="m-0 text-uppercase"><?= $staff['firstname'] ?></h4> -->

                                                                    <ul class="social-list list-inline mt-3 mb-0">
                                                                        <li class="list-inline-item">
                                                                            <a href="javascript: void(0);" class="social-list-item border-purple text-purple"><i class="mdi mdi-facebook"></i></a>
                                                                        </li>
                                                                        <li class="list-inline-item">
                                                                            <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                                                        </li>
                                                                        <li class="list-inline-item">
                                                                            <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                                                                        </li>
                                                                        <li class="list-inline-item">
                                                                            <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github"></i></a>
                                                                        </li>
                                                                    </ul>
                                
                                                                </div>

                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="row g-3 align-items-center">
                                                                <div class="col-md-3">
                                                                    <label for="inputPassword6" class="col-form-label">Staff ID</label>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <input readonly="" value="<?= $staff['staff_id'] ?>" type="text" class="form-control form-control-plaintext p-3 text-uppercase" >
                                                                </div>
                                                            </div>

                                                            <div class="row g-3 align-items-center">
                                                                <div class="col-md-3">
                                                                    <label for="inputPassword6" class="col-form-label">Staff Role</label>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <input readonly="" value="<?= $staff['role_name'] ?>" type="text" class="form-control form-control-plaintext p-3 text-uppercase" >
                                                                </div>
                                                            </div>

                                                            <div class="row g-3 align-items-center">
                                                                <div class="col-md-3">
                                                                    <label for="inputPassword6" class="col-form-label">Subject Handled</label>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <ul class="social-list list-inline mt-3 mb-0">
                                                                        <li class="list-inline-item">English</li>
                                                                        <li class="list-inline-item">Biology</li>
                                                                            
                                                                    </ul>
                                                                </div>
                                                            </div>

                                                            <div class="row g-3 align-items-center">
                                                                <div class="col-md-3">
                                                                    <label for="inputPassword6" class="col-form-label">Email</label>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <input readonly="" value="<?= $staff['email'] ?>" type="text" class="form-control form-control-plaintext p-3 text-uppercase" >
                                                                </div>
                                                            </div>

                                                            <div class="row g-3 align-items-center">
                                                                <div class="col-md-3">
                                                                    <label for="inputPassword6" class="col-form-label">Phone 1</label>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <input readonly="" value="<?= $staff['phone_1'] ?>" type="text" class="form-control form-control-plaintext p-3 text-uppercase" >
                                                                </div>
                                                            </div>
                                                            <div class="row g-3 align-items-center">
                                                                <div class="col-md-3">
                                                                    <label for="inputPassword6" class="col-form-label">Phone 2</label>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <input readonly="" value="<?= $staff['phone_2'] ?>" type="text" class="form-control form-control-plaintext p-3 text-uppercase" >
                                                                </div>
                                                            </div>
                                                            <div class="row g-3 align-items-center">
                                                                <div class="col-md-3">
                                                                    <label for="inputPassword6" class="col-form-label">Date Employed</label>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <input readonly="" value="<?= $staff['doe'] ?>" type="text" class="form-control form-control-plaintext p-3 text-uppercase" >
                                                                </div>
                                                            </div>

                                                        </div> <!-- col end -->

                                                    </div>  <!-- row end -->


                                                </div>  <!-- modal body end -->

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- View Staff data Modal End -->


                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                                <!-- Add new staff Modal -->
                                <div class="modal fade bs-example-modal-xl" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl" role="document">
                                        <form id="addstaff_form" method="POST" enctype="multipart/form-data">
                                        <div class="modal-content">
                                            <div class="modal-header custom-modal-title">
                                                <h5 class="modal-title text-light" id="staticBackdropLabel">Add New Staff</h5>
                                                <button type="button" class="close btn btn-icon waves-effect waves-light btn-danger" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true"><i class="far fa-window-close"></i></span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                
                                                <!-- Row -->
                                                <div class="row">

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Staff ID</label>
                                                            <!-- <small class="req">*</small> -->
                                                            <input class="form-control" type="text" name="staff_id" placeholder="Staff ID">
                                                            <span id="staffid_err" class="text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Email (Login Username)</label>
                                                            <small class="req">*</small>
                                                            <input class="form-control" type="email" name="email" placeholder="Email">
                                                            <span id="email_err" class="text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Role</label>
                                                            <small class="req">*</small>
                                                            <select name="role" class="form-control select2">
                                                                <span id="role_err" class="text-danger"></span>

                                                                <option value="">Select</option>
                                                                <optgroup label="Staff Role">

                                                                <?php foreach ($s_roles as $role): ?>

                                                                    <option value="<?= $role['id'] ?>"><?= ucfirst($role['name']) ?>
                                                                    </option>
                                                                <?php endforeach ?>
                                                                   
                                                                </optgroup>

                                                            </select>
                                                            <span id="role_err" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Phone 1</label>
                                                            <small class="req">*</small>
                                                            <input name="phone1" type="text" class="form-control" data-toggle="input-mask" data-mask-format="0000-000-0000" maxlength="11">
                                                            <span id="phone1_err" class="text-danger"></span>
                                                        </div>
                                                    </div>

                                                </div>  
                                                <!-- Row end -->

                                                <!-- Row -->
                                                <div class="row">

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>FirstName</label>
                                                            <small class="req">*</small>
                                                            <input class="form-control" type="text" name="firstname" placeholder="Firstname">
                                                            <span id="firstname_err" class="text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Surname</label>
                                                            <small class="req">*</small>
                                                            <input class="form-control" type="text" name="surname" placeholder="Surname">
                                                            <span id="surname_err" class="text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Other Names</label>
                                                            <input class="form-control" type="text" name="othernames" placeholder="Other Names">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Phone 2</label>
                                                            <!-- <small class="req">*</small> -->
                                                            <input name="phone2" type="text" class="form-control" data-toggle="input-mask" data-mask-format="0000-000-0000" maxlength="11">
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <!-- Row end -->

                                                <!-- Row -->
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Gender</label>
                                                            <small class="req">*</small>
                                                            <select name="gender" class="form-control"><span id="gender_err" class="text-danger"></span>
                                                                <option value="male">Male</option>
                                                                <option value="female">Female</option>
                                                            </select>
                                                
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Marital Status</label>
                                                            <small class="req">*</small>
                                                            <select name="marital_status" class="form-control">
                                                                <span id="marital_status_err" class="text-danger"></span>
                                                                <option value="">Select</option>
                                                                <option value="single">Single</option>
                                                                <option value="married">Married</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Date of Birth</label>
                                                            <small class="req">*</small>
                                                            <input name="dob" type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose">
                                                            <span id="dob_err" class="text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Date of Employment</label>
                                                            <input name="doe" type="date" class="form-control d" placeholder="mm/dd/yyyy" id="datepicker-autoclose">
                                                            <span id="doe_err" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                    

                                                </div>  
                                                <!-- Row end -->

                                                <!-- Row -->
                                                <div class="row">

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Residential Address</label>
                                                            <textarea name="r_address" class="form-control"></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Permanent Address</label>
                                                            <textarea name="p_address" class="form-control"></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>About</label>
                                                            <textarea name="about" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <h4 class="header-title mt-1 mb-3 text-center">Profile Picture</h4>
                                                            <span id="img_err" class="text-danger text-center"></span>
                                                            <input name="img" type="file" class="dropify" data-max-file-size="1M" />
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
                                <!-- End of add new staff modal -->
                        
                    </div> <!-- container-fluid -->

                </div> <!-- content -->

     <?= $this->endSection() ?>
     
            
