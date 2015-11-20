<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Page;

class PageController extends Controller {

    public function search() {
        return Page::search();
    }

}