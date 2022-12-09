


<?php
class CafeOwner
{
    private $conn;
    private $tableName = 'placeDetails';
    private $imagesTable = 'image_list';
    private $placeMenu = 'placeMenu';
    private $reviewsTable = 'placeReviews';
    private $foodReviewsTable = 'foodReviews';
    private $foodNutrition = 'nutrition';
    private $additionalFacility = 'additionalFacility';
    private $additionalItem = 'additionalItems';

    //geting the details of a single cafe
    public $cafe_id;
    public $owner_name;
    public $owner_pass;
    public $owner_email;
    public $owner_mob;
    public $cafe_name;
    public $owner_upi;
    public $location;
    public $cost;
    public $description;
    public $service_area;
    public $facilities;
    public $primary_image;
    public $secondary;
    public $status;
    public $cafe_filter;
    public $trending;
    public $category;
    public $full_reservation;
    public $individual_reservation;
    public $longitude;
    public $latitude;
    public $capacity;
    public $information;
    public $cuisine;

    //getting all of the cafe images
    public $image_id;
    public $cafe_owner;
    public $image_1;
    public $image_2;
    public $image_3;
    public $image_4;
    public $image_5;
    public $image_6;
    public $image_7;
    public $image_8;
    public $image_9;
    public $image_10;
    public $image_11;
    public $image_12;
    public $image_13;
    public $image_14;
    public $image_15;
    //getting the menu details
    public $menu_id;
    public $food_image;
    public $food_name;
    public $food_description;
    public $featured_food;
    public $type;
    



