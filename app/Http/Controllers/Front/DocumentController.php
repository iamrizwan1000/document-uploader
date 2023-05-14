<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\DocumentResource;
use App\Http\Resources\ImageResource;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Inertia\Inertia;
use Intervention\Image\Facades\Image;

class DocumentController extends Controller
{

    public function index(){

        $documents = Document::where('user_id', Auth::user()->id)->get();
        return Inertia::render('New/Index',[
            'docs' => DocumentResource::collection($documents)
        ]);
    }


    public function create(){

        return Inertia::render('New/Form');
    }

    public function store(Request $request){

        $request->validate([
            'file.*' => 'required|mimes:jpg,docx,jpeg,png,csv,xls,xlsx,pdf|max:4096',
        ]);

        foreach ($request->file as $file){
//dd($file->getClientOriginalName());
//            $imageName = sha1(time()) . md5(rand(1000, 9999)) .'.'.$file->extension();
            $imageName = $file->getClientOriginalName();

            $file->move(public_path('images'), $imageName);
            $image_name = $imageName;

            $document = new Document();
            $document->image = $image_name;
            $document->user_id = Auth::user()->id;
            $document->save();

        }

        return redirect()->back()->with(['title' => 'Success', 'message' => 'You have successfully upload image.']);

    }

    public function edit($id){

        $document = Document::find($id);
        return Inertia::render('Front/Document/Form',[
            'docs' => new DocumentResource($document)
        ]);
    }

    public function view($id){

        $document = Document::find($id);
        return Inertia::render('Front/Document/View',[
            'doc' => new DocumentResource($document)
        ]);
    }

    public function update(Request $request){


        try {
            $request->validate([
//            'file' => 'required|mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf|max:4096',
            ]);

            $document = Document::find($request['id']);

            if (request()->hasFile('file')) {
                if(File::exists(public_path('images/'.$document->image))){
                    File::delete(public_path('images/'.$document->image));
                }

                $imageName = sha1(time()) . md5(rand(1000, 9999)) .'.'.$request['file']->extension();
                $request['file']->move(public_path('images'), $imageName);
                $image_name = $imageName;
                $document->image = $image_name;
            }

            $document->user_id = Auth::user()->id;
            $document->save();

            return redirect()->back()->with(['title' => 'Success', 'message' => 'You have successfully updated record.']);

        }catch (\Exception $e){
            return redirect()->back()->with(['title' => 'Error', 'message' => $e->getMessage()]);
        }


    }

    public function delete($id){


        try {


            $document = Document::find($id);

            if ($document) {
                if(File::exists(public_path('images/'.$document->image))){
                    File::delete(public_path('images/'.$document->image));
                }

                $document->delete();
            }


            return redirect()->back()->with(['title' => 'Success', 'message' => 'You have successfully updated record.']);

        }catch (\Exception $e){
            return redirect()->back()->with(['title' => 'Error', 'message' => $e->getMessage()]);
        }


    }

}
