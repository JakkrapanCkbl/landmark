<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MainController extends Controller
{
    public function checkHelper() {
        // call helper function
        $val = getMessage();
        return $val;
    }

    function formatBytes($size, $precision = 2) { 
        if ($size > 0) {
            $size = (int) $size;
            $base = log($size) / log(1024);
            $suffixes = array(' bytes', ' KB', ' MB', ' GB', ' TB');

            return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
        } else {
            return $size;
        }
    } 

    public function MyFind($TableName, $FieldOut, $StrFilter, $OrderBy) {
        $strsql = "SELECT " . $FieldOut . " FROM " . $TableName;
        if($StrFilter != ''){
            $strsql = $strsql . " " . $StrFilter;
        }
        if($OrderBy != ''){
            $strsql = $strsql . " " . $OrderBy;
        }
        $result = DB::select($strsql);
        
        if ($result == null) {
            // dd("null");
            return null;
        }else {
            return $result[0]->$FieldOut;
        }
    }

    public function ConvertThaiDate2SqlDate($DoMMY){
        
        //$DoMMY = '01 ม.ค. 2024' OR //$DoMMY = '01 ม.ค. 2567'
        $d = substr($DoMMY, 0, 2);
        $y = substr($DoMMY, -4);
         // Now you want to check if $y is 2024 (Gregorian) or 2567 (Buddhist calendar)
        if ($y >= 2500) {
            // It's Buddhist year
            $y = $y - 543;
        }

        $segments = explode(" ", $DoMMY);
        $value = $segments[1];  //month name
        switch ($value) {
            case 'ม.ค.':
            case 'JAN':
                $m = '01';
                break;
            case 'ก.พ.':
            case 'FEB':
                $m = '02';
                break;
            case 'มี.ค.':
            case 'MAR':
                $m = '03';
                break;
            case 'เม.ย.':
            case 'APR':
                $m = '04';
                break;
            case 'พ.ค.':
            case 'MAY':
                $m = '05';
                break;
            case 'มิ.ย.':
            case 'JUN':
                $m = '06';
                break;
            case 'ก.ค.':
            case 'JUL':
                $m = '07';
                break;
            case 'ส.ค.':
            case 'AUG':
                $m = '08';
                break;
            case 'ก.ย.':
            case 'SEP':
                $m = '09';
                break;
            case 'ต.ค.':
            case 'OCT':
                $m = '10';
                break;
            case 'พ.ย.':
            case 'NOV':
                $m = '11';
                break;
            case 'ธ.ค.':
            case 'DEC':
                $m = '12';
                break;
        }
        $result = $y . '-' . $m . '-' . $d;
        return $result;
    }

    public static function showThaiDateShort($arg)
    {
        $thai_months = [
            1 => 'ม.ค.',
            2 => 'ก.พ.',
            3 => 'มี.ค.',
            4 => 'เม.ย.',
            5 => 'พ.ค.',
            6 => 'มิ.ย.',
            7 => 'ก.ค.',
            8 => 'ส.ค.',
            9 => 'ก.ย.',
            10 => 'ต.ค.',
            11 => 'พ.ย.',
            12 => 'ธ.ค.',
        ];
        $date = Carbon::parse($arg);
        $month = $thai_months[$date->month];
        $year = $date->year + 543;
        return $date->format("j $month $year H:i:s");
    }

    

}
