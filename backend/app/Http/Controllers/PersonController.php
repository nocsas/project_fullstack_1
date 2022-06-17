<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// import file model Person
use App\Models\Person;

class PersonController extends Controller
{
    // ambil semua data 
    public function all(){
        return Person::all();
    }

    // ambil data by id
    public function show($id){
        return Person::find($id);
    }

    // menambah data
    public function store(Request $request){
        return Person::create($request->all());
    }

    // mengubah data
    public function update($id, Request $request){
        $person = Person::find($id);
        $person->update($request->all());
        return $person;
    }

    // delete data
    public function delete($id){
        $person = Person::find($id);
        $person->delete();
        return 204;
    }
}
