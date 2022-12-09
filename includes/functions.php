<?php
function get_connection()
{
   global $database_host, $database_name, $database_user, $database_user_password;
   try {
      $dbh = new PDO("mysql:host=$database_host;dbname=$database_name", $database_user, $database_user_password);
   } catch (PDOException $e) {
      exit("<center>database connection failure</center>");
   }

   return $dbh;
}

function sprint($poison)
{
   return htmlentities($poison, ENT_QUOTES, "UTF-8");
}

function clean($poison, $size = 0)
{
   if (empty($size)) return trim(strip_tags($poison));
   return substr(trim(strip_tags($poison)), 0, $size);
}

function get_random_token()
{
   return md5(uniqid());
}

function encrypt_password($password)
{
   //CHANGE THIS AND ALL system_users WILL NOT BE ABLE TO LOGIN
   return password_hash($password, PASSWORD_BCRYPT);
}

function update_user($address, $message = "redirecting", $time = 2)
{
   global $base_url;
   exit("<center><h2>{$message}<meta http-equiv=\"refresh\" content=\"{$time};URL='{$base_url}{$address}'\" /></h2></center>");
}

function format_raw_datetime($raw_datetime)
{
   if (!empty($raw_datetime)) return strtoupper(date("j M G:i", $raw_datetime));
   else return $raw_datetime;
}

function get_time()
{
   return time();
}

function passed_authentication($email, $password)
{
   if (!empty($email) && !empty($password)) {
      $statement = get_connection()->prepare("SELECT `cafe_id`, `owner_name`, `owner_mob`, `owner_email`, `owner_pass`, `cafe_name`, `owner_upi`, `location`, `cost`, `description`, `service_area`, `facilities`, `primary_image`, `secondary`, `status`, `cuisine`, `longitude`, `latitude`, `category`, `information`, `full_reservation`, `individual_reservation`, `capacity`, `trending`, `popular`, `address`, `photoShoot`, `cake`, `apiKey`, `authToken` FROM `placeDetails` WHERE `owner_email` = ? AND `status` = 1 LIMIT 1");
      $statement->execute([$email]);

      if (!isset($statement->errorInfo()[2]) && $statement->rowCount() == 1) {
         $row = $statement->fetch();

         if (password_verify($password, $row['owner_pass'])) {
            $_SESSION['cafe_id'] = $row['cafe_id'];
            $_SESSION['owner_name'] = $row['owner_name'];
            $_SESSION['owner_mob'] = $row['owner_mob'];
            $_SESSION['owner_email'] = $row['owner_email'];
            $_SESSION['owner_pass'] = $row['owner_pass'];
            $_SESSION['cafe_name'] = $row['cafe_name'];
            $_SESSION['owner_upi'] = $row['owner_upi'];
            $_SESSION['location'] = $row['location'];
            $_SESSION['cost'] = $row['cost'];
            $_SESSION['description'] = $row['description'];
            $_SESSION['service_area'] = $row['service_area'];
            $_SESSION['facilities'] = $row['facilities'];
            $_SESSION['primary_image'] = $row['primary_image'];
            $_SESSION['secondary'] = $row['secondary'];
            $_SESSION['status'] = $row['status'];
            $_SESSION['cuisine'] = $row['cuisine'];
            $_SESSION['longitude'] = $row['longitude'];
            $_SESSION['latitude'] = $row['latitude'];
            $_SESSION['category'] = $row['category'];
            $_SESSION['information'] = $row['information'];
            $_SESSION['full_reservation'] = $row['full_reservation'];
            $_SESSION['individual_reservation'] = $row['individual_reservation'];
            $_SESSION['capacity'] = $row['capacity'];
            $_SESSION['trending'] = $row['trending'];
            $_SESSION['popular'] = $row['popular'];
            $_SESSION['address'] = $row['address'];
            $_SESSION['photoShoot'] = $row['photoShoot'];
            $_SESSION['cake'] = $row['cake'];
            $_SESSION['apiKey'] = $row['apiKey'];
            $_SESSION['authToken'] = $row['authToken'];
         }

         return is_authenticated();
      }
   }
   return false;
}
function passed_temp_authentication($email, $password)
{
   if (!empty($email) && !empty($password)) {
      $statement = get_connection()->prepare("SELECT `cafe_id`, `owner_name`, `owner_mob`, `owner_email`, `owner_pass`, `cafe_name`, `apiKey`, `authToken`  FROM `placeDetails` WHERE `owner_email` = ? AND `status` = 1 LIMIT 1");
      $statement->execute([$email]);

      if (!isset($statement->errorInfo()[2]) && $statement->rowCount() == 1) {
         $row = $statement->fetch();

         if (password_verify($password, $row['owner_pass'])) {
            $_SESSION['cafe_id'] = $row['cafe_id'];
            $_SESSION['owner_name'] = $row['owner_name'];
            $_SESSION['owner_mob'] = $row['owner_mob'];
            $_SESSION['owner_email'] = $row['owner_email'];
            $_SESSION['owner_pass'] = $row['owner_pass'];
            $_SESSION['cafe_name'] = $row['cafe_name'];
            $_SESSION['apiKey'] = $row['apiKey'];
            $_SESSION['authToken'] = $row['authToken'];
         }

         return is_authenticated();
      }
   }
   return false;
}
function get_my_mobile_number()
{
   if (is_authenticated()) {
      return $_SESSION['owner_mob'];
   }
}

function get_my_place_name()
{
   if (is_authenticated()) {
      return $_SESSION['cafe_name'];
   }
}

//ALIAS TO get_my_place_name
function get_my_cafe_name()
{
   return get_my_place_name();
}

function get_my_cafe_id()
{
   if (is_authenticated()) {
      return $_SESSION['cafe_id'];
   }
}

//ALIAS TO get_my_cafe_id
function get_my_place_id()
{
   return get_my_cafe_id();
}

// function is_authenticated() {
//   return isset($_SESSION['cafe_id']) && isset($_SESSION['owner_name']) && isset($_SESSION['owner_mob']) && isset($_SESSION['owner_email']) && isset($_SESSION['owner_pass']) && isset($_SESSION['cafe_name']) && isset($_SESSION['owner_upi']) && isset($_SESSION['location']) && isset($_SESSION['cost']) && isset($_SESSION['description']) && isset($_SESSION['service_area']) && isset($_SESSION['facilities']) && isset($_SESSION['primary_image']) && isset($_SESSION['secondary']) && isset($_SESSION['status']) && isset($_SESSION['cuisine']) && isset($_SESSION['longitude']) && isset($_SESSION['latitude']) && isset($_SESSION['category']) && isset($_SESSION['information']) && isset($_SESSION['full_reservation']) && isset($_SESSION['individual_reservation']) && isset($_SESSION['capacity']) && isset($_SESSION['trending']) && isset($_SESSION['popular']) && isset($_SESSION['address']) && isset($_SESSION['photoShoot']) && isset($_SESSION['cake']) && isset($_SESSION['apiKey']) && isset($_SESSION['authToken']);
// }
function is_authenticated()
{
   return isset($_SESSION['cafe_id']) && isset($_SESSION['owner_name']) && isset($_SESSION['owner_mob']) && isset($_SESSION['owner_email']) && isset($_SESSION['owner_pass']);
}
function get_number_of_my_orders()
{
   if (is_authenticated()) {
      $statement = get_connection()->prepare("SELECT COUNT(*) FROM `orders` WHERE `placeName` = ? AND `status` <> 'canceled'");
      $statement->execute([get_my_place_name()]);

      if (!isset($statement->errorInfo()[2]) && $statement->rowCount() == 1) {
         return $statement->fetchColumn();
      }
   }
   return false;
}

