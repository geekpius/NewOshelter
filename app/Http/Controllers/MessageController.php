<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\MessageModel\Message;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('verify-user');
        $this->middleware('auth');
    }


    //show all messages
    public function index()
    {
        $data['page_title'] = 'Message inbox';
        $data['messages'] = Message::whereDestination(Auth::user()->id)->whereIn('status', [0,1])->orderBy('id','DESC')->paginate(10);
        return view('user.messages.index', $data);
    }

    public function composeMessage(User $user)
    {
        if(Auth::user()->id == $user->id){
            return redirect()->route('messages');
        }
        else{
            $data['page_title'] = 'Compose message to '.$user->name;
            $data['host'] = $user;
            return view('user.messages.compose', $data);
        }
    }

    //send message
    public function sendMessage(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'destination' => 'required|string',
            'message' => 'required|string',
        ]);
        if ($validator->fails()){
            $message = 'fail';
        }else{
            $msg = new Message;
            $msg->user_id = Auth::user()->id;
            $msg->destination = $request->destination;
            $msg->message = $request->message;
            $msg->save();
            $message="success";
        }
        return $message;
    }
    
    //reply message
    public function reply(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'destination' => 'required|integer',
            'message' => 'required|string',
        ]);
        if ($validator->fails()){
            $message = 'fail';
        }else{
            $msg = new Message;
            $msg->user_id = Auth::user()->id;
            $msg->destination = $request->destination;
            $msg->message = $request->message;
            $msg->save();
            $message="success";
        }
        return $message;
    }

    //delete message
    public function read(Message $message)
    {
        if(Auth::user()->id == $message->destination){
            if($message->status==0){
                $message->status = 1;
                $message->update();
                return 'success';
            }else{
                return 'success';
            }
        }
        else{
            return "permission";
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
