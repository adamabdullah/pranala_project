<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HitungController extends Controller
{
    public function hitung(Request $request)
    {
        $code = 500;
        $message = "";
        try {
            
            $code = 200;
            
            $validator = Validator::make($request->all(), [
                // 'name' => 'required|unique:mysql.campaign,name',
                // 'contact' => 'required',
                // 'start_campaign' => 'required',
                // 'end_campaign' => 'required',
                // 'template' => ['required', 'string', 'not_regex:/^NULL$/i'],
                'num' => ['required',
                    // function
                    function ($attribute, $value, $fail) {
                        if (!is_numeric($value)) {
                            $fail("Inputan is not number");
                        }
                    }
                ]
            ]
            // [
            //     'template.not_regex' => 'Template field is required.',
            // ]
            );
            if ($validator->fails()) {
                
                // return redirect()->back()->withErrors($validator)->withInput();
                $code = 422;
                $message = "Failed generate segitiga";
                return response()->json(["http_code" => $code, "data" => $validator->errors(), "message" => $message], $code);
            }
            // dd(strlen($request->get('num')));
            $res = "";
            $nol = "0";
            $resArray=[];
            for ($i=0; $i < strlen($request->get('num')); $i++) { 
                # code...
                $number = $request->get('num');
                // dd($number[$i]);
                $res = $number[$i].$nol;
                $nol .= $nol + "0";
                array_push($resArray,$res);
            }
            // dd($resArray);
            $data = $resArray;
            $message = "Success generate segitiga";
        } catch (Exception $e) {
            //throw $th;
            

            // Log::channel("inquiry")->info($log_info . "rollback()");
            // Log::channel("inquiry")->info($log_info . "error exception");
            // Log::channel("inquiry")->info($log_info . $e->getMessage());
            $data = (object) [];
            $message = $e->getMessage();
            // $code = $e->getCode();
        }
        return response()->json(["http_code" => $code, "data" => $data, "message" => $message], $code);
    }

    public function ganjil(Request $request)
    {
        $code = 500;
        $message = "";
        try {
            
            $code = 200;
            
            $validator = Validator::make($request->all(), [
                // 'name' => 'required|unique:mysql.campaign,name',
                // 'contact' => 'required',
                // 'start_campaign' => 'required',
                // 'end_campaign' => 'required',
                // 'template' => ['required', 'string', 'not_regex:/^NULL$/i'],
                'num' => ['required',
                    // function
                    function ($attribute, $value, $fail) {
                        if (!is_numeric($value)) {
                            $fail("Inputan is not number");
                        }
                    }
                ]
            ]
            // [
            //     'template.not_regex' => 'Template field is required.',
            // ]
            );
            if ($validator->fails()) {
                
                // return redirect()->back()->withErrors($validator)->withInput();
                $code = 422;
                $message = "Failed generate segitiga";
                return response()->json(["http_code" => $code, "data" => $validator->errors(), "message" => $message], $code);
            }
            // dd(strlen($request->get('num')));
            $res = "";
            $nol = "0";
            $resArray=[];
            for ($i=0; $i < $request->get('num'); $i++) { 
                # code...
                if($i % 2)
                {
                    array_push($resArray,$i);
                }
                // dd($number[$i]);
                // $nol .= $nol + "0";
            }
            // dd($resArray);
            $data = $resArray;
            $message = "Success generate ganjil";
        } catch (Exception $e) {
            //throw $th;
            

            // Log::channel("inquiry")->info($log_info . "rollback()");
            // Log::channel("inquiry")->info($log_info . "error exception");
            // Log::channel("inquiry")->info($log_info . $e->getMessage());
            $data = (object) [];
            $message = $e->getMessage();
            // $code = $e->getCode();
        }
        return response()->json(["http_code" => $code, "data" => $data, "message" => $message], $code);
    }
    public function prima(Request $request)
    {
        $code = 500;
        $message = "";
        try {
            
            $code = 200;
            
            $validator = Validator::make($request->all(), [
                // 'name' => 'required|unique:mysql.campaign,name',
                // 'contact' => 'required',
                // 'start_campaign' => 'required',
                // 'end_campaign' => 'required',
                // 'template' => ['required', 'string', 'not_regex:/^NULL$/i'],
                'num' => ['required',
                    // function
                    function ($attribute, $value, $fail) {
                        if (!is_numeric($value)) {
                            $fail("Inputan is not number");
                        }
                    }
                ]
            ]
            // [
            //     'template.not_regex' => 'Template field is required.',
            // ]
            );
            if ($validator->fails()) {
                
                // return redirect()->back()->withErrors($validator)->withInput();
                $code = 422;
                $message = "Failed generate segitiga";
                return response()->json(["http_code" => $code, "data" => $validator->errors(), "message" => $message], $code);
            }
            // dd(strlen($request->get('num')));
            $res = "";
            $nol = "0";
            $resArray=[];
            for ($i=1; $i < $request->get('num'); $i++) { 
                # code...
                $a = 0;
                for ($j=1; $j <= $i; $j++) { 
                    if($i % $j == 0)
                    {
                        $a++;
                    }
                }
                if($a == 2)
                {
                    array_push($resArray,$i);

                }
            }
            // dd($resArray);
            $data = $resArray;
            $message = "Success generate prima";
        } catch (Exception $e) {
            //throw $th;
            

            // Log::channel("inquiry")->info($log_info . "rollback()");
            // Log::channel("inquiry")->info($log_info . "error exception");
            // Log::channel("inquiry")->info($log_info . $e->getMessage());
            $data = (object) [];
            $message = $e->getMessage();
            // $code = $e->getCode();
        }
        return response()->json(["http_code" => $code, "data" => $data, "message" => $message], $code);
    }
}