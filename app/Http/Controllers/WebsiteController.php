<?php

namespace App\Http\Controllers;

use DB;
use Route;
use App\User;
use App\ServiceCharge;
use App\HelpCategory;
use App\HelpQuestion;
use App\HelpTopic;
use App\UserModel\Amenity;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\PropertyModel\Property;
use App\PropertyModel\PropertyType;
use App\PropertyModel\PropertyImage;
use App\UserModel\AccountReactivate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use App\PropertyModel\PropertyCategory;
use App\PropertyModel\PropertyLocation;
use App\ContactModel\Contact;
use App\UserModel\UserVisit;
use App\OrderModel\Order;
use App\EventModel\AuctionEvent;

use App\Http\Resources\PropertyCollection;

use App\Mail\EmailSender;
use Illuminate\Support\Facades\Mail;

class WebsiteController extends Controller
{

    //index page
    public function index()
    {
        // SELECT * FROM properties WHERE is_active=1 AND publish=1 AND done_step=1 AND (id NOT IN (SELECT property_id FROM user_visits) OR id IN (SELECT property_id FROM user_visits WHERE status IN(0,2))) AND (id NOT IN (SELECT property_id FROM orders) OR id IN (SELECT property_id FROM orders WHERE status IN(0,1)))
        $data['page_title'] = null;
        $data['types'] = PropertyType::whereIs_public(true)->get();
        $data['properties'] = Property::wherePublish(true)->whereIs_active(true)->whereDone_step(true)->where('status', Property::APPROVED)->where('type_status','!=','auction')->take(50)->inRandomOrder()->orderBy('id', 'DESC')
//        ->where(function($query){
//            $query->whereNotIn('id', function($query){
//                $query->select('property_id')->from(with(new Order)->getTable());
//            })->orWhereIn('id', function($query){
//                $query->select('property_id')->from(with(new Order)->getTable())->whereIn('status', [0,1]);
//            });
//        })
            ->get();

        $data['count_rent'] = Property::wherePublish(true)->whereIs_active(true)->whereDone_step(true)->where('status', Property::APPROVED)->where('type_status', 'rent')->count();

        $data['count_short_stay'] = Property::wherePublish(true)->whereIs_active(true)->whereDone_step(true)->where('status', Property::APPROVED)->where('type_status', 'short_stay')->count();

        $data['count_sale'] = Property::wherePublish(true)->whereIs_active(true)->whereDone_step(true)->where('status', Property::APPROVED)->where('type_status', 'sale')->count();

        $data['count_auction'] = Property::wherePublish(true)->whereIs_active(true)->whereDone_step(true)->where('status', Property::APPROVED)->where('type_status', 'auction')->count();

        return view('website.welcome', $data);
    }

    // payment call back
    public function callback()
    {

    }

    //property listing status
    public function propertyStatus($status)
    {
        $status = str_replace('-',' ',$status);
        $data['page_title'] = 'Narrow down '.$status.' filter complexity';
        // $data['menu'] = 'pxp-no-bg';
        $data['property_types'] = PropertyType::whereIs_public(true)->get(['name']);
        if($status == 'auction'){
            $data['properties'] = Property::whereType_status('auction')->wherePublish(true)
            ->whereIs_active(true)->whereDone_step(true)->where('status', Property::APPROVED)->orderBy('id', 'DESC')
            ->where(function($query){
                $query->whereNotIn('id', function($query){
                    $query->select('property_id')->from(with(new AuctionEvent)->getTable());
                })->orWhereIn('id', function($query){
                    $query->select('property_id')->from(with(new AuctionEvent)->getTable())->whereIn('status', [0,1]);
                });
            })->paginate(15);
            return view('website.properties.property-auction-status', $data);
        }
        $props = Property::whereType_status(str_replace(' ','_',$status))->wherePublish(true)
        ->whereIs_active(true)->whereDone_step(true)->where('status', Property::APPROVED)->orderBy('id', 'DESC');
//        ->where(function($query){
//            $query->whereNotIn('id', function($query){
//                $query->select('property_id')->from(with(new UserVisit)->getTable());
//            })->orWhereIn('id', function($query){
//                $query->select('property_id')->from(with(new UserVisit)->getTable())->whereIn('status', [0,2]);
//            });
//        })
//            ->where(function($query){
//            $query->whereNotIn('id', function($query){
//                $query->select('property_id')->from(with(new Order)->getTable());
//            })->orWhereIn('id', function($query){
//                $query->select('property_id')->from(with(new Order)->getTable())->whereIn('status', [0,1]);
//            });
//        });
        $data['properties'] = $props->paginate(15);
        if(session()->has('properties'))
        {
            session()->forget('properties');
        }
        session(['properties' => $props->get()]);

        return view('website.properties.property-status', $data);
    }

