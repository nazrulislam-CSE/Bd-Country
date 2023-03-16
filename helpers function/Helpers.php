<?php


use App\Models\Setting;
use App\Models\Pages;
use App\Models\Division;
use App\Models\District;
use App\Models\Upazila;
use App\Models\Union;

use Illuminate\Support\Collection;

if (!function_exists('get_setting')) {
    function get_setting($name)
    {
        return Setting::where('name', $name)->first();
    }
}

//Footer page
if (!function_exists('get_pages_both_footer')) {
    function get_pages_both_footer()
    {
        return Pages::where('status',1)
                ->where('position',2)
                ->orWhere('position',3)
                ->orderBy('id','ASC')
                ->get();
    }
}

//Header page
if (!function_exists('get_pages_nav_header')) {
    function get_pages_nav_header()
    {
        return Pages::where('status',1)
                ->where('position',1)
                ->orderBy('id','ASC')
                ->get();
    }
}

/* ============ Division Select ============ */
if (!function_exists('get_divisions')) {
    function get_divisions()
    {
        return Division::where('status', 1)->get();
    }
}

/* ========== District Select =========== */
if (!function_exists('get_district_by_division_id')) {
    function get_district_by_division_id($id)
    {
        return District::where('division_id', $id)->where('status', 1)->get();
    }
}

/* ========== Upazilla Select =========== */
if (!function_exists('get_upazilla_by_district_id')) {
    function get_upazilla_by_district_id($id)
    {
        return Upazila::where('district_id', $id)->get();
    }
}

/* ========== Union Select =========== */
if (!function_exists('get_upazilla_by_union_id')) {
    function get_upazilla_by_union_id($id)
    {
        return Union::where('upazilla_id', $id)->get();
    }
}