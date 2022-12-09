<?php !function_exists("is_authenticated") && exit(); ?>
<aside class="main-sidebar sidebar-light-success elevation-4">
    <!-- Brand Logo -->
    <a href="<?= $base_url; ?>dashboard.php" class="brand-link bg-white">
        <img src="<?= $base_url; ?>images/logo_default.png" alt="<?= $application_name; ?>" class="brand-image">
        <span class="brand-text font-weight-light"><?= $application_name; ?></span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link active" href="<?= $base_url; ?>dashboard.php">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $base_url; ?>orders/list-orders.php" class="nav-link ">
                        <i class="nav-icon fa fa-shopping-bag"></i>
                        <p>Orders
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $base_url; ?>transactions/list-transactions.php" class="nav-link ">
                        <i class="nav-icon fa fa-credit-card"></i>
                        <p>Transactions
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $base_url; ?>food-bookings/list-food-bookings.php" class="nav-link ">
                        <i class="nav-icon fa fa-shopping-basket"></i>
                        <p>Food Bookings
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $base_url; ?>bookings/list-bookings.php" class="nav-link ">
                        <i class="nav-icon fa fa-users"></i>
                        <p>Bookings
                        </p>
                    </a>
                </li>

                <li class="nav-header">Other Settings</li>
                <li class="nav-item has-treeview ">
                    <a href="<?= $base_url; ?>#" class="nav-link ">
                        <i class="nav-icon fa fa-th-list"></i>
                        <p>Package <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= $base_url; ?>package/add-package.php" class="nav-link">
                                <i class="fa fa-reorder"></i>
                                <p>Add Package</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $base_url; ?>package/package-list.php" class="nav-link">
                                <i class="fa fa-plus"></i>
                                <p>Package List</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= $base_url; ?>package/add-package-food.php" class="nav-link">
                                <i class="fa fa-reorder"></i>
                                <p>Add Package Food</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $base_url; ?>package/package-food-list.php" class="nav-link">
                                <i class="fa fa-plus"></i>
                                <p>Package Food List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview ">
                    <a href="<?= $base_url; ?>#" class="nav-link ">
                        <i class="nav-icon fa fa-th-list"></i>
                        <p>Additional Facilities <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a class="nav-link " href="<?= $base_url; ?>additional-facilities/list-additional-facilities.php">
                                <i class="nav-icon fa fa-reorder"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="<?= $base_url; ?>additional-facilities/new-additional-facility.php">
                                <i class="nav-icon fa fa-plus"></i>
                                <p>New</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview ">
                    <a href="<?= $base_url; ?>#" class="nav-link ">
                        <i class="nav-icon fa fa-th-list"></i>
                        <p>Additional Items <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a class="nav-link " href="<?= $base_url; ?>additional-items/list-additional-items.php">
                                <i class="nav-icon fa fa-reorder"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="<?= $base_url; ?>additional-items/new-additional-item.php">
                                <i class="nav-icon fa fa-plus"></i>
                                <p>New</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="<?= $base_url; ?>completed-foods/list-completed-foods.php" class="nav-link ">
                        <i class="nav-icon fa fa-gift"></i>
                        <p>Completed Foods
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview ">
                    <a href="<?= $base_url; ?>#" class="nav-link ">
                        <i class="nav-icon fa fa-stethoscope"></i>
                        <p>Nutritions <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a class="nav-link " href="<?= $base_url; ?>nutritions/list-nutritions.php">
                                <i class="nav-icon fa fa-reorder"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="<?= $base_url; ?>nutritions/new-nutrition.php">
                                <i class="nav-icon fa fa-plus"></i>
                                <p>New</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview ">
                    <a href="<?= $base_url; ?>#" class="nav-link ">
                        <i class="nav-icon fa fa-list-alt"></i>
                        <p>Place Menus <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a class="nav-link " href="<?= $base_url; ?>place-menus/list-place-menus.php">
                                <i class="nav-icon fa fa-reorder"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="<?= $base_url; ?>place-menus/new-place-menu.php">
                                <i class="nav-icon fa fa-plus"></i>
                                <p>New</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item ">
                    <a href="<?= $base_url; ?>place-reviews/list-place-reviews.php" class="nav-link ">
                        <i class="nav-icon fa fa-comments"></i>
                        <p>Place Reviews
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview ">
                    <a href="<?= $base_url; ?>#" class="nav-link ">
                        <i class="nav-icon fa fa-cutlery"></i>
                        <p>Products <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a class="nav-link " href="<?= $base_url; ?>products/list-products.php">
                                <i class="nav-icon fa fa-reorder"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="<?= $base_url; ?>products/new-product.php">
                                <i class="nav-icon fa fa-plus"></i>
                                <p>New</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="<?= $base_url; ?>ratings/list-ratings.php" class="nav-link ">
                        <i class="nav-icon fa fa-meh-o"></i>
                        <p>Ratings
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>