    //property listing types
    public function propertyType($type)
    {
        $type = str_replace('-',' ',$type);
        $data['page_title'] = 'Explore our neighborhoods on '.str_plural($type);
        $data['property_types'] = PropertyType::whereIs_public(true)->get(['name']);
        $props = Property::whereType(str_replace(' ','_',$type))->wherePublish(true)->whereIs_active(true)->whereDone_step(true)
            ->where('status', Property::APPROVED)->where('type_status','!=','auction')->orderBy('id', 'DESC');
//        $props->where(function($query){
//            $query->whereNotIn('id', function($query){
//                $query->select('property_id')->from(with(new UserVisit)->getTable());
//            })->orWhereIn('id', function($query){
//                $query->select('property_id')->from(with(new UserVisit)->getTable())->whereIn('status', [0,2]);
//            });
//        })->where(function($query){
//            $query->whereNotIn('id', function($query){
//                $query->select('property_id')->from(with(new Order)->getTable());
//            })->orWhereIn('id', function($query){
//                $query->select('property_id')->from(with(new Order)->getTable())->whereIn('status', [0,1]);
//            });
//        });

        $data['properties'] = $props->paginate(15);

        if(session()->has('properties'))
        {
            session()->forget('properties');
        }
        session(['properties' => $props->get()]);
        return view('website.properties.property-types', $data);
    }

    // property type results to map
    public function mapPropertyType()
    {
        $properties = session('properties');
        return PropertyCollection::collection($properties);
    }

    public function mapPropertyStatus()
    {
        $properties = session('properties');
        return PropertyCollection::collection($properties);
    }

    public function singleProperty(Property $property)
    {
        if($property->done_step && $property->is_active && $property->publish && ($property->isVisitorIn() && $property->isSold())){
            $data['page_title'] = 'Detailing '.$property->title.' property for you. Have all the overviews of property to make decisions.';
            $data['property'] = $property;
            $data['charge'] = ServiceCharge::whereProperty_type($property->type_status)->first();
            $countImages = $property->propertyImages->count();
            $data['image'] = $property->propertyImages->first();
            $data['images'] = $property->propertyImages->slice(1)->take($countImages-1);
            //similar properties
            (string) $location = $property->propertyLocation->location;
            $data['properties'] = Property::whereType_status($property->type_status)->wherePublish(true)->whereIs_active(true)->whereDone_step(true)
                ->where('status', Property::APPROVED)->where('id','!=',$property->id)->take(50)->inRandomOrder()
//            ->where(function($query){
//                $query->whereNotIn('id', function($query){
//                    $query->select('property_id')->from(with(new UserVisit)->getTable());
//                })->orWhereIn('id', function($query){
//                    $query->select('property_id')->from(with(new UserVisit)->getTable())->whereIn('status', [0,2]);
//                });
//            })->where(function($query){
//                $query->whereNotIn('id', function($query){
//                    $query->select('property_id')->from(with(new Order)->getTable());
//                })->orWhereIn('id', function($query){
//                    $query->select('property_id')->from(with(new Order)->getTable())->whereIn('status', [0,1]);
//                });
//            })
                ->whereIn('id', function($query) use($location) {
                $query->select('property_id')->from(with(new PropertyLocation)->getTable())
                ->where('location', 'LIKE', '%'.$location.'%');
            })->get();
            if($property->isAuctionProperty()){
                $data['properties'] = Property::whereType_status($property->type_status)->wherePublish(true)->whereIs_active(true)->whereDone_step(true)
                    ->where('status', Property::APPROVED)->where('id','!=',$property->id)->where('type_status','=','auction')->take(50)->inRandomOrder()
                ->whereIn('id', function($query) use($location) {
                    $query->select('property_id')->from(with(new PropertyLocation)->getTable())
                    ->where('location', 'LIKE', '%'.$location.'%');
                })->get();
                return view('website.properties.property-auction-detail', $data);
            }
            return view('website.properties.property-detail', $data);
        }
        else{
            return view('errors.404');
        }
    }

