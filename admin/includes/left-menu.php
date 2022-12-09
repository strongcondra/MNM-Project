 
  <?php if( !authenticated()) exit; 

    $number_of_pending_cafes=get_number_of_pending_cafes();
    $number_of_active_cafes=get_number_of_active_cafes();

  ?>

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <!-- Sidebar -->
     <div class="sidebar">
        <nav class="mt-2">
           <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
              <li class="nav-item">
                 <a href="<?=$base_url;?>dashboard.php" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                       Dashboard
                    </p>
                 </a>
              </li>
              <li class="nav-item">
                 <a href="" class="nav-link">
                  <i class="fas fa-users-cog"></i>
                    <p>
                       Administration
                       <i class="right fas fa-angle-left"></i>
                    </p>
                 </a>
                 <ul class="nav nav-treeview">
                    <li class="nav-item">
                       <a href="" class="nav-link">
                          <p>
                             Administrator
                             <i class="right fas fa-angle-left"></i>
                          </p>
                       </a>
                       <ul class="nav nav-treeview">
                          <li class="nav-item">
                             <a href="<?=$base_url;?>administrator/add-administrator.php" class="nav-link">
                                <i class="fas fa-user-plus"></i>
                                <p>Add Administrator</p>
                             </a>
                          </li>
                          <li class="nav-item">
                             <a href="<?=$base_url;?>administrator/list-administrators.php" class="nav-link">
                                <i class="fas fa-list-ol"></i>
                                <p>List Administrator</p>
                             </a>
                          </li>
                       </ul>
                    </li>

                     <li class="nav-item">
                       <a href="" class="nav-link">
                          <p>
                             Cuisine
                             <i class="right fas fa-angle-left"></i>
                          </p>
                       </a>
                       <ul class="nav nav-treeview">
                          <li class="nav-item">
                             <a href="<?=$base_url;?>cuisine/add-cuisine.php" class="nav-link">
                                <i class="fas fa-plus"></i>
                                <p>Add Cuisine</p>
                             </a>
                          </li>
                          <li class="nav-item">
                             <a href="<?=$base_url;?>cuisine/list-cuisines.php" class="nav-link">
                               <i class="fas fa-list-ol"></i>
                                <p>List Cuisine</p>
                             </a>
                          </li>
                       </ul>
                    </li>

                     <li class="nav-item">
                       <a href="" class="nav-link">
                          <p>
                             Help
                             <i class="right fas fa-angle-left"></i>
                          </p>
                       </a>
                       <ul class="nav nav-treeview">
                          <li class="nav-item">
                             <a href="<?=$base_url;?>help/add-help-question.php" class="nav-link">
                                <i class="fas fa-plus"></i>
                                <p>Add Help</p>
                             </a>
                          </li>
                          <li class="nav-item">
                             <a href="<?=$base_url;?>help/list-help-questions.php" class="nav-link">
                               <i class="fas fa-list-ol"></i>
                                <p>List Help</p>
                             </a>
                          </li>
                       </ul>
                    </li>

                     <li class="nav-item">
                       <a href="" class="nav-link">
                          <p>
                             Place Help
                             <i class="right fas fa-angle-left"></i>
                          </p>
                       </a>
                       <ul class="nav nav-treeview">
                          <li class="nav-item">
                             <a href="<?=$base_url;?>place-help/add-help-question.php" class="nav-link">
                                <i class="fas fa-plus"></i>
                                <p>Add Help</p>
                             </a>
                          </li>
                          <li class="nav-item">
                             <a href="<?=$base_url;?>place-help/list-help-questions.php" class="nav-link">
                               <i class="fas fa-list-ol"></i>
                                <p>List Help</p>
                             </a>
                          </li>
                       </ul>
                    </li>

                     <li class="nav-item">
                       <a href="" class="nav-link">
                          <p>
                             Service Help
                             <i class="right fas fa-angle-left"></i>
                          </p>
                       </a>
                       <ul class="nav nav-treeview">
                          <li class="nav-item">
                             <a href="<?=$base_url;?>service-help/add-help-question.php" class="nav-link">
                                <i class="fas fa-plus"></i>
                                <p>Add Help</p>
                             </a>
                          </li>
                          <li class="nav-item">
                             <a href="<?=$base_url;?>service-help/list-help-questions.php" class="nav-link">
                               <i class="fas fa-list-ol"></i>
                                <p>List Help</p>
                             </a>
                          </li>
                       </ul>
                    </li>

                     <li class="nav-item">
                       <a href="" class="nav-link">
                          <p>
                             Misc Help
                             <i class="right fas fa-angle-left"></i>
                          </p>
                       </a>
                       <ul class="nav nav-treeview">
                          <li class="nav-item">
                             <a href="<?=$base_url;?>misc-help/add-help-question.php" class="nav-link">
                                <i class="fas fa-plus"></i>
                                <p>Add Help</p>
                             </a>
                          </li>
                          <li class="nav-item">
                             <a href="<?=$base_url;?>misc-help/list-help-questions.php" class="nav-link">
                               <i class="fas fa-list-ol"></i>
                                <p>List Help</p>
                             </a>
                          </li>
                       </ul>
                    </li>
                    
                    <li class="nav-item">
                       <a href="#" class="nav-link">
                          <p>
                             Categories
                             <i class="right fas fa-angle-left"></i>
                          </p>
                       </a>
                       <ul class="nav nav-treeview">
                          <li class="nav-item">
                             <a href="<?=$base_url;?>categories/add-category.php" class="nav-link">
                                <i class="fas fa-plus"></i>
                                <p>Add Category</p>
                             </a>
                          </li>
                          <li class="nav-item">
                             <a href="<?=$base_url;?>categories/list-categories.php" class="nav-link">
                                <i class="fas fa-list-ol"></i>
                                <p>List Category</p>
                             </a>
                          </li>
                       </ul>
                    </li>
                    <li class="nav-item">
                       <a href="#" class="nav-link">
                          <p>
                             Facilities
                             <i class="right fas fa-angle-left"></i>
                          </p>
                       </a>
                       <ul class="nav nav-treeview">
                          <li class="nav-item">
                             <a href="<?=$base_url;?>facilities/add-facility.php" class="nav-link">
                                <i class="fas fa-plus"></i>
                                <p>Add facility</p>
                             </a>
                          </li>
                          <li class="nav-item">
                             <a href="<?=$base_url;?>facilities/list-facilities.php" class="nav-link">
                                <i class="fas fa-list-ol"></i>
                                <p>List Facilities</p>
                             </a>
                          </li>
                       </ul>
                    </li>
                    <li class="nav-item">
                       <a href="#" class="nav-link">
                          <p>
                             Location
                             <i class="right fas fa-angle-left"></i>
                          </p>
                       </a>
                       <ul class="nav nav-treeview">
                          <li class="nav-item">
                             <a href="<?=$base_url;?>location/add-location.php" class="nav-link">
                               <i class="fas fa-plus"></i>
                                <p>Add Location</p>
                             </a>
                          </li>
                          <li class="nav-item">
                             <a href="<?=$base_url;?>location/list-locations.php" class="nav-link">
                               <i class="fas fa-list-ol"></i>
                                <p>List Locations</p>
                             </a>
                          </li>
                       </ul>
                    </li>


                 </ul>
              </li>


            <li class="nav-item">
              <a href="<?=$base_url;?>bookings/list-bookings.php" class="nav-link">
              
              <i class="fas fa-book"></i>
                <p>
                Bookings
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?=$base_url;?>favorites/list-favorites.php" class="nav-link">
               <i class="fas fa-thumbs-up"></i>
                <p>
                favorites
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?=$base_url;?>orders/list-orders.php" class="nav-link">
              <i class="fas fa-cart-plus"></i>
                <p>
                Orders
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?=$base_url;?>ratings/list-ratings.php" class="nav-link">
                <i class="fas fa-star-half-alt"></i>
                <p>
                Ratings
                </p>
              </a>
            </li>

              <li class="nav-item">
              <a href="<?=$base_url;?>transactions/list-transactions.php" class="nav-link">
               <i class="fas fa-money-check-alt"></i>
                <p>
                Transactions
                </p>
              </a>
            </li>

              <li class="nav-item">
              <a href="<?=$base_url;?>users/list-users.php" class="nav-link">
                <i class="fas fa-users"></i>
                <p>
                Users
                </p>
              </a>
            </li>
