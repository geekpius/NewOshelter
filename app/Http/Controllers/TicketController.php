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
        $this->middleware('verify-admin');
        $this->middleware('auth:admin');
    }


    //show all messages
    public function index()
    {
        $data['page_title'] = 'All Tickets';
        $data['tickets'] = Ticket::whereAdmin_id(Auth::user()->id)->get();
        return view('host.view-tickets', $data);
    }

    //create new ticket
    public function create()
    {
        $data['page_title'] = 'New Tickets';
        return view('host.new-ticket', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            $ticket->admin_id = Auth::user()->id;
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
        $data['page_title'] = 'Read Ticket #'.$ticket->id;
        $data['ticket'] = $ticket;
        return view('host.read-ticket', $data);
    }

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
            $reply->save();
            $message="success";
        }
        return $message;
    }




}
