          
            <!-- Header Begin -->
            <?= $this->include('admin/templates/header') ?>
            <!-- Header End -->

            <!-- TOP BAR BEGIN -->
            <?= $this->include('admin/templates/top-bar') ?>

            <!-- TOP BAR END -->

            <!-- SIDEBAR BEGIN -->
            <?= $this->include('admin/templates/sidebar') ?>

            <!-- SIDEBAR ENDS -->
         
            <!-- Main Container -->
            <?= $this->renderSection('content') ?>

            <!-- Footer begin -->
            <?= $this->include('admin/templates/footer') ?>
            <!-- Footer end -->