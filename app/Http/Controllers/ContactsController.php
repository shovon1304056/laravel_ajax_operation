<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Contacts;
use Yajra\Datatables\Datatables;
class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       // $contacts = DB::table('contacts')->orderBy('id','ASC')->get();
        //dd($contacts);
        return view('contacts.index');
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
        //
        $data = array();
        $data['name']=$request->name;
        $data['phone']=$request->phone;
        $data['email']=$request->email;
        $data['religion']=$request->religion;

        $contact = DB::table('contacts')->insert($data);
        return $contact;
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
        $contact = Contacts::find($id);
        return $contact;
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
        $contact = Contacts::find($id);
        return $contact;
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
        $contact = Contacts::find($id);
        $contact->name= $request->name;
        $contact->phone= $request->phone;
        $contact->email= $request->email;
        $contact->religion= $request->religion;
        $contact->update();
        return $contact;
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
        $contact= Contacts::destroy($id);
        return $contact;
    }

     public function all()
    {
        //
        $contacts=DB::table('contacts')->get(); 
        return Datatables::of($contacts)
          ->addColumn('action', function($contacts){
             return '<a onclick="showData('.$contacts->id.')" class="btn btn-sm btn-success">Show</a>'.' '. 
                    '<a onclick="editForm('.$contacts->id.')" class="btn btn-sm btn-info">Edit</a>'.' '. 
                    '<a onclick="deleteData('.$contacts->id.')" class="btn btn-sm btn-danger">Delete</a>';

          })->make(true);
    }
}
