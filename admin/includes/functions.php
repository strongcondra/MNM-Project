<?php
   //FOR GETTING THE DATABASE CONNECTION
   function get_connection() {
      global $database_host, $database_name, $database_user, $database_user_password;
      try {
         $dbh = new PDO("mysql:host=$database_host;dbname=$database_name", $database_user, $database_user_password);
      }
      catch(PDOException $e) {
         exit("<center>database connection failure</center>");
      }

      return $dbh;
   }

   //FOR FILTERING OUT XSS
   function sprint($poison) {
      return htmlentities($poison, ENT_QUOTES, "UTF-8");
   }

   //FOR CLEANING USER INPUT
   function clean($poison, $size = 0) {
      if (empty($size)) return trim(strip_tags($poison));
      return substr(trim(strip_tags($poison)) , 0, $size);
   }

   //FOR GETING A RANDOM STRING
   function get_random_token() {
      return md5(uniqid());
   }

   //THIS IS NOT A SECURE FUNCTION, WILL REPLACE IT WITH A RATHER MORE SECTURE IMPLEMENTATION
   function encrypt_password($password) {
      //CHANGE THIS AND ALL system_users WILL NOT BE ABLE TO LOGIN
      return $password;// md5(md5(md5('SDF*(^SDF&^*%&*SDF%&^%&^S%DF') . $password) . 'SDF&*%^SD*F%&*^S%DF&^$%^SD$%^$%^$SDF$%%^SD$F');
   }

   //FOR SENDING FEEDBACK TO THE USER
   function update_user($address = "", $message = "redirecting", $time = 2) {
      global $base_url;
      exit("<center><h2>{$message}<meta http-equiv=\"refresh\" content=\"{$time};URL='{$base_url}{$address}'\" /></h2></center>");
   }

   function format_raw_datetime($raw_datetime) {
      if (!empty($raw_datetime)) return strtoupper(date("j M G:i", $raw_datetime));
      else return $raw_datetime;
   }

   //FOR AUTHENTICATION USERS
   function passed_authentication($email, $password) {
      if (!empty($email) && !empty($password)) {

         $statement = get_connection()->prepare("SELECT `id`, `email` FROM `admin` WHERE `email` = ? AND `password` = BINARY ? ");
         $statement->execute([$email, encrypt_password($password) ]);

         if (!isset($statement->errorInfo() [2])) {

            if ($statement->rowCount() == 1) {
               $row = $statement->fetch(PDO::FETCH_ASSOC);

               $_SESSION['email'] = $row['email'];
               $_SESSION['user_id'] = $row['id'];

               return true;
            }
         }
      }
      return false;
   }

   //FOR CHECKING TO SEE IF THE USERS IS ALREADY AUTHENTICATED
   function authenticated() {
      return (isset($_SESSION['email']) && isset($_SESSION['user_id']));
   }

   function is_administrator() {
      return authenticated() && $_SESSION['access_level_id'] == 1;
   }

   //FOR GETTING UNIX TIME
   function get_time() {
      return time();
   }

   function registered_user($email) {
      if (authenticated() && !empty($email)) {
         $statement = get_connection()->prepare("SELECT COUNT(*) FROM `admin` WHERE `email` = ?");
         $statement->execute([$email]);
         if (!isset($statement->errorInfo() [2]) && $statement->fetchColumn() == 0) {
            return false;
         }
      }

      return true;
   }
     function registered_admin($username) {
      if (authenticated() && !empty($username)) {
         $statement = get_connection()->prepare("SELECT COUNT(*) FROM `admin` WHERE `userName` = ?");
         $statement->execute([$username]);
         if (!isset($statement->errorInfo() [2]) && $statement->fetchColumn() == 0) {
            return false;
         }
      }

      return true;
   }

   //allowing empty for terms, privacy and refund removed
   function add_administrator($username, $email, $password, $terms, $privacyPolicy, $refundPolicy) {
      if (authenticated() && !empty($username) && !empty($email) && !empty($password)) {
         $statement = get_connection()->prepare("INSERT INTO `admin`(`userName`,`email`,`password`,`terms`,`privacyPolicy`,`refundPolicy`)VALUES(?,?,?,?,?,?)");
         $statement->execute([$username, $email, encrypt_password($password) , $terms, $privacyPolicy, $refundPolicy]);
         return (!isset($statement->errorInfo() [2]) && $statement->rowCount() == 1);
      }
      return false;
   }
   //edit administrator details
   function update_administrator($id, $username, $email, $password, $terms, $privacyPolicy, $refundPolicy) {
      if (authenticated() && !empty($username) && !empty($email) && !empty($password)) {
          $statement = get_connection()->prepare("UPDATE  `admin` SET `userName`=?,`email`=?,`password`= BINARY ?, `terms`=?,`privacyPolicy`=? ,`refundPolicy`=? WHERE  `id`=? ");
         $statement->execute([$username, $email, encrypt_password($password) , $terms, $privacyPolicy, $refundPolicy, $id]);
         return (!isset($statement->errorInfo() [2]) && $statement->rowCount() == 1);

      }elseif (authenticated() && !empty($username) && !empty($email) ) {
          $statement = get_connection()->prepare("UPDATE  `admin` SET `userName`=?,`email`=?, `terms`=?,`privacyPolicy`=? ,`refundPolicy`=? WHERE  `id`=? ");
         $statement->execute([$username, $email, $terms, $privacyPolicy, $refundPolicy, $id]);

         return (!isset($statement->errorInfo() [2]) && $statement->rowCount() == 1);
         
         
      }
      return false;
   }

   function get_admin_values($admin_id) {
      if (authenticated() && isset($admin_id) && !$_POST) {

         $statement = get_connection()->prepare("SELECT `id`, `userName`, `email`, `password`,`email`,`terms`,`privacyPolicy`,`refundPolicy` FROM `admin` WHERE `id`=?");
         $statement->execute([$admin_id]);
         if (!isset($statement->errorInfo() [2])) {

            if ($statement->rowCount() == 1) {
               return $statement->fetch(PDO::FETCH_ASSOC);
            }
         }
      }
      return false;
   }
    function count_admin() {
      if (authenticated()) {
         $statement = get_connection()->prepare("SELECT COUNT(*) FROM `admin`");
         $statement->execute();
         if (!isset($statement->errorInfo() [2]) && $statement->fetchColumn() == 0) {
            return false;
         }
      }

      return true;
   }


   //now generating random token
   function add_cuisine($name, $description, $restaurant, $image) {
      if (!empty($name) && !empty($description) && !empty($restaurant) && !empty($image) && is_array($image) && isset($image['name']) && isset($image['tmp_name']) && isset($image['error']) && $image['error'] == UPLOAD_ERR_OK && isset($image['size']) && $image['size'] > 0) {

         $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
         $image_name = get_random_token() . "." . $extension;
         if (!empty($extension) && ($extension == 'bmp' || $extension == 'png' || $extension == 'PNG' || $extension == 'jpg' || $extension == 'JPG' || $extension == 'jpeg' || $extension == 'JPEG')) {

            $statement = get_connection()->prepare("INSERT INTO `cuisine`(`name`,`description`,`restaurants`,`image`)VALUES(?,?,?,?)");
            $statement->execute([$name, $description, $restaurant, $image_name]);
            if ($statement->rowCount() == 1) {

               if (move_uploaded_file($image['tmp_name'], $GLOBALS['client_dir'] . "images/cuisines/" . $image_name)) {

                  return true;
               }
            }
         }
      }
      return false;
   }

   function get_categories() {
      if (authenticated()) {
         $statement = get_connection()->prepare("SELECT *  FROM `categories`");
         $statement->execute();

         if (!isset($statement->errorInfo() [2]) && $statement->rowCount() > 0) {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
         }
      }
      return false;
   }

   function get_cuisine() {
      if (authenticated()) {
         $statement = get_connection()->prepare("SELECT `id`, `name`, `description`, `restaurants`,`image`  FROM `cuisine`");
         $statement->execute();

         if (!isset($statement->errorInfo() [2]) && $statement->rowCount() > 0) {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
         }
      }
      return false;
   }
   //now generating random token
   function update_cuisine($id, $name, $description, $restaurant, $image) {
      if (!empty($id) && !empty($name) && !empty($description) && !empty($restaurant) && !empty($image) && is_array($image) && isset($image['name']) && isset($image['tmp_name']) && isset($image['error']) && $image['error'] == UPLOAD_ERR_OK && isset($image['size']) && $image['size'] > 0) {

         $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
         $image_name = get_random_token() . "." . $extension;
         if (!empty($extension) && ($extension == 'bmp' || $extension == 'png' || $extension == 'PNG' || $extension == 'jpg' || $extension == 'JPG' || $extension == 'jpeg' || $extension == 'JPEG')) {

            $statement = get_connection()->prepare("UPDATE  `cuisine` SET `name`=?,`description`=?, `restaurants`=?,`image`=? WHERE  `id`=?");
            $statement->execute([$name, $description, $restaurant, $image_name , $id]);
            if ($statement->rowCount() == 1) {
               if (move_uploaded_file($image['tmp_name'], $GLOBALS['client_dir'] . "images/cuisines/" . $image_name)) {

                  return true;
               }
            }
         }
      }
      return false;
   }

   function get_cuisine_table_values($cuisine_id) {
      if (isset($cuisine_id) && !$_POST) {
         // prepare SQL query
         $statement = get_connection()->prepare("SELECT `id`, `name`, `description`, `restaurants`,`image` FROM `cuisine` WHERE `id`=?");
         $statement->execute([$cuisine_id]);
         if (!isset($statement->errorInfo() [2])) {

            if ($statement->rowCount() == 1) {
               return $statement->fetch(PDO::FETCH_ASSOC);
            }
         }
      }
      return false;
   }
   function update_users($id,$username,$email,$usermobile,$useraddress,$userabout,$userimage) {
      if (!empty($id) && !empty($username) && !empty($email) && !empty($usermobile) && !empty($useraddress) && !empty($userabout)&& !empty($userimage)) {

         $extension = pathinfo($userimage['name'], PATHINFO_EXTENSION);
         $image_name = get_random_token() . "." . $extension;
         if (!empty($extension) && ($extension == 'bmp' || $extension == 'png' || $extension == 'PNG' || $extension == 'jpg' || $extension == 'JPG' || $extension == 'jpeg' || $extension == 'JPEG')) {

            $statement = get_connection()->prepare("UPDATE  `users` SET `user_name`=?,`user_email`=?, `user_mobile`=?, `user_about`=?, `user_address`=?, `user_img`=? WHERE  `user_id`=?");
            $statement->execute([$username, $email, $usermobile, $userabout, $useraddress, $image_name , $id]);
            if ($statement->rowCount() == 1) {
               if (move_uploaded_file($userimage['tmp_name'], $GLOBALS['client_dir'] . "images/cafe/" . $image_name)) {

                  return true;
               }
            }
         }
      }
      return false;

   }

   function get_user_values($user_id) {
      if (isset($user_id)) {
         // prepare SQL query
         $statement = get_connection()->prepare("SELECT `user_id`, `user_name`, `user_mobile`, `user_email`,`user_address`, `user_about`,`user_img` FROM `users` WHERE `user_id`=?");
         $statement->execute([$user_id]);
         if (!isset($statement->errorInfo() [2])) {

            if ($statement->rowCount() == 1) {
               return $statement->fetch(PDO::FETCH_ASSOC);
            }
         }
      }
      return false;
   }
   //now generating random token
   function add_category($name, $description, $image) {
      if (!empty($name) && !empty($description) && !empty($image) && is_array($image) && isset($image['name']) && isset($image['tmp_name']) && isset($image['error']) && $image['error'] == UPLOAD_ERR_OK && isset($image['size']) && $image['size'] > 0) {

         $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
         $image_name = get_random_token() . "." . $extension;
         if (!empty($extension) && ($extension == 'bmp' || $extension == 'png' || $extension == 'PNG' || $extension == 'jpg' || $extension == 'JPG' || $extension == 'jpeg' || $extension == 'JPEG')) {

            $statement = get_connection()->prepare("INSERT INTO `categories`(`name`,`description`,`image`)VALUES(?,?,?)");
            $statement->execute([$name, $description, $image_name]);
            if ($statement->rowCount() == 1) {

               if (move_uploaded_file($image['tmp_name'], $GLOBALS['client_dir'] . "images/categories/" . $image_name)) {

                  return true;
               }
            }
         }
      }
      return false;
   }
   //now generating random token for image upload
   function update_category($id, $name, $description, $image) {
      if (!empty($id) && !empty($name) && !empty($description) && !empty($image) && is_array($image) && isset($image['name']) && isset($image['tmp_name']) && isset($image['error']) && $image['error'] == UPLOAD_ERR_OK && isset($image['size']) && $image['size'] > 0) {

         $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
         $image_name = get_random_token() . "." . $extension;
         if (!empty($extension) && ($extension == 'bmp' || $extension == 'png' || $extension == 'PNG' || $extension == 'jpg' || $extension == 'JPG' || $extension == 'jpeg' || $extension == 'JPEG')) {

            $statement = get_connection()->prepare("UPDATE  `categories` SET `name`=?, `description`=? ,`image`=? WHERE `id`=?");
            $statement->execute([$name, $description, $image_name, $id]);
            if ($statement->rowCount() == 1) {

               if (move_uploaded_file($image['tmp_name'], $GLOBALS['client_dir'] . "images/categories/" . $image_name)) {

                  return true;
               }
            }
         }
      }
      return false;
   }

   function get_category_values($category_id) {
      if (isset($category_id) && !$_POST) {

         $statement = get_connection()->prepare("SELECT `id`, `name`, `description`,`image` FROM `categories` WHERE `id`=?");
         $statement->execute([$category_id]);
         if (!isset($statement->errorInfo() [2])) {

            if ($statement->rowCount() == 1) {
               return $statement->fetch(PDO::FETCH_ASSOC);
            }
         }
      }
      return false;
   }
   function get_bookings() {
      if (authenticated()) {
         $statement = get_connection()->prepare("SELECT * FROM `bookings` WHERE `cancelled`= '0'");
         $statement->execute();

         if (!isset($statement->errorInfo() [2]) && $statement->rowCount() > 0) {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
         }
      }
      return false;
   }
   
   function get_package_name() {
      if (authenticated()) {
         $statement = get_connection()->prepare("SELECT * FROM `package` ");
         $statement->execute();

         if (!isset($statement->errorInfo() [2]) && $statement->rowCount() > 0) {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
         }
      }
      return false;
   }
   
    function get_photos() {
  
      if (authenticated()) {
         $statement = get_connection()->prepare("SELECT * FROM `photos` ");
         $statement->execute();

         if (!isset($statement->errorInfo() [2]) && $statement->rowCount() > 0) {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
         }
      }
      return false;
    }

   //corrected from list to get
   function get_favorites() {
      if (authenticated()) {
         $statement = get_connection()->prepare("SELECT `id`, `name`, `description`, `user_mobile`,`image`  FROM `favorites`");
         $statement->execute();

         if (!isset($statement->errorInfo() [2]) && $statement->rowCount() > 0) {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
         }
      }
      return false;

   }

   //corrected from list to get
   function get_orders() {
      if (authenticated()) {
         $statement = get_connection()->prepare("SELECT `id`, `total`, `foodTotal`, `status`, `reservationCost`, `bookingDate`, `dateCreated`, `reservations`, `payMode`, `user_mobile`, `placeName`,`placeImage` FROM `orders`");
         $statement->execute();

         if (!isset($statement->errorInfo() [2]) && $statement->rowCount() > 0) {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
         }
      }
      return false;

   }

   function get_users() {
      if (authenticated()) {
         $statement = get_connection()->prepare("SELECT `user_id`, `user_name`, `user_mobile`, `user_email`, `user_addon`, `user_status`,`user_img` FROM `users`");
         $statement->execute();

         if (!isset($statement->errorInfo() [2]) && $statement->rowCount() > 0) {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
         }
      }
      return false;

   }

   function accept_cafe($id) {
      if (authenticated()) {
         $statement = get_connection()->prepare("UPDATE `placeDetails` SET `status`=1 WHERE `cafe_id`=?");
         $statement->execute([$id]);

         if (!isset($statement->errorInfo() [2]) && $statement->rowCount() == 1) {
            return true;
         }
      }
      return false;
   }
   function deactivate_cafe($id) {
      if (authenticated()) {
         $statement = get_connection()->prepare("UPDATE `placeDetails` SET `status`=0 WHERE `cafe_id`=?");
         $statement->execute([$id]);

         if (!isset($statement->errorInfo() [2]) && $statement->rowCount() == 1) {
            return true;
         }
      }
      return false;
   }

   function get_pending_cafe() {
      if (authenticated()) {
         $statement = get_connection()->prepare("SELECT `cafe_id`, `owner_name`, `owner_mob`, `owner_email`, `cafe_name`, `owner_upi`, `location`, `cost`, `description`, `service_area`, `facilities`, `primary_image`, `secondary`, `status`, `cuisine`, `longitude`, `latitude`, `category`, `information`, `full_reservation`, `individual_reservation`, `capacity`, `trending`, `popular`, `address`, `photoShoot`, `cake` FROM `placeDetails` WHERE `status`=0");
         $statement->execute();

         if (!isset($statement->errorInfo() [2]) && $statement->rowCount() > 0) {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
         }
      }
      return false;

   }

   function get_number_of_bookings() {
      if (authenticated()) {
         $statement = get_connection()->prepare("SELECT COUNT(*) FROM `bookings` WHERE `cancelled`= '0' ");
         $statement->execute();

         if (!isset($statement->errorInfo() [2]) && $statement->rowCount() == 1) {
            return $statement->fetchColumn();
         }
      }
      return 0;
   }

   function get_number_of_categories() {
      if (authenticated()) {
         $statement = get_connection()->prepare("SELECT COUNT(*) FROM `categories`  ");
         $statement->execute();

         if (!isset($statement->errorInfo() [2]) && $statement->rowCount() == 1) {
            return $statement->fetchColumn();
         }
      }
      return 0;
   }

   function get_number_of_facilities() {
      if (authenticated()) {
         $statement = get_connection()->prepare("SELECT COUNT(*) FROM `facilities` ");
         $statement->execute();

         if (!isset($statement->errorInfo() [2]) && $statement->rowCount() == 1) {
            return $statement->fetchColumn();
         }
      }
      return 0;
   }

   function get_number_of_favorites() {
      if (authenticated()) {
         $statement = get_connection()->prepare("SELECT COUNT(*) FROM `favorites` ");
         $statement->execute();

         if (!isset($statement->errorInfo() [2]) && $statement->rowCount() == 1) {
            return $statement->fetchColumn();
         }
      }
      return 0;
   }

   function get_number_of_locations() {
      if (authenticated()) {
         $statement = get_connection()->prepare("SELECT COUNT(*) FROM `location` ");
         $statement->execute();

         if (!isset($statement->errorInfo() [2]) && $statement->rowCount() == 1) {
            return $statement->fetchColumn();
         }
      }
      return 0;
   }

   function get_number_of_orders() {
      if (authenticated()) {
         $statement = get_connection()->prepare("SELECT COUNT(*) FROM `orders` ");
         $statement->execute();

         if (!isset($statement->errorInfo() [2]) && $statement->rowCount() == 1) {
            return $statement->fetchColumn();
         }
      }
      return 0;
   }

   function get_number_of_products() {
      if (authenticated()) {
         $statement = get_connection()->prepare("SELECT COUNT(*) FROM `products` ");
         $statement->execute();

         if (!isset($statement->errorInfo() [2]) && $statement->rowCount() == 1) {
            return $statement->fetchColumn();
         }
      }
      return 0;
   }
   function get_number_of_ratings() {
      if (authenticated()) {
         $statement = get_connection()->prepare("SELECT COUNT(*) FROM `rating` ");
         $statement->execute();

         if (!isset($statement->errorInfo() [2]) && $statement->rowCount() == 1) {
            return $statement->fetchColumn();
         }
      }
      return 0;
   }

   function get_number_of_transactions() {
      if (authenticated()) {
         $statement = get_connection()->prepare("SELECT COUNT(*) FROM `transactions` ");
         $statement->execute();

         if (!isset($statement->errorInfo() [2]) && $statement->rowCount() == 1) {
            return $statement->fetchColumn();
         }
      }
      return 0;
   }

   function get_number_of_users() {
      if (authenticated()) {
         $statement = get_connection()->prepare("SELECT COUNT(*) FROM `users` ");
         $statement->execute();

         if (!isset($statement->errorInfo() [2]) && $statement->rowCount() == 1) {
            return $statement->fetchColumn();
         }
      }
      return 0;
   }

   function get_number_of_cuisines() {
      if (authenticated()) {
         $statement = get_connection()->prepare("SELECT COUNT(*) FROM `cuisine` ");
         $statement->execute();

         if (!isset($statement->errorInfo() [2]) && $statement->rowCount() == 1) {
            return $statement->fetchColumn();
         }
      }
      return 0;
   }

   function get_number_of_pending_cafes() {
      if (authenticated()) {
         $statement = get_connection()->prepare("SELECT COUNT(*) FROM `placeDetails` WHERE `status` =0 ");
         $statement->execute();

         if (!isset($statement->errorInfo() [2]) && $statement->rowCount() == 1) {
            return $statement->fetchColumn();
         }
      }
      return 0;
   }
   function get_number_of_active_cafes() {
      if (authenticated()) {
         $statement = get_connection()->prepare("SELECT COUNT(*) FROM `placeDetails` WHERE `status` =1 ");
         $statement->execute();

         if (!isset($statement->errorInfo() [2]) && $statement->rowCount() == 1) {
            return $statement->fetchColumn();
         }
      }
      return 0;
   }

   function get_active_cafe() {
      if (authenticated()) {
         $statement = get_connection()->prepare("SELECT `cafe_id`, `owner_name`, `owner_mob`, `owner_email`, `cafe_name`, `owner_upi`, `location`, `cost`, `description`, `service_area`, `facilities`, `primary_image`, `secondary`, `status`, `cuisine`, `longitude`, `latitude`, `category`, `information`, `full_reservation`, `individual_reservation`, `capacity`, `trending`, `popular`, `address`, `photoShoot`, `cake` FROM `placeDetails` WHERE `status`=1");
         $statement->execute();

         if (!isset($statement->errorInfo() [2]) && $statement->rowCount() > 0) {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
         }
      }
      return false;

   }

   function get_cafe_details($id){
      if(authenticated() && !empty($id)){
         $statement = get_connection()->prepare("SELECT * FROM `placeDetails` WHERE `cafe_id` = ?");
         $statement->execute([$id]);

         if (!isset($statement->errorInfo()[2]) && $statement->rowCount() == 1) {
            return $statement->fetch(PDO::FETCH_ASSOC);
         }
      }
      return false;
   }

   function update_cafe_details($cafe_id, $owner_name, $owner_mob, $owner_email, $owner_pass, $cafe_name, $owner_upi, $location, $cost, $description, $service_area, $facilities, $status, $cuisine, $longitude, $latitude, $category, $information, $full_reservation, $individual_reservation, $capacity, $trending, $popular, $address, $photoShoot, $cake){
      if(authenticated() && !empty($cafe_id) && !empty($owner_name) && !empty($owner_mob) && !empty($owner_email) && !empty($cafe_name) && !empty($owner_upi) && !empty($location) && !empty($cost) && !empty($description) && !empty($service_area) && !empty($facilities) && !empty($cuisine) && !empty($category) && !empty($information) && !empty($full_reservation) && !empty($individual_reservation) && !empty($capacity) && !empty($address) && !empty($photoShoot) && !empty($cake)){
         $statement = "";

         if(!empty($owner_pass)){
            $statement = get_connection()->prepare("UPDATE `placeDetails` SET `owner_name` = ?, `owner_mob` = ?, `owner_email` = ?, `owner_pass` = ?, `cafe_name` = ?, `owner_upi` = ?, `location` = ?, `cost` = ?, `description` = ?, `service_area` = ?, `facilities` = ?, `status` = ?, `cuisine` = ?, `longitude` = ?, `latitude` = ?, `category` = ?, `information` = ?, `full_reservation` = ?, `individual_reservation` = ?, `capacity` = ?, `trending` = ?, `popular` = ?, `address` = ?, `photoShoot` = ?, `cake` = ? WHERE `cafe_id` = ? LIMIT 1");
            $statement->execute([$owner_name, $owner_mob, $owner_email, password_hash($owner_pass, PASSWORD_BCRYPT), $cafe_name, $owner_upi, $location, $cost, $description, $service_area, $facilities, $status, $cuisine, $longitude, $latitude, $category, $information, $full_reservation, $individual_reservation, $capacity, $trending, $popular, $address, $photoShoot, $cake, $cafe_id]);
         } else {
            $statement = get_connection()->prepare("UPDATE `placeDetails` SET `owner_name` = ?, `owner_mob` = ?, `owner_email` = ?, `cafe_name` = ?, `owner_upi` = ?, `location` = ?, `cost` = ?, `description` = ?, `service_area` = ?, `facilities` = ?, `status` = ?, `cuisine` = ?, `longitude` = ?, `latitude` = ?, `category` = ?, `information` = ?, `full_reservation` = ?, `individual_reservation` = ?, `capacity` = ?, `trending` = ?, `popular` = ?, `address` = ?, `photoShoot` = ?, `cake` = ? WHERE `cafe_id` = ? LIMIT 1");
            $statement->execute([$owner_name, $owner_mob, $owner_email, $cafe_name, $owner_upi, $location, $cost, $description, $service_area, $facilities, $status, $cuisine, $longitude, $latitude, $category, $information, $full_reservation, $individual_reservation, $capacity, $trending, $popular, $address, $photoShoot, $cake, $cafe_id]);
         }

         return (!isset($statement->errorInfo()[2]) && $statement->rowCount() == 1);
      }
      return false;
   }

   function delete_help_question($question_id){
      if(authenticated() && !empty($question_id)){
         $statement = get_connection()->prepare("DELETE FROM `foodHelp` WHERE `id` = ?");
         $statement->execute([$question_id]);

         return (!isset($statement->errorInfo()[2]) && $statement->rowCount() == 1); 
      }
      return false;
   }

   function get_help_questions(){
      if(authenticated()){
         $statement = get_connection()->prepare("SELECT * FROM `foodHelp`");
         $statement->execute();

         if(!isset($statement->errorInfo()[2]) && $statement->rowCount() > 0){
            return $statement->fetchAll(PDO::FETCH_ASSOC);
         }
      }
      return false;
   }

   function add_help_question($question,$answer){
      if(authenticated() && !empty($question) && !empty($answer)){
         $statement = get_connection()->prepare("INSERT INTO `foodHelp`(`question`, `answer`) VALUES (?,?)");
         $statement->execute([$question, $answer]);

         return (!isset($statement->errorInfo()[2]) && $statement->rowCount() == 1);
      }
      return false;
   }

   function delete_place_help_question($question_id){
      if(authenticated() && !empty($question_id)){
         $statement = get_connection()->prepare("DELETE FROM `placesHelp` WHERE `id` = ?");
         $statement->execute([$question_id]);

         return (!isset($statement->errorInfo()[2]) && $statement->rowCount() == 1); 
      }
      return false;
   }

   function get_place_help_questions(){
      if(authenticated()){
         $statement = get_connection()->prepare("SELECT * FROM `placesHelp`");
         $statement->execute();

         if(!isset($statement->errorInfo()[2]) && $statement->rowCount() > 0){
            return $statement->fetchAll(PDO::FETCH_ASSOC);
         }
      }
      return false;
   }

   function add_place_help_question($question,$answer){
      if(authenticated() && !empty($question) && !empty($answer)){
         $statement = get_connection()->prepare("INSERT INTO `placesHelp`(`question`, `answer`) VALUES (?,?)");
         $statement->execute([$question, $answer]);

         return (!isset($statement->errorInfo()[2]) && $statement->rowCount() == 1);
      }
      return false;
   }

   function delete_service_help_question($question_id){
      if(authenticated() && !empty($question_id)){
         $statement = get_connection()->prepare("DELETE FROM `servicesHelp` WHERE `id` = ?");
         $statement->execute([$question_id]);

         return (!isset($statement->errorInfo()[2]) && $statement->rowCount() == 1); 
      }
      return false;
   }

   function get_service_help_questions(){
      if(authenticated()){
         $statement = get_connection()->prepare("SELECT * FROM `servicesHelp`");
         $statement->execute();

         if(!isset($statement->errorInfo()[2]) && $statement->rowCount() > 0){
            return $statement->fetchAll(PDO::FETCH_ASSOC);
         }
      }
      return false;
   }

   function add_service_help_question($question,$answer){
      if(authenticated() && !empty($question) && !empty($answer)){
         $statement = get_connection()->prepare("INSERT INTO `servicesHelp`(`question`, `answer`) VALUES (?,?)");
         $statement->execute([$question, $answer]);

         return (!isset($statement->errorInfo()[2]) && $statement->rowCount() == 1);
      }
      return false;
   }

   function delete_misc_help_question($question_id){
      if(authenticated() && !empty($question_id)){
         $statement = get_connection()->prepare("DELETE FROM `miscHelp` WHERE `id` = ?");
         $statement->execute([$question_id]);

         return (!isset($statement->errorInfo()[2]) && $statement->rowCount() == 1); 
      }
      return false;
   }

   function get_misc_help_questions(){
      if(authenticated()){
         $statement = get_connection()->prepare("SELECT * FROM `miscHelp`");
         $statement->execute();

         if(!isset($statement->errorInfo()[2]) && $statement->rowCount() > 0){
            return $statement->fetchAll(PDO::FETCH_ASSOC);
         }
      }
      return false;
   }

   function add_misc_help_question($question,$answer){
      if(authenticated() && !empty($question) && !empty($answer)){
         $statement = get_connection()->prepare("INSERT INTO `miscHelp`(`question`, `answer`) VALUES (?,?)");
         $statement->execute([$question, $answer]);

         return (!isset($statement->errorInfo()[2]) && $statement->rowCount() == 1);
      }
      return false;
   }
