<?php

namespace App\Http\Controllers\Cms\User;

use Exception;

use App\Http\Controllers\Controller;
use App\Services\User\UserService;

class ProfileController extends Controller
{
    public function __construct(
        protected readonly UserService $user_service
    ){}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $user = $this->user_service->findOrFail(auth()->user()->id, true);
            return view('cms.user.profile.index',[
                'user'=>$user
            ]);
        }
        catch (Exception $e) {
            $notification = $this->proccessError($e);
            return back()->with($notification)->withInput();
        }
    }
}