function get_total_of_my_earnings()
{
   if (is_authenticated()) {
      $statement = get_connection()->prepare("SELECT SUM(`amount`) FROM `transactions` WHERE `cafe_id` = ?");
      $statement->execute([get_my_cafe_id()]);

      if (!isset($statement->errorInfo()[2]) && $statement->rowCount() == 1) {
         return (float)$statement->fetchColumn();
      }
   }
   return false;
}

function get_number_of_my_bookings()
{
   if (is_authenticated()) {
      $statement = get_connection()->prepare("SELECT COUNT(*) FROM `bookings` WHERE `place_name` = ? OR `owner_mob` = ?");
      $statement->execute([get_my_place_name(), get_my_mobile_number()]);

      if (!isset($statement->errorInfo()[2]) && $statement->rowCount() == 1) {
         return $statement->fetchColumn();
      }
   }
   return false;
}

function get_number_of_my_food_bookings()
{
   if (is_authenticated()) {
      $statement = get_connection()->prepare("SELECT COUNT(*) FROM `foodBooking` WHERE `placeName` = ?");
      $statement->execute([get_my_place_name()]);

      if (!isset($statement->errorInfo()[2]) && $statement->rowCount() == 1) {
         return $statement->fetchColumn();
      }
   }
   return false;
}

function add_facility($facility, $price)
{
   if (is_authenticated() && !empty($facility) && !empty($price)) {
      $statement = get_connection()->prepare("INSERT INTO `additionalFacility`(`facility`,`price`,`owner_mob`)VALUES(?,?,?)");
      $statement->execute([$facility, $price, $_SESSION['owner_mob']]);
      return (!isset($statement->errorInfo()[2]) && $statement->rowCount() == 1);
   }
   return false;
}
function create_cafe($cafe_name)
{
   if (!empty($cafe_name)) {
      $statement = get_connection()->prepare("INSERT INTO `image_list`(`cafe_name`)VALUES(?)");
      $statement->execute([$cafe_name]);
      //return (!isset($statement->errorInfo() [2]) && $statement->rowCount() == 1);
      if ($statement->rowCount() > 0) {
         return true;
      }
   }
   return false;
}
//corrected the sql query
function get_additional_facility()
{
   if (is_authenticated()) {
      $statement = get_connection()->prepare("SELECT `additionalFacility`.`id`, `additionalFacility`.`owner_mob`, `additionalFacility`.`facility`, `additionalFacility`.`price` FROM `additionalFacility`  WHERE `additionalFacility`.`owner_mob`=?");
      $statement->execute([$_SESSION['owner_mob']]);

      if (!isset($statement->errorInfo()[2]) && $statement->rowCount() > 0) {
         return $statement->fetchAll(PDO::FETCH_ASSOC);
      }
   }
   return false;
}

function get_additional_items()
{
   if (is_authenticated()) {
      $statement = get_connection()->prepare("SELECT `additionalItems`.`id`, `additionalItems`.`owner_mob`, `additionalItems`.`item`, `additionalItems`.`price` FROM `additionalItems` WHERE `additionalItems`.`owner_mob`=?");
      $statement->execute([$_SESSION['owner_mob']]);

      if (!isset($statement->errorInfo()[2]) && $statement->rowCount() > 0) {
         return $statement->fetchAll(PDO::FETCH_ASSOC);
      }
   }
   return false;
}

function add_additional_items($item, $price)
{
   if (is_authenticated() && !empty($item) && !empty($price)) {
      $statement = get_connection()->prepare("INSERT INTO `additionalItems`(`item`,`price`,`owner_mob`)VALUES(?,?,?)");
      $statement->execute([$item, $price, $_SESSION['owner_mob']]);
      return (!isset($statement->errorInfo()[2]) && $statement->rowCount() == 1);
   }
   return false;
}

function add_product($product_name, $product_price, $product_quantity, $product_image, $activity)
{
   if (is_authenticated() && !empty($product_name) && !empty($product_price) && !empty($product_quantity) && !empty($product_image) && !empty($product_image) && is_array($product_image) && isset($product_image['name']) && isset($product_image['tmp_name']) && isset($product_image['error']) && $product_image['error'] == UPLOAD_ERR_OK && isset($product_image['size']) && $product_image['size'] > 0) {

      $extension = pathinfo($product_image['name'], PATHINFO_EXTENSION);
      $product_image_name = get_random_token() . "." . $extension;

      if (!empty($extension) && ($extension == 'bmp' || $extension == 'png' || $extension == 'PNG' || $extension == 'jpg' || $extension == 'JPG' || $extension == 'jpeg' || $extension == 'JPEG')) {

         $statement = get_connection()->prepare("INSERT INTO `products`(`cafe_id`,`product_name`,`product_price`, `product_quant`,`product_image`,`set_active`)VALUES(?,?,?,?,?,?)");
         $statement->execute([$_SESSION['cafe_id'], $product_name, $product_price, $product_quantity, $product_image_name, $activity]);
         if ($statement->rowCount() == 1) {

            if (move_uploaded_file($product_image['tmp_name'], $GLOBALS['root_dir'] . "images/products/" . $product_image_name)) {

               return true;
            }
         }
      }
   }
   return false;
}
//updating products for logged in user corrected
function update_product($product_id, $product_name, $product_price, $product_quantity, $product_image, $activity)
{
   if (!empty($product_id) && !empty($product_price) && !empty($product_name) && !empty($product_quantity) && !empty($activity && !empty($product_image) && !empty($product_image) && is_array($product_image) && isset($product_image['name']) && isset($product_image['tmp_name']) && isset($product_image['error']) && $product_image['error'] == UPLOAD_ERR_OK && isset($product_image['size']) && $product_image['size'] > 0)) {

      $extension = pathinfo($product_image['name'], PATHINFO_EXTENSION);
      $product_image_name = get_random_token() . "." . $extension;
      if (!empty($extension) && ($extension == 'bmp' || $extension == 'png' || $extension == 'PNG' || $extension == 'jpg' || $extension == 'JPG' || $extension == 'jpeg' || $extension == 'JPEG')) {
         $statement = get_connection()->prepare("UPDATE  `products` SET `product_name`=?,`product_price`=?, `product_quant`=?,`product_image`=?, `set_active`=? WHERE  `product_id`=? AND `cafe_id`=?");
         $statement->execute([$product_name, $product_price, $product_quantity, $product_image_name, $activity, $product_id, $_SESSION['cafe_id']]);

         if ($statement->rowCount() == 1) {

            if (move_uploaded_file($product_image['tmp_name'], $GLOBALS['root_dir'] . "images/products/" . $product_image_name)) {

               return true;
            }
         }
      }
   }
}
//get products for logged in user
function get_product_values($item_id)
{
   if (isset($item_id)) {

      $statement = get_connection()->prepare("SELECT * FROM `products` WHERE `product_id`=?  AND `cafe_id`=? ");
      $statement->execute([$item_id, $_SESSION['cafe_id']]);
      if (!isset($statement->errorInfo()[2])) {

         if ($statement->rowCount() == 1) {
            return $statement->fetch(PDO::FETCH_ASSOC);
         }
      }
   }
   return false;
}
function get_package_name()
{
   if (is_authenticated()) {
      $statement = get_connection()->prepare("SELECT * FROM `package` ");
      $statement->execute();

      if (!isset($statement->errorInfo()[2]) && $statement->rowCount() > 0) {
         return $statement->fetchAll(PDO::FETCH_ASSOC);
      }
   }
   return false;
}

