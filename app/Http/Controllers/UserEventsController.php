<?php

namespace App\Http\Controllers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Query\Builder;

use App\Models\UserEventsTable;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class UserEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserEventsTable::all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function grouped()
    {

        return UserEventsTable::all()->groupBy('eventType');

        /* needs completing:
        $grouped = DB::table('user_events_table')
            ->selectRaw('"userId", "eventType", COUNT(*)')
            ->groupByRaw('"userId", "eventType"')
            ->get();*/

        /* we're looking for something like this:
        "userId": 144 {
            events: 3 {
                "eventType": "view" {
                    "eventId": 243,
                    "eventMessage": "view product X"
                    "eventId": 244,
                    "eventMessage": "view product X"
                }
                "eventType": "check" {
                    "eventId": 245,
                    "eventMessage": "check product X"
                    "eventId": 246,
                    "eventMessage": "check product X"
                }
                "eventType": "buy" {
                    "eventId": 247,
                    "eventMessage": "buy product X"
                    "eventId": 248,
                    "eventMessage": "buy product X"
                }
            }
        }
        */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
