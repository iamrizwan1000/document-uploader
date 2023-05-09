<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\ImageResource;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Inertia\Inertia;
use Intervention\Image\Facades\Image;

class DocumentController extends Controller
{

    public function create(){

        return Inertia::render('Front/Document/Form');
    }

    public function store(Request $request){

        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png,csv,xls,xlsx,pdf|max:4096',
            'name' => 'required',
            'description' => 'required',
        ]);

        $extension = $request['file']->getClientOriginalName();
        $extension = substr($extension, strpos($extension, ".") + 1);

        $imageName = sha1(time()) . md5(rand(1000, 9999)) .'.'.$request['file']->extension();

        $request['file']->move(public_path('images'), $imageName);
        $image_name = $imageName;

        $document = new Document();
        $document->name = $request['name'];
        $document->extension = $extension;
        $document->description = $request['description'];
        $document->image = $image_name;
        $document->user_id = Auth::user()->id;
        $document->save();

        return redirect()->back()->with(['title' => 'Success', 'message' => 'You have successfully upload image.']);

    }

    public function edit($id){

        $document = Document::find($id);
        return Inertia::render('Front/Document/Form',[
            'docs' => new ImageResource($document)
        ]);
    }

    public function view($id){

        $document = Document::find($id);
        return Inertia::render('Front/Document/View',[
            'doc' => new ImageResource($document)
        ]);
    }

    public function update(Request $request){


        try {
            $request->validate([
//            'file' => 'required|mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf|max:4096',
                'name' => 'required',
                'description' => 'required',
            ]);

            $document = Document::find($request['id']);

            if (request()->hasFile('file')) {
                if(File::exists(public_path('images/'.$document->image))){
                    File::delete(public_path('images/'.$document->image));
                }
                $extension = $request['file']->getClientOriginalName();
                $extension = substr($extension, strpos($extension, ".") + 1);

                $imageName = sha1(time()) . md5(rand(1000, 9999)) .'.'.$request['file']->extension();
                $request['file']->move(public_path('images'), $imageName);
                $image_name = $imageName;
                $document->extension = $extension;
                $document->image = $image_name;
            }

            $document->name = $request['name'];
            $document->description = $request['description'];
            $document->user_id = Auth::user()->id;
            $document->save();

            return redirect()->back()->with(['title' => 'Success', 'message' => 'You have successfully updated record.']);

        }catch (\Exception $e){
            return redirect()->back()->with(['title' => 'Error', 'message' => $e->getMessage()]);
        }


    }

}
