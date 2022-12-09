<?php

$name = $_POST['name'];

$imagePath = $_FILES['image']['name'];
$tmp_name = $_FILES['image']['tmp_name'];

move_uploaded_file($tmp_name, '../../../images/cafe/'.$imagePath);