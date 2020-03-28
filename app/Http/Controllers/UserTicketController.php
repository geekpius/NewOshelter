<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserModel\UserTicket;
use App\UserModel\UserTicketReply;
use Illuminate\Support\Facades\Auth;

class UserTicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('verify-user');
        $this->middleware('auth');
    }

    
    //show all messages
    public function index()
    {
        $data['page_title'] = 'All tickets';
        $data['tickets'] = UserTicket::whereUser_id(Auth::user()->id)->get();
        return view('guest.view-tickets', $data);
    }

    ///open new ticket
    public function create()
    {
        $data['page_title'] = 'Open new ticket';
        return view('guest.new-ticket', $data);
    }

    ///store ticket
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'help_desk' => 'required|string',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);
        if ($validator->fails()){
            $message = 'fail';
        }else{
            $ticket = new UserTicket;
            $ticket->user_id = Auth::user()->id;
            $ticket->help_desk = $request->help_desk;
            $ticket->subject = $request->subject;
            $ticket->message = $request->message;
            $ticket->save();
            $message="success";
        }
        return $message;
    }

    //read ticket and replies
    public function read(UserTicket $userTicket)
    {
        $data['page_title'] = 'Read ticket #'.$userTicket->id;
        $data['ticket'] = $userTicket;
        return view('guest.read-ticket', $data);
    }

    //reply ticket
    public function reply(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'ticket_id' => 'required|string',
            'message' => 'required|string',
        ]);
        if ($validator->fails()){
            $message = 'fail';
        }else{
            $reply = new UserTicketReply;
            $reply->user_ticket_id = $request->ticket_id;
            $reply->message = $request->message;
            $reply->owner = true;
            $reply->save();
            $message="success";
        }
        return $message;
    }

    ///close ticket
    public function close(UserTicket $userTicket)
    {
        $userTicket->status=true;
        $userTicket->update();
        return 'success';
    }



}
