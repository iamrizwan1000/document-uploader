<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\ImageResource;
use App\Http\Resources\RoleResource;
use App\Http\Resources\UserResource;
use App\Models\Document;
use App\Models\User;
use App\Repositories\AuthRepository;
use App\Repositories\Interfaces\UserInterface;
use App\Repositories\UserRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function index(){

        $user = User::paginate(15);

        return Inertia::render('Admin/User/Index', [
            'users' => $user,
        ]);
    }

    public function view($id){

        $user = User::where('id', $id)->first();
        $docs = Document::where('user_id', $id)->orderBy('extension', 'xlsx')->get();
        return Inertia::render('Admin/User/View',[
            'doc' => ImageResource::collection($docs),
            'user' => $user
        ]);
    }


    /**
     * @param UserInterface $userRepository
     * @return \Inertia\Response
     */
    public function profile(UserInterface $userRepository,$id){

        $user = new UserResource(User::find($id));


        return Inertia::render('Admin/User/Form',[
            'user' => $user,
        ]);


    }


    /**
     * @param \Illuminate\Http\Request $request
     * @param UserInterface $userRepository
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProfile(\Illuminate\Http\Request $request, UserInterface $userRepository){


        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['nullable'],
        ]);

        try {
            $userRepository->updateProfile($request->all(),$request['id']);


            return redirect()->back()->with(['title' => 'Success', 'message' => 'Updated Successfully']);
        }catch (\Exception $e){

            return redirect()->back()->with(['title' => 'Success', 'message' => 'Not Updated Successfully']);
        }


    }


}