function add_package_food($pid, $food_name, $type, $price, $menu_image, $cafe_id)
{
   if (is_authenticated() && !empty($pid) && !empty($food_name) && !empty($type) && !empty($price) && !empty($menu_image)) {

      /*&& is_array($menu_image) && isset($menu_image['name']) && isset($menu_image['tmp_name']) && isset($menu_image['error']) && $menu_image['error'] == UPLOAD_ERR_OK && isset($menu_image['size']) && $menu_image['size'] > 0*/
      $extension = pathinfo($menu_image['name'], PATHINFO_EXTENSION);
      $image_name = get_random_token() . "." . $extension;
      if (!empty($extension) && ($extension == 'bmp' || $extension == 'png' || $extension == 'PNG' || $extension == 'jpg' || $extension == 'JPG' || $extension == 'jpeg' || $extension == 'JPEG')) {
         $statement = get_connection()->prepare("INSERT INTO `package_food`(`cafe_id`,`pid`,`food_Image`,`food_name`,`type`,`price`)VALUES(?,?,?,?,?,?)");
         $statement->execute([$cafe_id, $pid, $image_name, $food_name, $type, $price]);
         if ($statement->rowCount() == 1) {
            if (move_uploaded_file($menu_image['tmp_name'], $GLOBALS['root_dir'] . "images/place_menu/" . $image_name)) {

               return true;
            }
         }
      }
   }
   return false;
}
function get_nutritions()
{
   if (is_authenticated()) {
      $statement = get_connection()->prepare("SELECT `nutrition`.`id`, `nutrition`.`name`, `nutrition`.`quantity`, `nutrition`.`food`, `nutrition`.`restaurant` FROM `nutrition` INNER JOIN `placeDetails` ON `nutrition`.`restaurant`=`placeDetails`.`cafe_name` WHERE `placeDetails`.`cafe_id`=?");
      $statement->execute([$_SESSION['cafe_id']]);

      if (!isset($statement->errorInfo()[2]) && $statement->rowCount() > 0) {
         return $statement->fetchAll(PDO::FETCH_ASSOC);
      }
   }
   return false;
}

function add_nutrition($name, $quantity, $food)
{
   if (is_authenticated() && !empty($name) && !empty($quantity) && !empty($food)) {
      $statement = get_connection()->prepare("INSERT INTO `nutrition`(`name`,`quantity`,`food`,`restaurant`)VALUES(?,?,?,?)");
      $statement->execute([$name, $quantity, $food, $_SESSION['cafe_name']]);
      return (!isset($statement->errorInfo()[2]) && $statement->rowCount() == 1);
   }
   return false;
}

function get_place_menus()
{
   if (is_authenticated()) {
      $statement = get_connection()->prepare("SELECT `placeMenu`.`menu_id`, `placeMenu`.`owner_mob`, `placeMenu`.`cuisine`, `placeMenu`.`food_Image`, `placeMenu`.`food_description`, `placeMenu`.`featured`, `placeMenu`.`food_name`, `placeMenu`.`type`, `placeMenu`.`price`, `placeMenu`.`ingredients`, `placeMenu`.`quantityAvailable`, `food_Image` FROM `placeMenu` INNER JOIN `placeDetails` ON `placeMenu`.`owner_mob` =`placeDetails`.`owner_mob` WHERE `placeDetails`.`cafe_id`=?");
      $statement->execute([$_SESSION['cafe_id']]);

      if (!isset($statement->errorInfo()[2]) && $statement->rowCount() > 0) {
         return $statement->fetchAll(PDO::FETCH_ASSOC);
      }
   }
   return false;
}

//needs image upload
function add_place_menu($cuisine, $food_description, $menu_image, $featured, $food_name, $type, $price, $ingrediants, $quantityAvailable)
{
   if (is_authenticated() && !empty($cuisine) && !empty($food_description) && !empty($featured) && !empty($food_name) && !empty($type) && !empty($price) && !empty($ingrediants) && !empty($quantityAvailable) && !empty($menu_image) && is_array($menu_image) && isset($menu_image['name']) && isset($menu_image['tmp_name']) && isset($menu_image['error']) && $menu_image['error'] == UPLOAD_ERR_OK && isset($menu_image['size']) && $menu_image['size'] > 0) {

      $extension = pathinfo($menu_image['name'], PATHINFO_EXTENSION);
      $image_name = get_random_token() . "." . $extension;
      if (!empty($extension) && ($extension == 'bmp' || $extension == 'png' || $extension == 'PNG' || $extension == 'jpg' || $extension == 'JPG' || $extension == 'jpeg' || $extension == 'JPEG')) {
         $statement = get_connection()->prepare("INSERT INTO `placeMenu`(`cuisine`,`food_description`,`featured`,`food_name`,`type`,`price`,`ingredients`,`quantityAvailable`, `food_Image`,`owner_mob`)VALUES(?,?,?,?,?,?,?,?,?,?)");
         $statement->execute([$cuisine, $food_description, $featured, $food_name, $type, $price, $ingrediants, $quantityAvailable, $image_name, $_SESSION['owner_mob']]);
         if ($statement->rowCount() == 1) {
            if (move_uploaded_file($menu_image['tmp_name'], $GLOBALS['root_dir'] . "images/place_menu/" . $image_name)) {

               return true;
            }
         }
      }
   }
   return false;
}

// removed `placeReviews`.`user_name` =`placeDetails`.`owner_name` OR got confused a bit but now understand why was surpose to remove it
function get_place_reviews()
{
   if (is_authenticated()) {
      $statement = get_connection()->prepare("SELECT `placeReviews`.`id`, `placeReviews`.`user_name`, `placeReviews`.`user_mobile`, `placeReviews`.`review`, `placeReviews`.`rating`, `placeReviews`.`user_img`, `placeReviews`.`place_name`, `placeReviews`.`user_about` FROM `placeReviews` WHERE `placeReviews`.`place_name`=?");
      $statement->execute([$_SESSION['cafe_name']]);

      if (!isset($statement->errorInfo()[2]) && $statement->rowCount() > 0) {
         return $statement->fetchAll(PDO::FETCH_ASSOC);
      }
   }
   return false;
}

