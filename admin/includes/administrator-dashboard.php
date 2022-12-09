<?php if( !authenticated()) exit; ?>

        <div class="row">
          <div class="col-lg-2 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
               <h3><?=$number_of_bookings;?></h3>

                <p>Bookings</p>
              </div>
              <div class="icon">
                 <i class="fas fa-book"></i>
              </div>
              <a href="<?=$base_url;?>bookings/list-bookings.php" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                 <h3><?=$number_of_categories;?></h3>

                <!--<h3>53<sup style="font-size: 20px">%</sup></h3>!-->

                <p>Categories</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?=$base_url;?>categories/list-categories.php" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                 <h3><?=$number_of_cuisines;?></h3>

              <!--  <h3>44</h3>!-->

                <p>Cuisine</p>
              </div>
              <div class="icon">
              
               <i class="fas fa-hat-chef"></i>
              </div>
              <a href="<?=$base_url;?>cuisine/list-cuisines.php" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
                 <h3><?=$number_of_facilities;?></h3>

                <!--<h3>65</h3>!-->

                <p>Facilities</p>
              </div>
              <div class="icon">
                <i class=""></i>
              </div>
              <a href="<?=$base_url;?>facilities/list-facilities.php" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
     
        <!-- /.row -->


          <div class="col-lg-2 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                 <h3><?=$number_of_favorites;?></h3>

               <!-- <h3>150</h3>!-->

                <p>Favorites</p>
              </div>
              <div class="icon">
                <!--icon needd to be changed!-->
                 <i class="fas fa-thumbs-up"></i>
              </div>
              <a href="<?=$base_url;?>favorites/list-favorites.php" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                 <h3><?=$number_of_locations;?></h3>

                <!--<h3>53<sup style="font-size: 20px">%</sup></h3>!-->

                <p>Location</p>
              </div>
              <div class="icon">
                <i class="fas fa-map-marked-alt"></i>
              </div>
              <a href="<?=$base_url;?>location/list-locations.php" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                 <h3><?=$number_of_orders;?></h3>

              <!--  <h3>44</h3>!-->

                <p>Orders</p>
              </div>
              <div class="icon">
                <i class="fas fa-cart-plus"></i>
              </div>
              <a href="<?=$base_url;?>orders/list-orders.php" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
 
          <!-- ./col -->
        
        <!-- /.row -->



          <div class="col-lg-2 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
               <!-- <h3>150</h3>!-->
                <h3><?=$number_of_ratings;?></h3>


                <p>Ratings</p>
              </div>
              <div class="icon">
               <i class="fas fa-star-half-alt"></i>
              </div>
              <a href="<?=$base_url;?>ratings/list-ratings.php" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <!--<h3>53<sup style="font-size: 20px">%</sup></h3>!-->
                 <h3><?=$number_of_transactions;?></h3>

                <p>Transactions</p>
              </div>
              <div class="icon">
                <i class="fas fa-money-check-alt"></i>
              </div>
              <a href="<?=$base_url;?>transactions/list-transactions.php" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                 <h3><?=$number_of_users;?></h3>

              <!--  <h3>44</h3>!-->

                <p>Users</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="<?=$base_url;?>users/list-users.php" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
               <h3><?=$number_of_pending_cafes;?></h3>

                <p>Cafes</p>
              </div>
              <div class="icon">
                 <i class="fas fa-coffee"></i>
              </div>
              <a href="<?=$base_url;?>cafe/list-of-pending-cafes.php" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>


         
          <!-- ./col -->
        </div>
        <!-- /.row -->

