<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Location;

class LocationController extends Controller {

    public function search() {
        return Location::search();
    }

}