<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\User;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::orderBy('id','DESC')->paginate(10);
        return view('backend.contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        if(!empty($contact->id_user)){
            $user = User::findOrFail($contact->id_user);
            $contact->user = $user->fullname;
        } else {
            $contact->user = "";
        }
        return view('backend.contact.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        $request->session()->flash('success', 'Xóa thành công!');
        return redirect()->route('adcontact.index');
    }

    public function replyContact(Request $request){
        $contact = Contact::findOrFail($request->id);
        $contact->reply = "Đã trả lời";

        $contact->reply_time = Carbon::now();

        $contact->id_user = Auth::user()->id;
        $contact->save();
        return 1;
    }
}