//get products for logged in user
function get_products()
{
   if (is_authenticated()) {
      $statement = get_connection()->prepare("SELECT * FROM `products` WHERE `cafe_id`=?");
      $statement->execute([$_SESSION['cafe_id']]);

      if (!isset($statement->errorInfo()[2]) && $statement->rowCount() > 0) {
         return $statement->fetchAll(PDO::FETCH_ASSOC);
      }
   }
   return false;
}

function get_ratings()
{
   if (is_authenticated()) {
      $statement = get_connection()->prepare("SELECT `rating`.`id`, `rating`.`user_mobile`, `placeDetails`.`cafe_name`, `rating`.`rating`, `rating`.`submitted`, `rating`.`user_image`, `rating`.`review` FROM `rating` INNER JOIN `placeDetails` ON `rating`.`cafe_id`=`placeDetails`.`cafe_id` WHERE `placeDetails`.`cafe_id`=?");
      $statement->execute([$_SESSION['cafe_id']]);

      if (!isset($statement->errorInfo()[2]) && $statement->rowCount() > 0) {
         return $statement->fetchAll(PDO::FETCH_ASSOC);
      }
   }
   return false;
}

function delete_rating($id)
{
   if (is_authenticated() && !empty($id)) {

      $statement = get_connection()->prepare("DELETE  FROM `rating` WHERE `id` = ? AND `cafe_id`=? ");
      $statement->execute([$id, $_SESSION['cafe_id']]);
      return (!isset($statement->errorInfo()[2]) && $statement->rowCount() == 1);
   }
   return false;
}
//delete product for logged in user corrected
function delete_product($product_id)
{
   if (is_authenticated() && !empty($product_id)) {

      $statement = get_connection()->prepare("DELETE  FROM `products` WHERE `product_id` = ? AND `cafe_id`=? ");
      $statement->execute([$product_id, $_SESSION['cafe_id']]);
      return (!isset($statement->errorInfo()[2]) && $statement->rowCount() == 1);
   }
   return false;
}

function get_orders()
{
   if (is_authenticated()) {
      $statement = get_connection()->prepare("SELECT `orders`.`id`, `orders`.`total`, `orders`.`foodTotal`, `orders`.`status`, `orders`.`reservationCost`, `orders`.`dateCreated`, `orders`.`reservations`, `orders`.`payMode`,`orders`.`bookingDate`, `orders`.`user_mobile`, `orders`.`placeName` FROM `orders` INNER JOIN `placeDetails` ON `orders`.`placeName`=`placeDetails`.`cafe_name` WHERE `placeDetails`.`cafe_id`= ?");
      $statement->execute([$_SESSION['cafe_id']]);

      if (!isset($statement->errorInfo()[2]) && $statement->rowCount() > 0) {
         return $statement->fetchAll(PDO::FETCH_ASSOC);
      }
   }
   return false;
}
// delete order for logged in user corrected
function delete_order($id)
{
   if (is_authenticated() && !empty($id)) {

      $statement = get_connection()->prepare("DELETE  FROM `orders` WHERE `id` = ? AND `cafe_id`=?");
      $statement->execute([$id, $_SESSION['cafe_id']]);
      return (!isset($statement->errorInfo()[2]) && $statement->rowCount() == 1);
   }
   return false;
}

function get_transactions()
{
   if (is_authenticated()) {
      $statement = get_connection()->prepare("SELECT `transactions`.`transaction_id`, `users`.`user_name`, `placeDetails`.`cafe_name`, `transactions`.`amount`, `transactions`.`date` FROM `transactions`INNER JOIN `placeDetails` ON `transactions`.`cafe_id`=`placeDetails`.`cafe_id` INNER JOIN `users` ON `transactions`.`user_id`=`users`.`user_id` WHERE `placeDetails`.`cafe_id`=?");
      $statement->execute([$_SESSION['cafe_id']]);

      if (!isset($statement->errorInfo()[2]) && $statement->rowCount() > 0) {
         return $statement->fetchAll(PDO::FETCH_ASSOC);
      }
   }
   return false;
}
//delete transaction  for logged in user corrected
function delete_transaction($id)
{
   if (is_authenticated() && !empty($id)) {

      $statement = get_connection()->prepare("DELETE  FROM `transactions` WHERE `transaction_id` = ? AND `cafe_id`=? ");
      $statement->execute([$id, $_SESSION['cafe_id']]);
      return (!isset($statement->errorInfo()[2]) && $statement->rowCount() == 1);
   }
   return false;
}

function get_bookings()
{
   if (is_authenticated()) {
      $statement = get_connection()->prepare("SELECT `bookings`.`booking_id`, `bookings`.`user_mobile`, `bookings`.`place_name`, `bookings`.`date`, `bookings`.`pay_mode`, `bookings`.`complementary`, `bookings`.`cancelled`, `bookings`.`status`, `bookings`.`reservations`, `bookings`.`cost`, `bookings`.`owner_mob` FROM `bookings` INNER JOIN `placeDetails` ON `bookings`.`place_name`=`placeDetails`.`cafe_name` OR `bookings`.`owner_mob`=`placeDetails`.`owner_mob` WHERE `placeDetails`.`cafe_id`=?");
      $statement->execute([$_SESSION['cafe_id']]);

      if (!isset($statement->errorInfo()[2]) && $statement->rowCount() > 0) {
         return $statement->fetchAll(PDO::FETCH_ASSOC);
      }
   }
   return false;
}



//delete booking for logged in user corrected
function delete_booking($id)
{
   if (is_authenticated() && !empty($id)) {

      $statement = get_connection()->prepare("DELETE  FROM `bookings` WHERE `booking_id` = ? AND `cafe_id`=? ");
      $statement->execute([$id, $_SESSION['cafe_id']]);
      return (!isset($statement->errorInfo()[2]) && $statement->rowCount() == 1);
   }
   return false;
}

function get_food_bookings()
{
   if (is_authenticated()) {
      $statement = get_connection()->prepare("SELECT `foodBooking`.`id`,`foodBooking`.`placeName`,`foodBooking`.`cost`, `foodBooking`.`foodName`, `foodBooking`.`reservations`, `foodBooking`.`userMobile`, `foodBooking`.`foodDescription` FROM `foodBooking` INNER JOIN `placeDetails` ON `foodBooking`.`placeName`=`placeDetails`.`cafe_name` WHERE `placeDetails`.`cafe_id`=?");
      $statement->execute([$_SESSION['cafe_id']]);

      if (!isset($statement->errorInfo()[2]) && $statement->rowCount() > 0) {
         return $statement->fetchAll(PDO::FETCH_ASSOC);
      }
   }
   return false;
}
//delete food booking for logged in user corrected
function delete_food_booking($id)
{
   if (is_authenticated() && !empty($id)) {

      $statement = get_connection()->prepare("DELETE  FROM `foodBooking` WHERE `id` = ? AND `cafe_id`=?");
      $statement->execute([$id, $_SESSION['cafe_id']]);
      return (!isset($statement->errorInfo()[2]) && $statement->rowCount() == 1);
   }
   return false;
}