<li class="nav-item">
                           <a href="<?=$base_url;?>photos.php" class="nav-link">
                              <i class="fas fa-book"></i>
                              <p>Photos </p>
                           </a>
                        </li>
             <li class="nav-item">
              <a href="" class="nav-link">
                        <p>
                           <i class="fas fa-coffee"></i>
                           Cafe
                         <i class="right fas fa-angle-left"></i>
                        </p>
                 </a>
                     <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="<?=$base_url;?>cafe/list-of-active-cafes.php" class="nav-link">
                            <i class="fas fa-user-check"></i>
                              <p><?=$number_of_active_cafes;?> Active Cafes</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="<?=$base_url;?>cafe/list-of-pending-cafes.php" class="nav-link">
                              <i class="fas fa-pause-circle"></i>
                              <p><?=$number_of_pending_cafes;?> Pending Cafe</p>
                           </a>
                        </li>
                        
                     </ul>
              </li>
              
              <li class="nav-item">
              <a href="" class="nav-link">
                        <p>
                           <i class="fas fa-coffee"></i>
                           Package
                         <i class="right fas fa-angle-left"></i>
                        </p>
                 </a>
                     <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="<?=$base_url;?>package/add-package-name.php" class="nav-link">
                            <i class="fas fas fa-cart-plus"></i>
                              <p>Add Package Name</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="<?=$base_url;?>package/package-name-list.php" class="nav-link">
                              <i class="fas fas fa-cart-plus"></i>
                              <p>Package Name List</p>
                           </a>
                        </li>

                     </ul>
              </li>


            <li class="nav-item">
              <a href="<?=$base_url;?>logout.php" class="nav-link">
                <i class="fas fa-sign-out-alt"></i>
                
                <p>
                Logout
                </p>
              </a>
            </li>
           </ul>
  <!-- /.logout -->
       
         
        </nav>
        <!-- /.sidebar-menu -->
     </div>
     
          <!-- /.sidebar -->
  </aside>