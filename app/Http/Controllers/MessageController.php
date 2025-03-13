<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Http\Requests\StoremessagesRequest;
use App\Http\Requests\UpdatemessagesRequest;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Message::orderBy('created_at', 'desc')->paginate(10);
        return view('message.index', ['messages' => $messages]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $r = $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'message' => ['required'],
        ]);


        Message::create($r);

        return back()->with('success', 'Your Message was Sent');
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $messages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $messages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {

        $message->is_replied = 1;
        $message->update();

        return back()->with('success', 'Done');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        $message->delete();

        return redirect(route('message.index'))->with('delete', 'message from "' . $message->email . '" Was DELETED!!!');
    }
}
