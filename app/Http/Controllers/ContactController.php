<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Controllers\Token;

class ContactController extends Controller
{
    //

    public function index(Request $request) {
        $token = new Token;
        $token->setToken($request->header('token'));
        if($token->checkToken()) {
            return Contact::all();
        } 
        return response()->json(['message'=>'Not logged in'],401);

    }

    public function indexJoin(Request $request) {

        $token = new Token;
        $token->setToken($request->header('token'));
        if($token->checkToken()) {
            $contacts = DB::table('contacts')->join('stages','contacts.stage_id','=', 'stages.id')
            ->join('staff','contacts.staff_id','=','staff.id')
            ->select('contacts.id', 'first_name', 'last_name', 'title', 'phone',
                'contacts.email', 'contact_method','company','address',
                'address2','city','zip_code','website_url',
                'follow_up_date','notes','deal_size',
                'stages.stage' ,'staff.name', 'stage_id', 'staff_id')->get();
            return $contacts;
        } 
        return response()->json(['message'=>'Not logged in'],401);
    }

    public function show(Contact $contact, Request $request) {
        
        $token = new Token;
        $token->setToken($request->header('token'));
        if($token->checkToken()) {
            return $contact;
        } 
        return response()->json(['message'=>'Not logged in'],401);
    }

    public function store(Request $request) {

        $token = new Token;
        $token->setToken($request->header('token'));
        if($token->checkToken()) {
            $contact = Contact::create($request->all());

            return response()->json($contact, 201);
        } 
        return response()->json(['message'=>'Not logged in'],401);
    }

    public function update(Request $request, Contact $contact) {

        $token = new Token;
        $token->setToken($request->header('token'));
        if($token->checkToken()) {
            $contact->update($request->all());

            return response()->json($contact, 200);
        } 
        return response()->json(['message'=>'Not logged in'],401);
    }

    public function delete(Request $request, Contact $contact) {

        $token = new Token;
        $token->setToken($request->header('token'));
        if($token->checkToken()) {
            $contact->delete();

            return response()->json(null, 204);
        } 
        return response()->json(['message'=>'Not logged in'],401);

    }
}
