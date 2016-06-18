<?php

namespace App\Http\Controllers;

use App\Court;
use App\CourtUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Foundation\Bus\DispatchesJobs;


use App\Http\Requests;

class CourtsUsersController extends Controller
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth.basic', ['show', 'index', 'store', 'update', 'destroy']);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (CourtUser::all()->count() > 0) {
            return response()->json(['reservations' => CourtUser::all()], 200);
        } else {
            return response()->json(['code' => 404, 'message' => 'Reservation object not found'], 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->has("users_id")) {
            return response()->json(["error" => "400", "message" => "User Id is empty"]);
        } elseif (!$request->has("courts_id")) {
            return response()->json(["error" => "400", "message" => "Court Id is empty"]);
        } elseif (!$request->has("reservation_date")) {
            return response()->json(["error" => "400", "message" => "Reservation is empty"]);
        }
        $court = Court::find($request->input("courts_id"));
        $user = User::find($request->input("users_id"));
        if ($court != null) {
            return response()->json(["error" => "404", "message" => "Court Id not found", "id" => $request->input("courts_id")]);
        } elseif ($user != null) {
            return response()->json(["error" => "404", "message" => "User Id not found", "id" => $request->input("users_id")]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
