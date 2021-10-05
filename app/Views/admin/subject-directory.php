        
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
                                    <div class="col-md-6">
                                        <div class="card-box">
                                            <h4 class="mt-0 mb-3 header-title">ADD NEW SUBJECT</h4>
                                            
                                            <form action="" method="POST" id="classform" class="form-horizontal" role="form">
                                                <div class="form-group">
                                                    <label for="subject">SUBJECT</label>
                                                    <small class="req">*</small>
                                                    <input name="subject" type="text" class="form-control" id="subject" placeholder="Subject" required="">
                                                </div>
                                                <div class="form-group">
                                                    <small class="req">*</small>
                                                    <label>
			                                        	<input class="radio-inline mr-1" type="radio" value="theory" name="type">Theory 
			                                    	</label>
			                                    	<label class="ml-3">
			                                        	<input class="radio-inline mr-1" type="radio" value="practical" name="type">Practical 
			                                    	</label>
                                                </div>

                                                <div class="form-group">
                                                    <label for="class">SUBJECT CODE</label>
                                                    <small class="req">*</small>
                                                    <input name="subject_code" type="text" class="form-control" id="subject_code" placeholder="E.g. cde101" required="">
                                                </div>
                                                
                                                <div class="form-group mb-0 justify-content-end row">
                                                    <div class="col-sm-12">
                                                        <button name="new-subject" value="1" type="submit" class="btn btn-info waves-effect waves-light">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>  <!-- card-box  -->
                                    </div>  <!-- col-md-12  -->

                                    <div class="col-md-6">
                                        <div class="card-box">
                                            <h4 class="mt-0 mb-3 header-title">ASSIGN SUBJECT TEACHER</h4>
                                            
                                            <form action="" method="POST" id="assignSubjectTeacherForm" class="form-horizontal" role="form">
                                                
                                                <div class="form-group">
                                                    <label for="class">SUBJECT</label>
                                                    <small class="req">*</small>
                                                    <select id="class_id" name="subject" class="form-control" required="">
                                                        <option value="">Select</option>
                                                    <?php foreach ($subjects as $subject): ?>
                                                        <option value="<?= $subject["id"] ?>"><?= ucfirst($subject["name"]." (".$subject["type"].")") ?></option>
                                                    <?php endforeach ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <div class="text-primary">
                                                    <label for="class">Class(s)</label>
                                                    <small class="req">*</small></div>
                                                    <?php foreach ($classes as $class): ?>
                                                        <div class="checkbox form-check-inline checkbox-circle checkbox-primary">
                                                            <input name="classes[]" type="checkbox" id="inlineCheckbox<?= $class['id'] ?>" value="<?= $class['id'] ?>" value="<?= $class['id'] ?>">
                                                        <label for="inlineCheckbox<?= $class['id'] ?>"> <?= strtoupper($class['class']) ?> </label>
                                                    </div>
                                                    <?php endforeach ?>
                                                    
                                                </div>
                                                
                                                <!-- <div class="form-group">
                                                    <label for="class">Section</label>
                                                    <small class="req">*</small>
                                                    <select id="section_id" name="section" class="form-control" required=""></select>
                                                </div> -->

                                                <div class="form-group">
                                                    <label for="class">Teacher</label>
                                                    <small class="req">*</small>
                                                    <select id="class_id" name="teacher" class="form-control" required="">
                                                        <option value="">Select</option>
                                                    <?php foreach ($teachers as $teacher): ?>
                                                        <option value="<?= $teacher["id"] ?>"><?= ucwords($teacher["staff_name"]) ?></option>
                                                    <?php endforeach ?>
                                                    </select>
                                                </div>

                                                <div class="form-group mb-0 justify-content-end row">
                                                    <div class="col-sm-12">
                                                        <button name="assign-subject-teacher" value="1" type="submit" class="btn btn-info waves-effect waves-light">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>  <!-- card-box  -->
                                    </div>  <!-- col-md-12  -->
                                </div>  <!-- row  -->

                            </div>  <!-- col-md-12  -->

                            <div class="col-md-12">
                                <div class="card-box">
                                    <h4 class="mt-0 header-title">SUBJECTS</h4>
                                    <div class="table-responsive">
                                        <table id="datatable-buttons" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>SUBJECTS</th>
                                                    <th>CODE</th>
                                                    <th>TYPE</th>
                                                    <th>TEACHER</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $cnt = 1;
                                                foreach ($subjects as $subject): ?>
                                                    <tr>
                                                        <th scope="row"><?= $cnt ?></th>
                                                        <td style="text-transform: uppercase;"><?= $subject['name'] ?></td>
                                                        <td><?= $subject['code'] ?></td>
                                                        <td><?= $subject['type'] ?></td>
                                                        <td><?= $subject['teacher'] ?></td>
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
     
            
