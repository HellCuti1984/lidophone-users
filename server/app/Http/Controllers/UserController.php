<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    public function __construct(
        private $userService = new UserService()
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        dd();
        return $this->userService->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->userService->store();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->userService->show($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->userService->update($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->userService->destroy($id);
    }
}
