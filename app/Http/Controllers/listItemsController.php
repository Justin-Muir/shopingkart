<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\listItems;
use App\Models\shopingList;
class listItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        return listItems::orderBy('created_at', 'DESC')->get($id);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $list_for = ListItems::find($id);
        $listItem = new ListItems;

        $listItem->listfor = $list_for;
        $listItem->price = $request['price'];
        $listItem->quantity = $request['quantity'];
        $listItem->item_name = $request['list_date'];
        $listItem->plus_get= $request['plus_gct'];
        $listItem->list_date= $request['list_date'];




    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