    //all properties
    public function property()
    {
        $data['page_title'] = 'Browse all properties of any kind';
        $data['properties'] = Property::wherePublish(true)->whereIs_active(true)->whereDone_step(true)
        ->where('status', Property::APPROVED)->where('type_status','=','auction')->orderBy('id', 'DESC')
//        ->where(function($query){
//            $query->whereNotIn('id', function($query){
//                $query->select('property_id')->from(with(new UserVisit)->getTable());
//            })->orWhereIn('id', function($query){
//                $query->select('property_id')->from(with(new UserVisit)->getTable())->whereIn('status', [0,2]);
//            });
//        })->where(function($query){
//            $query->whereNotIn('id', function($query){
//                $query->select('property_id')->from(with(new Order)->getTable());
//            })->orWhereIn('id', function($query){
//                $query->select('property_id')->from(with(new Order)->getTable())->whereIn('status', [0,1]);
//            });
//        })
            ->paginate(15);
        $data['property_types'] = PropertyType::get(['name']);
        return view('website.properties.properties', $data);
    }

    // get all properties to the map
    public function mapProperty()
    {
        $properties = Property::wherePublish(true)->whereIs_active(true)->whereDone_step(true)
            ->where('status', Property::APPROVED)->where('type_status', '!=', 'auction')->orderBy('id', 'DESC')
//        ->where(function($query){
//            $query->whereNotIn('id', function($query){
//                $query->select('property_id')->from(with(new UserVisit)->getTable());
//            })->orWhereIn('id', function($query){
//                $query->select('property_id')->from(with(new UserVisit)->getTable())->whereIn('status', [0,2]);
//            });
//        })->where(function($query){
//            $query->whereNotIn('id', function($query){
//                $query->select('property_id')->from(with(new Order)->getTable());
//            })->orWhereIn('id', function($query){
//                $query->select('property_id')->from(with(new Order)->getTable())->whereIn('status', [0,1]);
//            });
//        })
            ->get();
        return PropertyCollection::collection($properties);
    }

