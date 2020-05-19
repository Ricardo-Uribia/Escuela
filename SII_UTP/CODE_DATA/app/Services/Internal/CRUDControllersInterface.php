<?php

namespace App\Services\Internal;

use Illuminate\Http\Request;

interface CRUDControllersInterface{

	//GET
    public function index();

    //POST 
    public function details(Request $r);  

    //GET
    public function show();

    //GET
    public function createForm();

    //POST
    public function create(Request $r);

    //POST
    public function updateForm(Request $r);

    //POST
    public function update(Request $r);  

    //POST JSON
    public function fetch();

    //POST
    public function delete(Request $r);

    //POST
    public function destroy($id);


}