          
            <!-- Header Begin -->
            <?= $this->include('frontend/templates/header') ?>
            <!-- Header End -->

            <!-- TOP BAR BEGIN -->
            <?php //echo $this->include('frontend/templates/top-bar') ?>

            <!-- TOP BAR END -->

            <!-- SIDEBAR BEGIN -->
            <?php //echo $this->include('admin/templates/sidebar') ?>

            <!-- SIDEBAR ENDS -->
         
            <!-- Main Container -->
            <?= $this->renderSection('content') ?>

            <!-- Footer begin -->
            <?= $this->include('frontend/templates/footer') ?>
            <!-- Footer end -->