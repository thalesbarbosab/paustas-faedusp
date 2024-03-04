<?php

namespace App\Http\Controllers\Cms\User;

use Exception;

use App\Services\User\UserService;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Requests\User\UserUpdatePasswordRequest;

class UserController extends Controller
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
            $users = $this->user_service->getAll(true);
            return view('cms.user.index',[
                'users'=>$users
            ]);
        }
        catch (Exception $e) {
            $notification = $this->proccessError($e);
            return back()->with($notification)->withInput();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return view('cms.user.create');
        }
        catch (Exception $e) {
            $notification = $this->proccessError($e);
            return back()->with($notification)->withInput();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        try {
            $this->user_service->create($request->all());
            return to_route('cms.user.index')->with([
                'message' => trans('validation.notification.inserted'),
                'alert-type' => 'success']
            );
        }
        catch (Exception $e) {
            $notification = $this->proccessError($e);
            return back()->with($notification)->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $user = $this->user_service->findOrFail($id, true);
            return view('cms.user.edit',[
                'user'=>$user
            ]);
        }
        catch (Exception $e) {
            $notification = $this->proccessError($e);
            return back()->with($notification)->withInput();
        }
    }

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        try{
            $this->user_service->update($request->all(), $id);
            $notification = array(
                'message' => trans('validation.notification.updated'),
                'alert-type' => 'success'
            );
            return back()->with($notification);
        }
        catch (Exception $e) {
            $notification = $this->proccessError($e);
            return back()->with($notification)->withInput();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(UserUpdatePasswordRequest $request, $id)
    {
        try{
            $this->user_service->update($request->all(), $id);
            $notification = array(
                'message' => trans('validation.notification.updated'),
                'alert-type' => 'success'
            );
            return back()->with($notification);
        }
        catch (Exception $e) {
            $notification = $this->proccessError($e);
            return back()->with($notification)->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $this->user_service->delete($id);
            return back()->with([
                'message' =>  trans('validation.notification.deleted'),
                'alert-type' => 'success'
            ]);
        }
        catch(Exception $e){
           $notification = $this->proccessError($e);
           return back()->with($notification)->withInput();
        }
    }
}
