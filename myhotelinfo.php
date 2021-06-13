<?php
session_start();
require 'dbconf.php';
//select your hotel if it exists and fill the form or leave it empty to create a new one
$hotelid = '';
$hotel_name = '';
$hotel_stars = '';
$hotel_location = '';
$hotel_description = '';
$hotel_city = '';
if (isset($_SESSION['hotel_id']) && !empty($_SESSION['hotel_id'])) {
    $sqlquery = "SELECT * FROM hotels WHERE hotelid='" . $_SESSION['hotel_id'] . "'";
    $stmt = $conn->prepare($sqlquery);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = ($stmt->fetchAll());

    if (!empty($result[0])) {
        $hotel = $result[0];
        $hotelid = $hotel['hotelid'];
        $hotel_name = $hotel['hotelname'];
        $hotel_stars = $hotel['hotelstar'];
        $hotel_location = $hotel['location'];
        $hotel_description = $hotel['description'];
        $hotel_city = $hotel['nomoi_nomoiid'];
        $longitude = $hotel['longitude'];
        $latitude = $hotel['latitude'];
        $phonenumber = $hotel['phonenumber'];
    }
}
$citysqlquery = "select * from nomoi;";
$citystmt = $conn->prepare($citysqlquery);

$citystmt->execute();
$citystmt->setFetchMode(PDO::FETCH_ASSOC);

$cities = ($citystmt->fetchAll());
?>
<div>
    <form action="ajax_calls.php?call_name=hotel_save" method="POST">
        <input type="text" name="hotelid" id="hotelid" style="display:none" value="<?php echo $hotelid ?>">
        <div class="form-group">
            <label for="hotel_name">Hotel Name</label>
            <input type="text" class="form-control" id="hotel_name" placeholder="Hotel Name" name="hotel_name" value="<?php echo $hotel_name; ?>" value="">
        </div>
        <div class="form-group">
            <label for="stars">Stars</label>
            <select class="form-control" id="stars" name="stars">
                <option value="<?php echo $hotel_stars ?>"><?php echo $hotel_stars; ?></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <textarea class="form-control" id="location" rows="1" name="location"><?php echo $hotel_location; ?></textarea>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" rows="3" name="description"><?php echo $hotel_description; ?></textarea>
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <select class="form-control" id="city" name="city">
                <?php foreach ($cities as $city) {
                    echo '<option value="' . $city['nomoiid'] . '" ';
                    if (isset($hotel_city) && !empty($hotel_city)) {
                        echo 'selected="selected"';
                    }
                    echo '>' . $city['nomoiname'] . '</option>';
                } ?>
            </select>
        </div>

        <div class="form-group">
            <label for="longitude">Longitude</label>
            <textarea class="form-control" id="longitude" rows="1" name="longitude"><?php echo $longitude; ?></textarea>
        </div>
        <div class="form-group">
            <label for="latitude">Latitude</label>
            <textarea class="form-control" id="latitude" rows="1" name="latitude"><?php echo $latitude; ?></textarea>
        </div>
        <div class="form-group">
            <label for="phonenumber">Phonenumber</label>
            <textarea class="form-control" id="phonenumber" rows="1" name="phonenumber"><?php echo $phonenumber; ?></textarea>
        </div>
        <div class="form-group">
            <label for="hotelimage">Hotel Image</label>
            <input type="file" class="form-control-file" id="hotelimage" name="hotelimage">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>