    //property search
    public function searchProperty(Request $request)
    {
        if($request->get('query_param')=='simple'){
            $location = $request->get('location');
            $data['page_title'] = $location;
            $props = Property::whereType_status($request->get('status'))->whereIs_active(true)->wherePublish(true)
            ->whereDone_step(true)->where('status', Property::APPROVED)->where('type_status','!=','auction')
            ->whereIn('id', function($query) use($location){
                $query->select('property_id')
                ->from(with(new PropertyLocation)->getTable())
                ->where('location', 'LIKE', '%'.$location.'%');
            });
//            ->where(function($query){
//                $query->whereNotIn('id', function($query){
//                    $query->select('property_id')->from(with(new UserVisit)->getTable());
//                })->orWhereIn('id', function($query){
//                    $query->select('property_id')->from(with(new UserVisit)->getTable())->whereIn('status', [0,2]);
//                });
//            })->where(function($query){
//                $query->whereNotIn('id', function($query){
//                    $query->select('property_id')->from(with(new Order)->getTable());
//                })->orWhereIn('id', function($query){
//                    $query->select('property_id')->from(with(new Order)->getTable())->whereIn('status', [0,1]);
//                });
//            });
            $data['properties'] = $props->orderBy('id','desc')->paginate(15);
            $data['property_types'] = PropertyType::whereIs_public(true)->get(['name']);
            if(session()->has('properties'))
            {
                session()->forget('properties');
            }
            session(['properties' => $props->orderBy('id','desc')->get()]);

            return view('website.properties.search-properties', $data);
        }
        else{
            $location = $request->get('location');
            $data['page_title'] = $location;
            $props = Property::whereType_status($request->get('status'))->whereIs_active(true)->wherePublish(true)
            ->whereDone_step(true)->where('status', Property::APPROVED)->where('type_status','!=','auction');
            if(empty($request->get('type'))){
                $props->whereIn('id', function($query) use($location){
                    $query->select('property_id')
                    ->from(with(new PropertyLocation)->getTable())
                    ->where('location', 'LIKE', '%'.$location.'%');
                })
//                ->where(function($query){
//                    $query->whereNotIn('id', function($query){
//                        $query->select('property_id')->from(with(new UserVisit)->getTable());
//                    })->orWhereIn('id', function($query){
//                        $query->select('property_id')->from(with(new UserVisit)->getTable())->whereIn('status', [0,2]);
//                    });
//                })->where(function($query){
//                    $query->whereNotIn('id', function($query){
//                        $query->select('property_id')->from(with(new Order)->getTable());
//                    })->orWhereIn('id', function($query){
//                        $query->select('property_id')->from(with(new Order)->getTable())->whereIn('status', [0,1]);
//                    });
//                })
                ->whereHas('propertyPrice', function($query) use($request){
                    $min = empty($request->get('min_price'))? 0:$request->get('min_price');
                    $max = empty($request->get('max_price'))? 0:$request->get('max_price');
                    if($min==0 && $max==0){
                        $query->where('property_price','>', 0);
                    }else{
                        $query->whereBetween('property_price', [$min, $max]);
                    }
                })
                ->whereHas('propertyContain', function($query) use($request){
                    if(!empty($request->get('bedroom')) && !empty($request->get('furnish'))){
                        $query->whereBedroom($request->get('bedroom'))->whereFurnish($request->get('furnish'));
                    }elseif(!empty($request->get('bedroom')) || !empty($request->get('furnish'))){
                        $query->whereBedroom($request->get('bedroom'))->orWhere('furnish','=', $request->get('furnish'));
                    }
                });
            }else{
                $props->whereType($request->get('type'));
                $props->whereIn('id', function($query) use($location){
                    $query->select('property_id')
                    ->from(with(new PropertyLocation)->getTable())
                    ->where('location', 'LIKE', '%'.$location.'%');
                })
//                ->where(function($query){
//                    $query->whereNotIn('id', function($query){
//                        $query->select('property_id')->from(with(new UserVisit)->getTable());
//                    })->orWhereIn('id', function($query){
//                        $query->select('property_id')->from(with(new UserVisit)->getTable())->whereIn('status', [0,2]);
//                    });
//                })->where(function($query){
//                    $query->whereNotIn('id', function($query){
//                        $query->select('property_id')->from(with(new Order)->getTable());
//                    })->orWhereIn('id', function($query){
//                        $query->select('property_id')->from(with(new Order)->getTable())->whereIn('status', [0,1]);
//                    });
//                })
                ->whereHas('propertyPrice', function($query) use($request){
                    $min = empty($request->get('min_price'))? 0:$request->get('min_price');
                    $max = empty($request->get('max_price'))? 0:$request->get('max_price');
                    if($min==0 && $max==0){
                        $query->where('property_price','>', 0);
                    }else{
                        $query->whereBetween('property_price', [$min, $max]);
                    }
                })->whereHas('propertyContain', function($query) use($request){
                    if(!empty($request->get('bedroom')) && !empty($request->get('furnish'))){
                        $query->whereBedroom($request->get('bedroom'))->whereFurnish($request->get('furnish'));
                    }elseif(!empty($request->get('bedroom')) || !empty($request->get('furnish'))){
                        $query->whereBedroom($request->get('bedroom'))->orWhere('furnish','=', $request->get('furnish'));
                    }
                });
            }

            $data['properties'] = $props->orderBy('id','desc')->paginate(15);
            if(session()->has('properties'))
            {
                session()->forget('properties');
            }
            session(['properties' => $props->orderBy('id','desc')->get()]);
            $data['property_types'] = PropertyType::whereIs_public(true)->get(['name']);
            return view('website.properties.search-properties', $data);
        }
    }

