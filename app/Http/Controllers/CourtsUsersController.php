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
use Illuminate\Support\Facades\Validator;

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
            return response()->json(["code" => 400, "message" => "User Id is empty"], 422);
        } elseif (!$request->has("courts_id")) {
            return response()->json(["code" => 400, "message" => "Court Id is empty"], 422);
        } elseif (!$request->has("reservation_date")) {
            return response()->json(["code" => 400, "message" => "Reservation date is empty"], 422);
        }

        $validator = Validator::make($request->all(), [
            'reservation_date' => 'required|date_format:Y-m-d H:i',
        ]);
        $court = Court::find($request->input("courts_id"));
        $user = User::find($request->input("users_id"));
        if (!$court) {
            return response()->json(["code" => 404, "message" => "Court Id not found", "id" => $request->input("courts_id")], 404);
        }
        if ($court->active == 0) {
            return response()->json(["code" => 400, "message" => "Court not avaliable", "court" => $court], 400);
        } elseif (!$user) {
            return response()->json(["code" => 404, "message" => "User Id not found", "id" => $request->input("users_id")], 404);
        } elseif ($user->enabled == 0) {
            return response()->json(["code" => 400, "message" => "User not enabled", "user" => $user], 400);
        } elseif ($validator->fails()) {
            return response()->json(["code" => 422, "message" => $validator->errors()], 422);
        } elseif (CourtUser::where('reservation_date', $request->input('reservation_date'))->where('courts_id', $request->input('courts_id'))->count() !== 0) {
            return response()->json(["code" => 400, "message" => "Court already reserved for date and time chosen"], 400);
        } else {
            $newReservation = CourtUser::create($request->all());
            return response()->json(["message" => "Reservation created successfully", "reservation" => $newReservation], 201);
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
        $reservation = CourtUser::find($id);
        if ($reservation != null) {
            return response()->json(["code" => "404", "message" => "Id not found", "id" => $id]);
        } else {
            return response()->json(["reservation" => $reservation], 201);
        }
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
        $newReservation = CourtUser::find($id);
        if ($newReservation) {
            if (!$request->has("users_id")) {
                return response()->json(["code" => 400, "message" => "User Id is empty"]);
            } elseif (!$request->has("courts_id")) {
                return response()->json(["code" => 400, "message" => "Court Id is empty"]);
            } elseif (!$request->has("reservation_date")) {
                return response()->json(["code" => 400, "message" => "Reservation is empty"]);
            }

            $validator = Validator::make($request->all(), [
                'reservation_date' => 'required|date_format:Y-m-d H:i',
            ]);
            $court = Court::find($request->input("courts_id"));
            $user = User::find($request->input("users_id"));
            if ($court) {
                return response()->json(["code" => 404, "message" => "Court Id not found", "id" => $request->input("courts_id"), "court" => $court], 404);
            } elseif ($court->active == 0) {
                return response()->json(["code" => 400, "message" => "Court not avaliable", "court" => $court], 400);
            } elseif ($user) {
                return response()->json(["code" => 404, "message" => "User Id not found", "id" => $request->input("users_id")], 404);
            } elseif ($user->enabled == 0) {
                return response()->json(["code" => 400, "message" => "User not enabled", "user" => $user], 400);
            } elseif ($validator->fails()) {
                return response()->json(["code" => 422, "message" => $validator->errors()], 422);
            } elseif (CourtUser::where('reservation_date', $request->input('reservation_date'))->where('courts_id', $request->input('courts_id'))->count() !== 0) {
                return response()->json(["code" => 400, "message" => "Court already reserved for date and time chosen"], 400);
            } else {
                $newReservation->update($request->except(["id"]));
                return response()->json(["message" => "Reservation updated successfully", "reservation" => $newReservation], 201);
            }
        } else {
            return response()->json(["code" => 404, "message" => "Id not found", "id" => $id], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (CourtUser::find($id) != null) {
            CourtUser::destroy($id);
            return response()->json(['message' => 'Reservation deleted successfully'], 204);
        } else
            return response()->json(['code' => '404', 'message' => 'Reservation not found'], 404);
    }
}
