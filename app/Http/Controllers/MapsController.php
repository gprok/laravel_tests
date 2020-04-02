<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapsController extends Controller
{
    public $api_key;

    public function __construct() {
        $this->api_key = env("GOOGLE_MAPS_API_KEY", "");
    }


    public function hello() {
        $data['api_key'] = $this->api_key;

        return View('maps.hello', $data);
    }
}