    // property search results to map
    public function mapSearchProperty()
    {
        $properties = session('properties');
        return PropertyCollection::collection($properties);
    }

    /************ GENERAL ***************/
    public function help()
    {
        $data['page_title'] = 'Oshelter help center';
        $questions = HelpQuestion::whereIs_popular(true)
            ->whereHas('helpTopic', function($query){
                $query->whereHas('helpCategory', function($query){
                    $query->where('category', 'general');
                });
        });
        $data['general'] = $questions->take(8)->get();
        return view('website.help.general.index', $data);
    }

    /************ OWNER AND VISITOR ***************/
    public function otherHelp(string $slug)
    {
        if($slug == 'owning-properties')
        {
            $data['page_title'] = 'Owning properties';
            $questions = HelpQuestion::whereIs_popular(true)
                ->whereHas('helpTopic', function($query){
                    $query->whereHas('helpCategory', function($query){
                        $query->where('category','owner');
                    });
            });
            $data['general'] = $questions->take(8)->get();
            return view('website.help.other.owner', $data);
        }else{
            {
                $data['page_title'] = 'Booking and visitors';
                $questions = HelpQuestion::whereIs_popular(true)
                    ->whereHas('helpTopic', function($query){
                        $query->whereHas('helpCategory', function($query){
                            $query->where('category','visitor');
                        });
                });
                $data['general'] = $questions->take(8)->get();
                return view('website.help.other.visitor', $data);
            }
        }
    }

    public function helpCategory(HelpCategory $helpCategory, string $title)
    {
        $data['page_title'] = ucfirst(strtolower($helpCategory->topic));
        $data['helpCategories'] = HelpCategory::where('category','!=', 'general')->get();
        $data['generals'] = HelpCategory::whereCategory('general')->get();
        $data['helpCategory'] = $helpCategory;
        $data['title'] = $title;
        return view('website.help.read_category', $data);
    }

    public function helpTopic(HelpTopic $helpTopic, string $topic)
    {
        $data['page_title'] = $helpTopic->topic_name;
        $data['helpCategories'] = HelpCategory::where('category','!=', 'general')->get();
        $data['generals'] = HelpCategory::whereCategory('general')->get();
        $data['helpTopic'] = $helpTopic;
        $data['title'] = $topic;
        return view('website.help.read_topic', $data);
    }

    public function readQuestion(HelpQuestion $helpQuestion, string $question)
    {
        $data['page_title'] = $helpQuestion->question;
        $data['helpCategories'] = HelpCategory::where('category','!=', 'general')->get();
        $data['generals'] = HelpCategory::whereCategory('general')->get();
        $data['help'] = $helpQuestion;
        $data['title'] = $question;
        return view('website.help.read_question', $data);
    }

    public function search(string $search)
    {
        $data['questions'] = HelpQuestion::where('question', 'LIKE', '%'.$search.'%')->get();
        return view('website.help.search_results', $data)->render();
    }


    public function becomeOwner()
    {
        $data['page_title'] = 'Becoming an owner';
        return view('website.become_owner', $data);
    }

    public function becomeVisitor()
    {
        $data['page_title'] = 'Becoming a visitor';
        return view('website.become_visitor', $data);
    }


    //why choose us
    public function whyChooseUs($title)
    {
        $data['page_title'] = 'Why choose us. '.ucfirst(str_replace('-',' ',$title));
        // $data['menu'] = 'pxp-no-bg';
        return view('website.choose-us', $data);
    }


    //view deactivated account
    public function accountDeactivated()
    {
        $data['page_title'] = 'Account deactivated';
        $data['menu'] = 'pxp-no-bg';
        return view('website.deactivated', $data);
    }

