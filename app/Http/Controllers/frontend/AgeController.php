<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AgeController extends Controller
{
    public function index()
    {
        if (session()->has('isAdult') && session('isAdult')) {
            return redirect()->route('home');
        }

        return view('frontend/age.index');
    }

    public function store(Request $request)
    {
        if (session()->has('isAdult') && session('isAdult')) {
            return redirect()->route('home');
        }

        $aValidations = array(
            "day" => 'required|digits_between:1,2',
            "month" => 'required|digits_between:1,2',
            "year" => 'required|digits:4',
        );

        $this->validate($request, $aValidations);

        if ($this->isValidDate($request['day'], $request['month'], $request["year"])) {
            session(['isAdult' => true]);
        }

        return redirect()->route('home');
    }

    private function isValidDate($day, $month, $year)
    {
        $isValid = false;

        if (checkdate(intval($month), intval($day), intval($year))) {

            $birthDay = $year . "-" . str_pad($month, 2, '0', STR_PAD_LEFT) . "-" . str_pad($day, 2, '0', STR_PAD_LEFT);

            if ($birthDay < date('Y-m-d', strtotime('-18 years'))) {
                $isValid = true;
            }
        }

        return $isValid;
    }
}
