<?php

namespace App\Http\Controllers;

use App\UserModel\Message;
use App\MessageModel\Reply;
use Illuminate\Http\Request;

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
        return view('host.messages', $data);
    }

    //send message
    public function store(Request $request)
    {
        //
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserModel\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserModel\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserModel\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