    //own property
    public function ownProperty()
    {
        $data['page_title'] = 'Own a property of any kind for rent, sell and auction on OShelter';
        // $data['menu'] = 'pxp-no-bg';
        return view('website.ownproperty', $data);
    }

    //host an event
    public function hostEvent()
    {
        $data['page_title'] = 'Host an event, make it know to the world on OShelter';
        // $data['menu'] = 'pxp-no-bg';
        return view('website.hostevent', $data);
    }

    //booking help page
    public function bookingHelp()
    {
        $data['page_title'] = 'Booking and travellers help';
        // $data['menu'] = 'pxp-no-bg';
        $data['types'] = HelpType::whereHelp_type('traveller')->get();
        return view('website.bookinghelp', $data);
    }

    //contact page
    public function contact()
    {
        $data['page_title'] = 'Contact us';
        return view('website.contact', $data);
    }

    public function submitContact(Request $request) : string
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'help_desk' => 'required|string',
            'phone' => 'nullable|numeric',
            'message' => 'required|string',
        ]);

        (string) $message = "";
        if ($validator->fails()){
            $message = 'Something went wrong with your input';
        }else{
//            $contact  = new Contact;
//            $contact->name = $request->name;
//            $contact->email = $request->email;
//            $contact->help_desk = $request->help_desk;
//            $contact->phone = $request->phone;
//            $contact->message = $request->message;
//            $contact->save();

            $data = array(
                "name" => $request->name,
            );
            Mail::to(strtolower($request->email))->send(new EmailSender($data, "Contact Support", "emails.contact"));
            $message="success";
        }
        return $message;
    }

    public function about()
    {
        $data['page_title'] = 'About us';
        $data['properties'] = Property::wherePublish(true)->whereIs_active(true)->whereDone_step(true)->where('status', Property::APPROVED)
        ->where('type_status','!=','auction')->take(50)->inRandomOrder()
//        ->where(function($query){
//            $query->whereNotIn('id', function($query){
//                $query->select('property_id')->from(with(new UserVisit)->getTable());
//            })->orWhereIn('id', function($query){
//                $query->select('property_id')->from(with(new UserVisit)->getTable())->whereIn('status', [0,2]);
//            });
//        })->where(function($query){
//            $query->whereNotIn('id', function($query){
//                $query->select('property_id')->from(with(new Order)->getTable());
//            })->orWhereIn('id', function($query){
//                $query->select('property_id')->from(with(new Order)->getTable())->whereIn('status', [0,1]);
//            });
//        })
            ->get();
        return view('website.about', $data);
    }

    public function email()
    {
        $data = array(
            "name" => "Fiifi Pius",
        );
        return view('emails.contact')->with('data', $data);
    }

    public function currencies()
    {
        // set API Endpoint and API key
        $endpoint = 'latest';
        $access_key = '8c5dc329251f71a140b747bfba552357';

        // Initialize CURL:
        $ch = curl_init('http://data.fixer.io/api/'.$endpoint.'?access_key='.$access_key.'');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Store the data:
        $json = curl_exec($ch);
        curl_close($ch);

        // Decode JSON response:
        $exchangeRates = json_decode($json, true);

        // Access the exchange rate values, e.g. GBP:
        // echo $exchangeRates['rates']['GHS'];
        echo ($exchangeRates['base']);
        echo '<br>';
        echo json_encode($exchangeRates['rates']);

        // $endpoint = 'convert';
        // $access_key = '8c5dc329251f71a140b747bfba552357';

        // $from = 'USD';
        // $to = 'EUR';
        // $amount = 10;

        // // initialize CURL:
        // $ch = curl_init('http://data.fixer.io/api/'.$endpoint.'?access_key='.$access_key.'&from='.$from.'&to='.$to.'&amount='.$amount.'');
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // // get the JSON data:
        // $json = curl_exec($ch);
        // curl_close($ch);

        // // Decode JSON response:
        // $conversionResult = json_decode($json, true);

        // // access the conversion result
        // print_r($conversionResult);
    }





}
