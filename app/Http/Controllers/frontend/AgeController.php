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

        if ((intval($day) > 0 && intval($day) <= 31) && (intval($month) > 0 && intval($month) < 13) && (intval($year) > 1940 && intval($day) < 2023)) {

            $date1 = $year . "-" . $month . "-" . $day;
            $date2 = date('Y-m-d');

            $diff = abs(strtotime($date2) - strtotime($date1));

            $years = floor($diff / (365 * 60 * 60 * 24));

            if ($years > 18) {
                $isValid = true;
            }
        }

        return $isValid;
    }
}
