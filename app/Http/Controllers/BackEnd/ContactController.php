<?php

namespace App\Http\Controllers\BackEnd;

use App\ParentCat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\User;

class ContactController extends Controller
{
    protected $parentcats;
    function __construct()
    {
        $this->middleware('auth');
        $this->parentcats = ParentCat::all();
    }
    public function index()
    {
        $contacts = Contact::orderBy('id','DESC')->paginate(10);
        return view('backend.contact.index', compact('contacts'))
                ->with('parentcats',$this->parentcats);
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        if(!empty($contact->id_user)){
            $user = User::findOrFail($contact->id_user);
            $contact->user = $user->fullname;
        } else {
            $contact->user = "";
        }
        return view('backend.contact.show', compact('contact'))
            ->with('parentcats',$this->parentcats);
    }


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
