<?php

$connex = mysqli_connect("localhost", "root", "", "urlshortener");
if (!$connex) {
    echo "Database not connected" . mysqli_connect_error();
}