<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Photo;

use App\Http\Requests;

class AdminMediasController extends Controller
{
    //

    public function index() {

    	$photos = Photo::all();

    	return view('admin.media.index', compact('photos'));

    }


    public function create() {

    	return view('admin.media.create');

    }

    public function store(Request $request){

    	$file = $request->file('file');

    	$name = time() . $file->getClientOriginalName();

    	$file->move('images', $name);

    	Photo::create(['file'=>$name]);

    }

    public function destroy($id) {

    	$photo = Photo::findOrFail($id);

    	$path = str_replace('..','', $photo->file);
    	unlink(public_path() . $path);
    	$photo->delete();


    }

    public  function deleteMedia(Request $request){

        if (isset($request->delete_single)) {
            // echo $request->photo;
            // die();
            $this->destroy($request->photo);


             return redirect()->back(); 

        }

        if (isset($request->delete_all) && !empty($request->checkBoxArray)) {
            // print_r($request->checkBoxArray);
            // die();
            $photos = Photo::findOrFail($request->checkBoxArray);

            foreach ($photos as $photo) {
            
                $photo->delete();

            }

            return redirect()->back();    

        }else{

            return redirect()->back();

        }

    }
}
