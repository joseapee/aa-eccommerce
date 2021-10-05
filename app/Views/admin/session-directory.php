        
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

                            <?php if (isset($edit)): ?>
                            <div class="col-md-4">
                                <div class="card-box">
                                    <h4 class="mt-0 header-title">EDIT SESSION</h4>
                                    
                                    <form action="" method="POST" id="classform" class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <label for="class">SESSION</label>
                                            <small class="req">*</small>
                                            <input name="session" type="text" class="form-control" id="session" placeholder="Session" required="" value="<?= $session['session'] ?>">
                                        </div>
                                        
                                        <div class="form-group mb-0 justify-content-end row">
                                            <div class="col-sm-12">
                                                <button name="edit-session" value="1" type="submit" class="btn btn-success waves-effect waves-light">Save</button>

                                                <a href="/admin/session" value="1" type="submit" class="btn btn-info waves-effect waves-light float-right">New Session</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>  <!-- card-box  -->
                            </div>  <!-- col-md-6  -->

                            <?php else: ?>

                            <div class="col-md-4">
                                <div class="card-box">
                                    <h4 class="mt-0 header-title">ADD NEW SESSION</h4>
                                    
                                    <form action="" method="POST" id="classform" class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <label for="class">SESSION</label>
                                            <small class="req">*</small>
                                            <input name="session" type="text" class="form-control" id="session" placeholder="Session" required="">
                                        </div>

                                        <div class="form-group mb-0 justify-content-end row">
                                            <div class="col-sm-12">
                                                <button name="new-session" value="1" type="submit" class="btn btn-success waves-effect waves-light">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>  <!-- card-box  -->
                            </div>  <!-- col-md-4  -->

                            <?php endif; ?>

                            <div class="col-md-8">
                                <div class="card-box">
                                    <h4 class="mt-0 header-title">SESSIONS</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>SESSIONS</th>
                                                    <th>STATUS</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $cnt = 1;
                                                foreach ($sessions as $session): ?>
                                                    <tr>
                                                        <th scope="row"><?= $cnt ?></th>
                                                        <td>
                                                            <?= $session['session'] ?>   
                                                        </td>
                                                        <td>
                                                            <?php if (isset($session['active_session'])): ?>
                                                                <span class="badge badge-success badge-pill">Active</span>
                                                            <?php endif ?>
                                                        </td>
                                                        <!-- <td>
                                                            <a href="/admin/session/delete/<?= $session['id'] ?>" onclick="return confirm('Do you want to delete this Session `<?= $session['session'] ?>` ?');" class="btn btn-danger btn-sm waves-effect" title="delete">
                                                                <i class="mdi mdi-trash-can-outline"></i>
                                                            </a>
                                                        </td> -->

                                                        <td width="2">
                                                        <?php if (!isset($session['active_session'])): ?>
                                                            <div class="dropdown float-right">
                                                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                                                    <i class="mdi mdi-dots-vertical text-info"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <!-- item-->
                                                            
                                                                    <a href="/admin/session/delete/<?= $session['id'] ?>" onclick="return confirm('Do you want to delete this Session `<?= $session['session'] ?>` ?');" class="dropdown-item" title="delete">
                                                                        Delete
                                                                    </a>
                                                                    <!-- item-->
                                                                    <a href="/admin/session/current/<?= $session['id'] ?>" onclick="return confirm('Do you want to Set this Session `<?= $session['session'] ?>` as current Session?');" class="dropdown-item">
                                                                        Set As Current Session
                                                                    </a>

                                                                </div>
                                                            </div>
                                                        <?php endif ?>
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
     
            
