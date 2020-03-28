<?php

namespace App\Http\Controllers;

use App\MessageModel\Reply;
use Illuminate\Http\Request;
use App\MessageModel\Message;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('verify-admin');
        $this->middleware('auth:admin');
    }


    //show all messages
    public function index()
    {
        $data['page_title'] = 'Messages';
        $data['messages'] = Message::whereAdmin_id(Auth::user()->id)->whereIn('status', [0,1])->paginate(10);
        return view('host.messages', $data);
    }

    //reply message
    public function reply(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'message_id' => 'required|string',
            'message' => 'required|string',
        ]);
        if ($validator->fails()){
            $message = 'fail';
        }else{
            $reply = new Reply;
            $reply->message_id = $request->message_id;
            $reply->message = $request->message;
            $reply->save();
            $message="success";
        }
        return $message;
    }

    //delete message
    public function read(Message $message)
    {
        if($message->status==0){
            $message->status = 1;
            $message->update();
            return 'success';
        }
    }

    //delete message
    public function delete(Request $request)
    {
        $count  = 0;
        foreach($request->ids as $id){
            $msg = Message::findOrFail($id);
            $msg->status = 2;
            $msg->update();
            $count+=1;
        }
        if($count>0){
            return 'success';
        }
    }

}