    public function __construct($db)
    {
        $this->conn = $db;
    }
    //gets all cafes
    function read()
    {
        $query = "SELECT * FROM " . $this->tableName . " WHERE status <> 0";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
      function readNewest()
    {
        $query = "SELECT * FROM " . $this->tableName . " ORDER BY cafe_id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    function readFoodNutrition()
    {
        $query = "SELECT * FROM " . $this->foodNutrition. " WHERE restaurant = :cafe_name AND food = :food_name";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':cafe_name', $this->cafe_name);
        $stmt->bindParam(':food_name', $this->food_name);
        $stmt->execute();
        return $stmt;
    }
    function readReviews(){
         $query = "SELECT * FROM " . $this->reviewsTable . " ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    function readFoodReviews(){
         $query = "SELECT * FROM " . $this->foodReviewsTable . " ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    function Filter()
    {
        $filterQuery = htmlspecialchars(strip_tags($this->cafe_filter));

        $query = $filterQuery;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    function readLocationFilter()
    {
        $filterQuery = htmlspecialchars(strip_tags($this->cafe_filter));

        $query = $filterQuery;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    function readFacilitiesFilter()
    {
        $filterQuery = htmlspecialchars(strip_tags($this->cafe_filter));

        $query = $filterQuery;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    //read the place Images
    function readCafeImages()
    {
        $query = "SELECT * FROM " . $this->imagesTable . " WHERE cafe_name = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->cafe_name);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->image_id = $row['image_id'];
        $this->cafe_owner = $row['cafe_name'];
        $this->image_1 = $row['image_1'];
        $this->image_2 = $row['image_2'];
        $this->image_3 = $row['image_3'];
        $this->image_4 = $row['image_4'];
        $this->image_5 = $row['image_5'];
        $this->image_6 = $row['image_6'];
        $this->image_7 = $row['image_7'];
        $this->image_8 = $row['image_8'];
        $this->image_9 = $row['image_9'];
        $this->image_10 = $row['image_10'];
        $this->image_11 = $row['image_11'];
        $this->image_12 = $row['image_12'];
        $this->image_13 = $row['image_13'];
        $this->image_14 = $row['image_14'];
        $this->image_15 = $row['image_15'];
    }
    //read the menu
    function readPlaceMenu()
    {
        $query = "SELECT * FROM " . $this->placeMenu . " WHERE owner_mob = :owner_mob";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':owner_mob', $this->owner_mob);
        $stmt->execute();
        return $stmt;
    }
    function readAdditionalFacility()
    {
        $query = "SELECT * FROM " . $this->additionalFacility . " WHERE owner_mob = :owner_mob";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':owner_mob', $this->owner_mob);
        $stmt->execute();
        return $stmt;
    }
     function readAdditionalItems()
    {
        $query = "SELECT * FROM " . $this->additionalItem . " WHERE owner_mob = :owner_mob";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':owner_mob', $this->owner_mob);
        $stmt->execute();
        return $stmt;
    }
    function readPlaceMenuTypes()
    {
        $query = "SELECT * FROM " . $this->placeMenu . " WHERE owner_mob = :owner_mob AND type = :type";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':owner_mob', $this->owner_mob);
        $stmt->bindParam(':type', $this->type);
        $stmt->execute();
        return $stmt;
    }
    //gets a single cafe
    function readOne()
    {
        $query = "SELECT * FROM " . $this->tableName . " WHERE cafe_id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->cafe_id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->cafe_id = $row['cafe_id'];
        $this->owner_name = $row['owner_name'];
        $this->owner_pass = $row['owner_pass'];
        $this->owner_email = $row['owner_email'];
        $this->owner_mob = $row['owner_mob'];
        $this->cafe_name = $row['cafe_name'];
        $this->owner_upi = $row['owner_upi'];
        $this->location = $row['location'];
        $this->cost = $row['cost'];
        $this->description = $row['description'];
        $this->service_area = $row['service_area'];
        $this->facilities = $row['facilities'];
        $this->primary_image = $row['primary_image'];
        $this->secondary = $row['secondary'];
        $this->status = $row['status'];
    }

    function create()
    {

        $query = "INSERT INTO " . $this->tableName . " 
                    SET 
                    owner_name = :owner_name, 
                    owner_pass = :owner_pass, 
                    owner_email = :owner_email, 
                    owner_mob = :owner_mob, 
                    cafe_name = :cafe_name, 
                    owner_upi = :owner_upi, 
                    location = :location, 
                    cost = :cost, 
                    description = :description, 
                    service_area = :service_area, 
                    facilities = :facilities, 
                    primary_image = :primary_image, 
                    secondary = :secondary, 
                    status = :status, 
                    capacity = :capacity, 
                    individual_reservation = :individual_reservation, 
                    full_reservation = :full_reservation, 
                    longitude = :longitude, 
                    latitude = :latitude, 
                    information = :information, 
                    trending = :trending, 
                    category = :category,
                    cuisine = :cuisine";

        $stmt = $this->conn->prepare($query);

        $this->owner_name = htmlspecialchars(strip_tags($this->owner_name));
        $this->owner_mob = htmlspecialchars(strip_tags($this->owner_mob));
        $this->owner_email = htmlspecialchars(strip_tags($this->owner_email));
        $this->cafe_name = htmlspecialchars(strip_tags($this->cafe_name));
        $this->owner_upi = htmlspecialchars(strip_tags($this->owner_upi));
        $this->location = htmlspecialchars(strip_tags($this->location));
        $this->cost = htmlspecialchars(strip_tags($this->cost));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->service_area = htmlspecialchars(strip_tags($this->service_area));
        $this->facilities = htmlspecialchars(strip_tags($this->facilities));
        $this->primary_image = htmlspecialchars(strip_tags($this->primary_image));
        $this->secondary = htmlspecialchars(strip_tags($this->secondary));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->capacity = htmlspecialchars(strip_tags($this->capacity));
        $this->individual_reservation = htmlspecialchars(strip_tags($this->individual_reservation));
        $this->full_reservation = htmlspecialchars(strip_tags($this->full_reservation));
        $this->longitude = htmlspecialchars(strip_tags($this->longitude));
        $this->latitude = htmlspecialchars(strip_tags($this->latitude));
        $this->information = htmlspecialchars(strip_tags($this->information));
        $this->trending = htmlspecialchars(strip_tags($this->trending));
        $this->category = htmlspecialchars(strip_tags($this->category));
        $this->cuisine = htmlspecialchars(strip_tags($this->cuisine));
        $this->owner_pass = htmlspecialchars(strip_tags($this->owner_pass));


        $stmt->bindParam(':owner_name', $this->owner_name);
        $stmt->bindParam(':owner_mob', $this->owner_mob);
        $stmt->bindParam(':owner_email', $this->owner_email);
        $stmt->bindParam(':cafe_name', $this->cafe_name);
        $stmt->bindParam(':owner_upi', $this->owner_upi);
        $stmt->bindParam(':location', $this->location);
        $stmt->bindParam(':cost', $this->cost);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':service_area', $this->service_area);
        $stmt->bindParam(':facilities', $this->facilities);
        $stmt->bindParam(':primary_image', $this->primary_image);
        $stmt->bindParam(':secondary', $this->secondary);
        $stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':capacity', $this->capacity);
        $stmt->bindParam(':individual_reservation', $this->individual_reservation);
        $stmt->bindParam(':full_reservation', $this->full_reservation);
        $stmt->bindParam(':longitude', $this->longitude);
        $stmt->bindParam(':latitude', $this->latitude);
        $stmt->bindParam(':information', $this->information);
        $stmt->bindParam(':trending', $this->trending);
        $stmt->bindParam(':category', $this->category);
        $stmt->bindParam(':cuisine', $this->cuisine);
        $password_hash = password_hash($this->owner_pass, PASSWORD_BCRYPT);
        $stmt->bindParam(':owner_pass', $password_hash);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    function update()
    {


        $query = "UPDATE
                    " . $this->tableName . "
                SET cafe_name = :cafe_name, owner_upi = :owner_upi, location = :location, cost = :cost, description = :description, service_area = :service_area, facilities = :facilities, primary_image = :primary_image, secondary = :secondary, status = :status WHERE owner_email = :owner_email";
        $stmt = $this->conn->prepare($query);


        $this->owner_email = htmlspecialchars(strip_tags($this->owner_email));
        $this->cafe_name = htmlspecialchars(strip_tags($this->cafe_name));
        $this->owner_upi = htmlspecialchars(strip_tags($this->owner_upi));
        $this->location = htmlspecialchars(strip_tags($this->location));
        $this->cost = htmlspecialchars(strip_tags($this->cost));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->service_area = htmlspecialchars(strip_tags($this->service_area));
        $this->facilities = htmlspecialchars(strip_tags($this->facilities));
        $this->primary_image = htmlspecialchars(strip_tags($this->primary_image));
        $this->secondary = htmlspecialchars(strip_tags($this->secondary));
        $this->status = htmlspecialchars(strip_tags($this->status));


        // new user values go here
        $stmt->bindParam(':owner_email', $this->owner_email);
        // $stmt->bindParam(':owner_mob', $this->owner_mob);
        // $stmt->bindParam(':owner_upi', $this->owner_upi);
        $stmt->bindParam(':cafe_name', $this->cafe_name);
        $stmt->bindParam(':owner_upi', $this->owner_upi);
        $stmt->bindParam(':location', $this->location);
        $stmt->bindParam(':cost', $this->cost);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':service_area', $this->service_area);
        $stmt->bindParam(':facilities', $this->facilities);
        $stmt->bindParam(':primary_image', $this->primary_image);
        $stmt->bindParam(':secondary', $this->secondary);
        $stmt->bindParam(':status', $this->status);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
