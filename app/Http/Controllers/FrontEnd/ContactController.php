<?php

namespace App\Http\Controllers\FrontEnd;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Information;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $information = Information::findOrFail(1);
        return view('frontend.contact')->with('infor', $information);
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
        $fullname = $request->hoten;
        $email = $request->email;
        $phone = $request->sodienthoai;
        $content = $request->noidung;
        $contact = new Contact();
        $contact->fullname = $fullname;
        $contact->email = $email;
        $contact->phone = $phone;
        $contact->content = $content;
        $contact->reply = "Chưa trả lời";
        $contact->id_user = 0;
        $contact->save();
        $request->session()->flash('success','Cảm ơn bạn đã gửi liên hệ! Chúng tôi sẽ phản hồi sớm nhất!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
