<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Court;

class CourtController extends Controller
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth.basic', ['show', 'index', 'store', 'update' . 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Court::all()->count() > 0) {
            return response()->json(['courts' => Court::all()], 200);
        } else {
            return response()->json(['code' => '404', 'message' => 'Court object not found'], 404);
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
        $newCourt = Court::create($request->all());
        return response()->json(["message" => 'Court successfully created', 'court' => $newCourt], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Court::find($id) != null)
            return response()->json(['court' => Court::find($id)], 200);
        else
            return response()->json(['code' => '404', 'message' => 'Court not found', 'id' => $id], 404);
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
        $newCourt = Court::find($id);
        if ($newCourt != null) {
            $newCourt->active = $request->input("active");
            $newCourt->save();
            return response()->json(["message" => "Court successfully updated", "court" => $newCourt], 200);
        } else {
            return response()->json(['code' => 404, 'message' => 'Court not found', "id" => $id], 404);
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
        if (Court::find($id) != null) {
            Court::destroy($id);
            return response()->json(['message' => 'Court deleted successfully'], 204);
        } else
            return response()->json(['code' => '404', 'message' => 'Court not found'], 404);
    }

    /**
     * Display aloowed http methods.
     *
     */
    public function options()
    {
        $headers = ['Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE'];
        return response()->make('', 200, $headers);
    }
}
