<?php

namespace App\Http\Controllers;

use App\SupportModel\Ticket;
use Illuminate\Http\Request;
use App\SupportModel\TicketReply;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
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
        $data['tickets'] = Ticket::whereUser_id(Auth::user()->id)->get();
        return view('app.view-tickets', $data);
    }

    //create new ticket
    public function create()
    {
        $data['page_title'] = 'New ticket';
        return view('app.new-ticket', $data);
    }

    //save ticket message
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
            $ticket = new Ticket;
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
    public function read(Ticket $ticket)
    {
        $data['page_title'] = 'Read ticket #'.$ticket->id;
        $data['ticket'] = $ticket;
        return view('app.read-ticket', $data);
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
            $reply = new TicketReply;
            $reply->ticket_id = $request->ticket_id;
            $reply->message = $request->message;
            $reply->owner = true;
            $reply->save();
            $message="success";
        }
        return $message;
    }

    ///close ticket
    public function close(Ticket $ticket)
    {
        $ticket->status=true;
        $ticket->update();
        return 'success';
    }


}