//additional facility for logged in user corrected
function delete_facility($id)
{
   if (is_authenticated() && !empty($id)) {

      $statement = get_connection()->prepare("DELETE  FROM `additionalFacility` WHERE `id` = ? where `owner_mob`=?");
      $statement->execute([$id, $_SESSION['owner_mob']]);
      return (!isset($statement->errorInfo()[2]) && $statement->rowCount() == 1);
   }
   return false;
}
// deleting nutrition for logged in user corrected
function delete_nutrition($id)
{
   if (is_authenticated() && !empty($id)) {

      $statement = get_connection()->prepare("DELETE  FROM `nutrition` WHERE `id` = ? AND `restaurant`=? ");
      $statement->execute([$id, $_SESSION['cafe_name']]);
      return (!isset($statement->errorInfo()[2]) && $statement->rowCount() == 1);
   }
   return false;
}
// delete place menu for logged in user corrected
function delete_place_menu($id)
{
   if (is_authenticated() && !empty($id)) {

      $statement = get_connection()->prepare("DELETE  FROM `placeMenu` WHERE `menu_id` = ? AND `owner_mob`=? ");
      $statement->execute([$id, $_SESSION['owner_mob']]);
      return (!isset($statement->errorInfo()[2]) && $statement->rowCount() == 1);
   }
   return false;
}
// deleting additional for logged in user corrected
function delete_additional_item($id)
{
   if (is_authenticated() && !empty($id)) {

      $statement = get_connection()->prepare("DELETE  FROM `additionalItems` WHERE `id` = ? AND `owner_mob`=? ");
      $statement->execute([$id, $_SESSION['owner_mob']]);
      return (!isset($statement->errorInfo()[2]) && $statement->rowCount() == 1);
   }
   return false;
}

//deleting place reviews of logged in user
function delete_place_review($id)
{
   if (is_authenticated() && !empty($id)) {

      $statement = get_connection()->prepare("DELETE  FROM `placeReviews` WHERE `id` = ? AND `place_name`=? ");
      $statement->execute([$id, $_SESSION['cafe_name']]);
      return (!isset($statement->errorInfo()[2]) && $statement->rowCount() == 1);
   }
   return false;
}

function registered_cafe($cafe_name)
{
   if (!empty($cafe_name)) {
      $statement = get_connection()->prepare("SELECT COUNT(*) FROM `placeDetails` WHERE `cafe_name` = ?");
      $statement->execute([$cafe_name]);
      if (!isset($statement->errorInfo()[2]) && $statement->fetchColumn() == 0) {
         return false;
      }
   }

   return true;
}

