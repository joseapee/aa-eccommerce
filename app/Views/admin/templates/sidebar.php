<!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!-- User box -->
                    <div class="user-box text-center">
                        <p class="text-muted">Admin</p>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="#" class="text-muted">
                                    <i class="mdi mdi-cog"></i>
                                </a>
                            </li>

                            <li class="list-inline-item">
                                <a href="/logout">
                                    <i class="mdi mdi-power"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- User box -->

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">

                            <li class="menu-title">Navigation</li>

                            <li>
                                <a href="<?= base_url('admin/dashboard') ?>">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>


                            <li class="menu-title">Catalogue Management</li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="mdi mdi-altimeter"></i>
                                    <span> Catalogue</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">

                                    <li>
                                        <a href="/admin/catalogue/products">Products</a>
                                    </li>

                                    <li>
                                        <a href="/admin/catalogue/categories">Categories</a>
                                    </li>

                                    <li>
                                        <a href="/admin/catalogue/brands">Brands</a>
                                    </li>
                                </ul>
                            </li>


                            <!-- <li>
                                <a href="javascript: void(0);">
                                    <i class="mdi mdi-human-male-female"></i>
                                    <span> Sales </span>
                                    <span class="menu-arrow"></span>
                                </a>

                                <ul class="nav-second-level" aria-expanded="false">

                                    <li>
                                        <a href="/admin/manage-students">Orders</a>
                                    </li>
                                    
                                </ul>
                            </li> -->


                            <li class="menu-title">Sales</li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="mdi mdi-book-open-page-variant"></i>
                                    <span> Orders </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">

                                    <li>
                                        <a href="/admin/orders/all-orders">All Orders</a>
                                    </li>

                                    <li>
                                        <a href="/admin/orders/standard-orders">Standard Orders</a>
                                    </li>

                                    <li>
                                        <a href="/admin/orders/pre-orders">Pre Orders</a>
                                    </li>

                                    <li>
                                        <a href="/admin/orders/custom-orders">Made to Wear Orders</a>
                                    </li>
                                    
                                </ul>
                            </li>

                            <li class="menu-title">Front Page</li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="mdi mdi-bookshelf"></i>
                                    <span>Home Slider</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="true">

                                    <li>
                                        <a href="/admin/manage-classes">
                                        Class Directory
                                        </a>
                                    </li>

                                    <li>
                                        <a href="/admin/manage-classes/sections">
                                            Sections
                                        </a>
                                    </li>
                                    
                                </ul>
                            </li>


                            <!-- <li class="menu-title">Communications</li> -->

                            <!-- <li>
                                <a href="javascript: void(0);">
                                    <i class="mdi mdi-contactless-payment"></i>
                                    <span> Communication </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="true">

                                    <li>
                                        <a href="/admin/message-parents"> Message Parents</a>
                                    </li>

                                    <li>
                                        <a href="/admin/message-staffs"> Message Staffs</a>
                                    </li>

                                    <li>
                                        <a href="/admin/message-staffs"> Message Students</a>
                                    </li>
                                    
                                </ul>
                            </li> -->


                           <!-- <li class="menu-title">Settings</li> -->

                            <!-- <li class="mm-active">
                                <a href="/admin/school-settings" class="">
                                    <i class="dripicons-gear"></i>
                                    <span> School Settings </span>
                                </a>
                            </li>
                            <li class="mm-active">
                                <a href="/admin/session" class="">
                                    <i class="dripicons-toggles"></i>
                                    <span> Session Settings </span>
                                </a>
                            </li> -->

                            
                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End