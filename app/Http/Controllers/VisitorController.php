<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PropertyModel\Property;
use App\PropertyModel\PropertyImage;
use App\UserModel\UserExtensionRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = 'My visits';
        return view('admin.visits.index', $data);
    }

    public function upcoming()
    {
        $data['page_title'] = 'My upcoming visits';
        return view('admin.visits.upcoming', $data);
    }

    public function current()
    {
        $data['page_title'] = 'My current visits';
        return view('admin.visits.current', $data);
    }

    public function past()
    {
        $data['page_title'] = 'My past visits';
        return view('admin.visits.past', $data);
    }

    public function showVisitedProperty(Property $property)
    {
        $data['page_title'] =  'My visited property';
        $data['property'] = $property;
        $data['images'] = PropertyImage::whereProperty_id($property->id)->skip(1)->take(4)->get(['caption', 'image']);
        return view('admin.visits.visited-property', $data);
    }

    public function extendStay(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'extended_date' => 'required|string',
            'visit_id' => 'required|string',
        ]);
        (string) $message= '';
        if ($validator->fails()){
            $message = 'Some inputs are missing.';
        }else{
            if(UserExtensionRequest::whereUser_id(Auth::user()->id)->whereVisit_id($request->visit_id)->whereIs_confirm(false)->exists()){
                $message = "Already have pending extension request with this property visit.";
            }
            else{
                $extension = new UserExtensionRequest;
                $extension->user_id = Auth::user()->id;
                $extension->visit_id = $request->visit_id;
                $extension->extension_date = Carbon::parse($request->extended_date)->format('Y-m-d');
                $extension->save();
                $message="success";
            }
        }
        return $message;
    }




}
