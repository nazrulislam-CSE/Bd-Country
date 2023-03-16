<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\District;
use App\Models\Upazila;
use App\Models\Union;

class CheckoutController extends Controller
{

    /* ============= Start getdivision Method ============== */
    public function getdivision($division_id){
    $division = District::where('division_id', $division_id)->orderBy('name_en','ASC')->get();

        return json_encode($division);
    }
    /* ============= End getdivision Method ============== */

    /* ============= Start getupazilla Method ============== */
    public function getupazilla($district_id){
        $upazilla = Upazila::where('district_id', $district_id)->orderBy('name_en','ASC')->get();

        return json_encode($upazilla);
    }
    /* ============= End getupazilla Method ============== */

    /* ============= Start getunion Method ============== */
    public function getunion($upazilla_id){
        $union = Union::where('upazilla_id', $upazilla_id)->orderBy('name_en','ASC')->get();

        return json_encode($union);
    }
    /* ============= End getunion Method ============== */

    
}
