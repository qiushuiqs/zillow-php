<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchPropertyController extends Controller
{
    public function index(Request $request) {
        $address = $request->input("address", "");

        $curl = curl_init();
        $url = "https://rets.io/api/v1/test/listings?access_token=6baca547742c6f96a6ff71b138424f21";
        if(!empty($address)) {
            $url .= '&address=' . $address;
        }
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_MAXREDIRS, 4);

        $output = curl_exec($curl);

        if($output === false)
        {
            echo 'Curl error: ' . curl_error($curl);
        }
        curl_close($curl);
        if ($output === false) {
            $result = "Request Failed. System May In Maintenance";
        } else {
            $result = json_decode($output);
            $result = $result->bundle;
        }

        return view("main.index", ["properties" => $result]);
    }

    public function getProperty(Request $request, $id) {

        $curl = curl_init();
        $url = "https://rets.io/api/v1/test/listings/{$id}?access_token=6baca547742c6f96a6ff71b138424f21";

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_MAXREDIRS, 4);

        $output = curl_exec($curl);

        if($output === false)
        {
            echo 'Curl error: ' . curl_error($curl);
        }
        curl_close($curl);
        if ($output === false) {
            $result = "Request Failed. System May In Maintenance";
        } else {
            $result = json_decode($output);
            $result = $result->bundle;
        }
        return view("main.propertyModal", ["property" => $result]);
    }
}
