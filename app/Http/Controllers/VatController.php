<?php

namespace App\Http\Controllers;

use App\UserModel\Vat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class VatController extends Controller
{ 
    
    public function __construct()
    {
        $this->middleware('verify-user');
        $this->middleware('auth');
    }

    //get vat info
    public function getVat()
    {
        $vat = Vat::whereUser_id(Auth::user()->id)->first();
        if(empty($vat)){
            return response()->json(array('msg'=>"empty"));
        }else{
            return response()->json($vat);
        }
    }

    //add new vat
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'country' => 'required|string',
            'vat_id' => 'required|string',
            'name_on_registration' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'region_or_province' => 'required|string',
            'zip_postal_code' => 'required|string',
        ]);
        if ($validator->fails()){
            $message = 'Invalid inputs. Try again.';
        }else{
            $myVat = Vat::whereUser_id(Auth::user()->id)->first();
            if(empty($myVat)){
                try{
                    DB::beginTransaction();
                    $vat = new Vat;
                    $vat->user_id = Auth::user()->id;
                    $vat->country = $request->country;
                    $vat->vat_id = $request->vat_id;
                    $vat->name = $request->name_on_registration;
                    $vat->address = $request->address;
                    $vat->city = $request->city;
                    $vat->region = $request->region_or_province;
                    $vat->zip = $request->zip_postal_code;
                    $vat->save();
                    DB::commit();
                    $message = "success";
                }catch(\Exception $e){
                    DB::rollback();
                    $message = 'Something went wrong.';
                }
            }else{
                if($myVat->confirm){
                    $message='confirm';
                }else{
                    $message='Already submitted VAT/TIN. Wait for confirmation.';
                }
            }
        }

        return $message;
    }



}