function create_account($owner_name, $owner_pass, $owner_email, $owner_mob, $cafe_name, $owner_upi, $location, $cost, $description, $service_area, $facilities, $primary_image, $secondary, $status, $capacity, $individual_reservation, $full_reservation, $longitude, $latitude, $information, $category, $cuisine)
{
   if (!empty($owner_name) && !empty($owner_pass) && !empty($owner_email) && !empty($cafe_name) && !empty($owner_upi) && !empty($location) && !empty($cost) && !empty($description) && !empty($service_area) && !empty($facilities) && !empty($capacity) && !empty($individual_reservation) && !empty($full_reservation) && !empty($longitude) && !empty($information)  && !empty($category) && !empty($cuisine) && !empty($primary_image) && is_array($primary_image) && isset($primary_image['name']) && isset($primary_image['tmp_name']) && isset($primary_image['error']) && $primary_image['error'] == UPLOAD_ERR_OK && isset($primary_image['size']) && $primary_image['size'] > 0) {

      $extension = pathinfo($primary_image['name'], PATHINFO_EXTENSION);
      $extension_2 = pathinfo($secondary['name'], PATHINFO_EXTENSION);
      $primary_image_name = get_random_token() . "." . $extension;
      $secondary_image_name = get_random_token() . "." . $extension_2;
      if (!empty($extension) && !empty($extension_2) && ($extension == 'bmp' || $extension == 'png' || $extension == 'PNG' || $extension == 'jpg' || $extension == 'JPG' || $extension == 'jpeg' || $extension == 'JPEG') && ($extension_2 == 'bmp' || $extension_2 == 'png' || $extension_2 == 'PNG' || $extension_2 == 'jpg' || $extension_2 == 'JPG' || $extension_2 == 'jpeg' || $extension_2 == 'JPEG')) {

         $statement = get_connection()->prepare("INSERT INTO `placeDetails`(`owner_name`,`owner_pass`,`owner_email`, `owner_mob`,`cafe_name`,`owner_upi`, `location`,`cost`,`description`, `service_area`,`facilities`,`primary_image`, `status`,`capacity`,`individual_reservation`, `full_reservation`,`longitude`,`latitude`, `information`,`category`, `cuisine`, `secondary`)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
         $statement->execute([$owner_name, encrypt_password($owner_pass), $owner_email, $owner_mob, $cafe_name, $owner_upi, $location, $cost, $description, $service_area, $facilities, $primary_image_name, $status, $capacity, $individual_reservation, $full_reservation, $longitude, $latitude, $information, $category, $cuisine, $secondary_image_name]);
         if ($statement->rowCount() == 1) {

            if (move_uploaded_file($primary_image['tmp_name'], $GLOBALS['root_dir'] . "images/cafe/" . $primary_image_name) && move_uploaded_file($secondary['tmp_name'], $GLOBALS['root_dir'] . "images/cafe/" . $secondary_image_name)) {

               return true;
            }
         }
      }
   }
   return false;
}
function create_temp_account($owner_name, $owner_pass, $owner_email, $owner_mob, $cafe_name)
{
   if (!empty($owner_name) && !empty($owner_pass) && !empty($owner_email) && !empty($cafe_name) && !empty($owner_mob)) {
      $statement = get_connection()->prepare("INSERT INTO `placeDetails`(`owner_name`,`owner_pass`,`owner_email`, `owner_mob`,`cafe_name`)VALUES(?,?,?,?,?)");
      $statement->execute([$owner_name, encrypt_password($owner_pass), $owner_email, $owner_mob, $cafe_name]);
      return true;
   }
   return false;
}
function get_categories()
{
   $statement = get_connection()->prepare("SELECT `id`, `name` FROM `categories`");
   $statement->execute();

   if (!isset($statement->errorInfo()[2]) && $statement->rowCount() > 0) {
      return $statement->fetchAll(PDO::FETCH_ASSOC);
   }

   return false;
}

function get_locations()
{
   $statement = get_connection()->prepare("SELECT `id`, `name` FROM `location`");
   $statement->execute();

   if (!isset($statement->errorInfo()[2]) && $statement->rowCount() > 0) {
      return $statement->fetchAll(PDO::FETCH_ASSOC);
   }

   return false;
}

//FOR RESETTING PASSWORS
function reset_password($email)
{
   if (!empty($email)) {
      $password = get_one_time_password();

      $statement = get_connection()->prepare("UPDATE `placeDetails` SET `owner_pass` = ? WHERE `owner_email` = ?  LIMIT 1");
      $statement->execute([encrypt_password($password), $email]);

      if (!isset($statement->errorInfo()[2]) && $statement->rowCount() == 1) {
         return mail($email, "New Password", "Your new password is now " . $password);
      }
   }
   return false;
}

//FUNCTION GET ONE TIME PASSWORD
function get_one_time_password()
{
   return rand(100000, 999999);
}
//get profile values
function get_profile_values()
{
   if (is_authenticated()) {

      $statement = get_connection()->prepare("SELECT * FROM `placeDetails` WHERE `cafe_id`=?");
      $statement->execute([$_SESSION['cafe_id']]);
      if (!isset($statement->errorInfo()[2])) {

         if ($statement->rowCount() == 1) {
            return $statement->fetch(PDO::FETCH_ASSOC);
         }
      }
   }
   return false;
}

function get_image_values()
{
   if (is_authenticated()) {

      $statement = get_connection()->prepare("SELECT * FROM `image_list` WHERE `cafe_name`=?");
      $statement->execute([$_SESSION['cafe_name']]);
      if (!isset($statement->errorInfo()[2])) {

         if ($statement->rowCount() == 1) {
            return $statement->fetch(PDO::FETCH_ASSOC);
         }
      }
   }
   return false;
}

function upload_primary($primary_image)
{
   if (is_authenticated() && !empty($primary_image) && is_array($primary_image) && isset($primary_image['name']) && isset($primary_image['tmp_name']) && isset($primary_image['error']) && $primary_image['error'] == UPLOAD_ERR_OK && isset($primary_image['size']) && $primary_image['size'] > 0) {

      $extension = pathinfo($primary_image['name'], PATHINFO_EXTENSION);
      $image_name = get_random_token() . "." . $extension;
      if (!empty($extension) && ($extension == 'bmp' || $extension == 'png' || $extension == 'PNG' || $extension == 'jpg' || $extension == 'JPG' || $extension == 'jpeg' || $extension == 'JPEG')) {

         $statement = get_connection()->prepare("UPDATE `placeDetails` SET `primary_image`=? where `cafe_id`=?");
         $statement->execute([$image_name, $_SESSION['cafe_id']]);
         if ($statement->rowCount() == 1) {

            if (move_uploaded_file($primary_image['tmp_name'], $GLOBALS['root_dir'] . "images/cafe/" . $image_name)) {

               return true;
            }
         }
      }
   }
   return false;
}
function upload_secondary($secondary_image)
{
   if (is_authenticated() && !empty($secondary_image) && is_array($secondary_image) && isset($secondary_image['name']) && isset($secondary_image['tmp_name']) && isset($secondary_image['error']) && $secondary_image['error'] == UPLOAD_ERR_OK && isset($secondary_image['size']) && $secondary_image['size'] > 0) {

      $extension = pathinfo($secondary_image['name'], PATHINFO_EXTENSION);
      $image_name = get_random_token() . "." . $extension;
      if (!empty($extension) && ($extension == 'bmp' || $extension == 'png' || $extension == 'PNG' || $extension == 'jpg' || $extension == 'JPG' || $extension == 'jpeg' || $extension == 'JPEG')) {

         $statement = get_connection()->prepare("UPDATE `placeDetails` SET `secondary`=? where `cafe_id`=?");
         $statement->execute([$image_name, $_SESSION['cafe_id']]);
         if ($statement->rowCount() == 1) {

            if (move_uploaded_file($secondary_image['tmp_name'], $GLOBALS['root_dir'] . "images/cafe/" . $image_name)) {

               return true;
            }
         }
      }
   }
   return false;
}
//uploading of the 15 images into the image list
function upload_image1($image_1, $image_2, $image_3, $image_4, $image_5, $image_6, $image_7, $image_8, $image_9, $image_10, $image_11, $image_12, $image_13, $image_14, $image_15)
{
   if (is_authenticated() && !empty($image_1) && is_array($image_1) && isset($image_1['name']) && isset($image_1['tmp_name']) && isset($image_1['error']) && $image_1['error'] == UPLOAD_ERR_OK && isset($image_1['size']) && $image_1['size'] > 0) {

      $extension = pathinfo($image_1['name'], PATHINFO_EXTENSION);

      $image_name = get_random_token() . "." . $extension;

      if (!empty($extension) && ($extension == 'bmp' || $extension == 'png' || $extension == 'PNG' || $extension == 'jpg' || $extension == 'JPG' || $extension == 'jpeg' || $extension == 'JPEG')) {

         $statement = get_connection()->prepare("UPDATE `image_list` SET `image_1`=? where `cafe_name`=?");
         $statement->execute([$image_name, $_SESSION['cafe_name']]);
         if ($statement->rowCount() == 1) {

            if (move_uploaded_file($image_1['tmp_name'], $GLOBALS['root_dir'] . "images/cafe/" . $image_name)) {

               return true;
            }
         }
      }
   } elseif (is_authenticated() && !empty($image_2) && is_array($image_2) && isset($image_2['name']) && isset($image_2['tmp_name']) && isset($image_2['error']) && $image_2['error'] == UPLOAD_ERR_OK && isset($image_2['size']) && $image_2['size'] > 0) {
      $extension = pathinfo($image_2['name'], PATHINFO_EXTENSION);
      $image_name = get_random_token() . "." . $extension;

      if (!empty($extension) && ($extension == 'bmp' || $extension == 'png' || $extension == 'PNG' || $extension == 'jpg' || $extension == 'JPG' || $extension == 'jpeg' || $extension == 'JPEG')) {

         $statement = get_connection()->prepare("UPDATE `image_list` SET `image_2`=? where `cafe_name`=?");
         $statement->execute([$image_name, $_SESSION['cafe_name']]);
         if ($statement->rowCount() == 1) {

            if (move_uploaded_file($image_2['tmp_name'], $GLOBALS['root_dir'] . "images/cafe/" . $image_name)) {

               return true;
            }
         }
      }
   } elseif (is_authenticated() && !empty($image_3) && is_array($image_3) && isset($image_3['name']) && isset($image_3['tmp_name']) && isset($image_3['error']) && $image_3['error'] == UPLOAD_ERR_OK && isset($image_3['size']) && $image_3['size'] > 0) {
      $extension = pathinfo($image_3['name'], PATHINFO_EXTENSION);
      $image_name = get_random_token() . "." . $extension;

      if (!empty($extension) && ($extension == 'bmp' || $extension == 'png' || $extension == 'PNG' || $extension == 'jpg' || $extension == 'JPG' || $extension == 'jpeg' || $extension == 'JPEG')) {

         $statement = get_connection()->prepare("UPDATE `image_list` SET `image_3`=? where `cafe_name`=?");
         $statement->execute([$image_name, $_SESSION['cafe_name']]);
         if ($statement->rowCount() == 1) {

            if (move_uploaded_file($image_3['tmp_name'], $GLOBALS['root_dir'] . "images/cafe/" . $image_name)) {

               return true;
            }
         }
      }
   } elseif (is_authenticated() && !empty($image_4) && is_array($image_4) && isset($image_4['name']) && isset($image_4['tmp_name']) && isset($image_4['error']) && $image_4['error'] == UPLOAD_ERR_OK && isset($image_4['size']) && $image_4['size'] > 0) {
      $extension = pathinfo($image_4['name'], PATHINFO_EXTENSION);
      $image_name = get_random_token() . "." . $extension;

      if (!empty($extension) && ($extension == 'bmp' || $extension == 'png' || $extension == 'PNG' || $extension == 'jpg' || $extension == 'JPG' || $extension == 'jpeg' || $extension == 'JPEG')) {

         $statement = get_connection()->prepare("UPDATE `image_list` SET `image_4`=? where `cafe_name`=?");
         $statement->execute([$image_name, $_SESSION['cafe_name']]);
         if ($statement->rowCount() == 1) {

            if (move_uploaded_file($image_4['tmp_name'], $GLOBALS['root_dir'] . "images/cafe/" . $image_name)) {

               return true;
            }
         }
      }
   } elseif (is_authenticated() && !empty($image_5) && is_array($image_5) && isset($image_5['name']) && isset($image_5['tmp_name']) && isset($image_5['error']) && $image_5['error'] == UPLOAD_ERR_OK && isset($image_5['size']) && $image_5['size'] > 0) {
      $extension = pathinfo($image_5['name'], PATHINFO_EXTENSION);
      $image_name = get_random_token() . "." . $extension;

      if (!empty($extension) && ($extension == 'bmp' || $extension == 'png' || $extension == 'PNG' || $extension == 'jpg' || $extension == 'JPG' || $extension == 'jpeg' || $extension == 'JPEG')) {

         $statement = get_connection()->prepare("UPDATE `image_list` SET `image_5`=? where `cafe_name`=?");
         $statement->execute([$image_name, $_SESSION['cafe_name']]);
         if ($statement->rowCount() == 1) {

            if (move_uploaded_file($image_5['tmp_name'], $GLOBALS['root_dir'] . "images/cafe/" . $image_name)) {

               return true;
            }
         }
      }
   } elseif (is_authenticated() && !empty($image_6) && is_array($image_6) && isset($image_6['name']) && isset($image_6['tmp_name']) && isset($image_6['error']) && $image_6['error'] == UPLOAD_ERR_OK && isset($image_6['size']) && $image_6['size'] > 0) {
      $extension = pathinfo($image_6['name'], PATHINFO_EXTENSION);
      $image_name = get_random_token() . "." . $extension;

      if (!empty($extension) && ($extension == 'bmp' || $extension == 'png' || $extension == 'PNG' || $extension == 'jpg' || $extension == 'JPG' || $extension == 'jpeg' || $extension == 'JPEG')) {

         $statement = get_connection()->prepare("UPDATE `image_list` SET `image_6`=? where `cafe_name`=?");
         $statement->execute([$image_name, $_SESSION['cafe_name']]);
         if ($statement->rowCount() == 1) {

            if (move_uploaded_file($image_6['tmp_name'], $GLOBALS['root_dir'] . "images/cafe/" . $image_name)) {

               return true;
            }
         }
      }
   } elseif (is_authenticated() && !empty($image_7) && is_array($image_7) && isset($image_7['name']) && isset($image_7['tmp_name']) && isset($image_7['error']) && $image_7['error'] == UPLOAD_ERR_OK && isset($image_7['size']) && $image_7['size'] > 0) {
      $extension = pathinfo($image_7['name'], PATHINFO_EXTENSION);
      $image_name = get_random_token() . "." . $extension;

      if (!empty($extension) && ($extension == 'bmp' || $extension == 'png' || $extension == 'PNG' || $extension == 'jpg' || $extension == 'JPG' || $extension == 'jpeg' || $extension == 'JPEG')) {

         $statement = get_connection()->prepare("UPDATE `image_list` SET `image_7`=? where `cafe_name`=?");
         $statement->execute([$image_name, $_SESSION['cafe_name']]);
         if ($statement->rowCount() == 1) {

            if (move_uploaded_file($image_7['tmp_name'], $GLOBALS['root_dir'] . "images/cafe/" . $image_name)) {

               return true;
            }
         }
      }
   } elseif (is_authenticated() && !empty($image_8) && is_array($image_8) && isset($image_8['name']) && isset($image_8['tmp_name']) && isset($image_8['error']) && $image_8['error'] == UPLOAD_ERR_OK && isset($image_8['size']) && $image_8['size'] > 0) {
      $extension = pathinfo($image_8['name'], PATHINFO_EXTENSION);
      $image_name = get_random_token() . "." . $extension;

      if (!empty($extension) && ($extension == 'bmp' || $extension == 'png' || $extension == 'PNG' || $extension == 'jpg' || $extension == 'JPG' || $extension == 'jpeg' || $extension == 'JPEG')) {

         $statement = get_connection()->prepare("UPDATE `image_list` SET `image_8`=? where `cafe_name`=?");
         $statement->execute([$image_name, $_SESSION['cafe_name']]);
         if ($statement->rowCount() == 1) {

            if (move_uploaded_file($image_8['tmp_name'], $GLOBALS['root_dir'] . "images/cafe/" . $image_name)) {

               return true;
            }
         }
      }
   } elseif (is_authenticated() && !empty($image_9) && is_array($image_9) && isset($image_2['name']) && isset($image_9['tmp_name']) && isset($image_9['error']) && $image_9['error'] == UPLOAD_ERR_OK && isset($image_9['size']) && $image_9['size'] > 0) {
      $extension = pathinfo($image_9['name'], PATHINFO_EXTENSION);
      $image_name = get_random_token() . "." . $extension;

      if (!empty($extension) && ($extension == 'bmp' || $extension == 'png' || $extension == 'PNG' || $extension == 'jpg' || $extension == 'JPG' || $extension == 'jpeg' || $extension == 'JPEG')) {

         $statement = get_connection()->prepare("UPDATE `image_list` SET `image_9`=? where `cafe_name`=?");
         $statement->execute([$image_name, $_SESSION['cafe_name']]);
         if ($statement->rowCount() == 1) {

            if (move_uploaded_file($image_9['tmp_name'], $GLOBALS['root_dir'] . "images/cafe/" . $image_name)) {

               return true;
            }
         }
      }
   } elseif (is_authenticated() && !empty($image_10) && is_array($image_10) && isset($image_10['name']) && isset($image_10['tmp_name']) && isset($image_10['error']) && $image_10['error'] == UPLOAD_ERR_OK && isset($image_10['size']) && $image_10['size'] > 0) {
      $extension = pathinfo($image_10['name'], PATHINFO_EXTENSION);
      $image_name = get_random_token() . "." . $extension;

      if (!empty($extension) && ($extension == 'bmp' || $extension == 'png' || $extension == 'PNG' || $extension == 'jpg' || $extension == 'JPG' || $extension == 'jpeg' || $extension == 'JPEG')) {

         $statement = get_connection()->prepare("UPDATE `image_list` SET `image_10`=? where `cafe_name`=?");
         $statement->execute([$image_name, $_SESSION['cafe_name']]);
         if ($statement->rowCount() == 1) {

            if (move_uploaded_file($image_10['tmp_name'], $GLOBALS['root_dir'] . "images/cafe/" . $image_name)) {

               return true;
            }
         }
      }
   } elseif (is_authenticated() && !empty($image_11) && is_array($image_11) && isset($image_11['name']) && isset($image_11['tmp_name']) && isset($image_11['error']) && $image_11['error'] == UPLOAD_ERR_OK && isset($image_11['size']) && $image_11['size'] > 0) {
      $extension = pathinfo($image_11['name'], PATHINFO_EXTENSION);
      $image_name = get_random_token() . "." . $extension;

      if (!empty($extension) && ($extension == 'bmp' || $extension == 'png' || $extension == 'PNG' || $extension == 'jpg' || $extension == 'JPG' || $extension == 'jpeg' || $extension == 'JPEG')) {

         $statement = get_connection()->prepare("UPDATE `image_list` SET `image_11`=? where `cafe_name`=?");
         $statement->execute([$image_name, $_SESSION['cafe_name']]);
         if ($statement->rowCount() == 1) {

            if (move_uploaded_file($image_11['tmp_name'], $GLOBALS['root_dir'] . "images/cafe/" . $image_name)) {

               return true;
            }
         }
      }
   } elseif (is_authenticated() && !empty($image_12) && is_array($image_12) && isset($image_12['name']) && isset($image_12['tmp_name']) && isset($image_12['error']) && $image_12['error'] == UPLOAD_ERR_OK && isset($image_12['size']) && $image_12['size'] > 0) {
      $extension = pathinfo($image_12['name'], PATHINFO_EXTENSION);
      $image_name = get_random_token() . "." . $extension;

      if (!empty($extension) && ($extension == 'bmp' || $extension == 'png' || $extension == 'PNG' || $extension == 'jpg' || $extension == 'JPG' || $extension == 'jpeg' || $extension == 'JPEG')) {

         $statement = get_connection()->prepare("UPDATE `image_list` SET `image_12`=? where `cafe_name`=?");
         $statement->execute([$image_name, $_SESSION['cafe_name']]);
         if ($statement->rowCount() == 1) {

            if (move_uploaded_file($image_12['tmp_name'], $GLOBALS['root_dir'] . "images/cafe/" . $image_name)) {

               return true;
            }
         }
      }
   } elseif (is_authenticated() && !empty($image_13) && is_array($image_13) && isset($image_13['name']) && isset($image_13['tmp_name']) && isset($image_13['error']) && $image_13['error'] == UPLOAD_ERR_OK && isset($image_13['size']) && $image_13['size'] > 0) {
      $extension = pathinfo($image_13['name'], PATHINFO_EXTENSION);
      $image_name = get_random_token() . "." . $extension;

      if (!empty($extension) && ($extension == 'bmp' || $extension == 'png' || $extension == 'PNG' || $extension == 'jpg' || $extension == 'JPG' || $extension == 'jpeg' || $extension == 'JPEG')) {

         $statement = get_connection()->prepare("UPDATE `image_list` SET `image_13`=? where `cafe_name`=?");
         $statement->execute([$image_name, $_SESSION['cafe_name']]);
         if ($statement->rowCount() == 1) {

            if (move_uploaded_file($image_13['tmp_name'], $GLOBALS['root_dir'] . "images/cafe/" . $image_name)) {

               return true;
            }
         }
      }
   } elseif (is_authenticated() && !empty($image_14) && is_array($image_14) && isset($image_14['name']) && isset($image_14['tmp_name']) && isset($image_14['error']) && $image_14['error'] == UPLOAD_ERR_OK && isset($image_14['size']) && $image_14['size'] > 0) {
      $extension = pathinfo($image_14['name'], PATHINFO_EXTENSION);
      $image_name = get_random_token() . "." . $extension;

      if (!empty($extension) && ($extension == 'bmp' || $extension == 'png' || $extension == 'PNG' || $extension == 'jpg' || $extension == 'JPG' || $extension == 'jpeg' || $extension == 'JPEG')) {

         $statement = get_connection()->prepare("UPDATE `image_list` SET `image_14`=? where `cafe_name`=?");
         $statement->execute([$image_name, $_SESSION['cafe_name']]);
         if ($statement->rowCount() == 1) {

            if (move_uploaded_file($image_14['tmp_name'], $GLOBALS['root_dir'] . "images/cafe/" . $image_name)) {

               return true;
            }
         }
      }
   } elseif (is_authenticated() && !empty($image_15) && is_array($image_15) && isset($image_15['name']) && isset($image_15['tmp_name']) && isset($image_15['error']) && $image_15['error'] == UPLOAD_ERR_OK && isset($image_15['size']) && $image_15['size'] > 0) {
      $extension = pathinfo($image_15['name'], PATHINFO_EXTENSION);
      $image_name = get_random_token() . "." . $extension;

      if (!empty($extension) && ($extension == 'bmp' || $extension == 'png' || $extension == 'PNG' || $extension == 'jpg' || $extension == 'JPG' || $extension == 'jpeg' || $extension == 'JPEG')) {

         $statement = get_connection()->prepare("UPDATE `image_list` SET `image_15`=? where `cafe_name`=?");
         $statement->execute([$image_name, $_SESSION['cafe_name']]);
         if ($statement->rowCount() == 1) {

            if (move_uploaded_file($image_15['tmp_name'], $GLOBALS['root_dir'] . "images/cafe/" . $image_name)) {

               return true;
            }
         }
      }
   }

   return false;
}

//this edit profile make changes to the cafe name it is in the same if statement with edit cafe name and when both this functions are called and successfully execute it the user will be logged off
function edit_profile($owner_name, $owner_email, $owner_upi, $location, $cost, $description, $service_area, $facilities, $capacity, $individual_reservation, $full_reservation, $longitude, $latitude, $information, $category, $cuisine, $address, $photoshoot, $cake)
{
   if (is_authenticated() && !empty($owner_name) && !empty($owner_email) && !empty($owner_upi) && !empty($location) && !empty($cost) && !empty($description) && !empty($service_area) && !empty($facilities) && !empty($cuisine) && !empty($category) && !empty($information) && !empty($full_reservation) && !empty($individual_reservation) && !empty($capacity) && !empty($address)) {
      $statement = get_connection()->prepare("UPDATE `placeDetails` SET `owner_name`=?, `owner_email`=?,`owner_upi`=?, `location`=?,`cost`=?,`description`=?, `service_area`=?,`facilities`=?, `cuisine`=?, `longitude`=?, `latitude`=?,`category`=?,`information`=?, `full_reservation`=?,`individual_reservation`=?,`capacity`=?,`address`=?, `photoShoot`=?, `cake`=? WHERE `cafe_id`=? ");
      $statement->execute([$owner_name, $owner_email, $owner_upi, $location, $cost, $description, $service_area, $facilities, $cuisine, $longitude, $latitude, $category, $information, $full_reservation, $individual_reservation, $capacity, $address, $photoshoot, $cake, $_SESSION['cafe_id']]);

      if (!isset($statement->errorInfo()[2]) && $statement->rowCount() == 1) {
         return true;
      }
   }
   return false;
}
