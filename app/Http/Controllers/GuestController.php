<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;

use App\Guest;
use App\Menu;

use Carbon\Carbon;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $date = Carbon::now()->format('y-m-d');
      $menus = Menu::where('menuDate', $date)
                ->leftJoin('menu_cat', 'menus.menu_cat_id', '=', 'menu_cat.menu_cat_id')
                ->select('menus.*', 'menu_cat.menu_cat_id', 'menu_cat.menuCatName')
                ->get();

      $dt = Carbon::now();
      $dateString = $dt->toFormattedDateString();

      return view('guest.index', [
        'menus' => $menus,
        'date' => $date,
        'dateString' => $dateString
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
      // return view('guest.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
      {
        // validation
         $this->validate($request,[
           'guests_id' => 'required',
           'menus_id' => 'required',
           'transDescription' => 'required|min:6',
           'transDate' => 'required|date',
        ]);
         // create new data
         $transaction = new transaction;
         $transaction->guests_id = $request->guests_id;
         $transaction->menus_id = $request->menus_id;
         $transaction->transDescription = $request->transDescription;
         $transaction->transDate = $request->transDate;
         $transaction->save();
         return redirect()->route('guests.index')->with('alert-success','Order Data Saved!');
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
