<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\listItems;
use Illuminate\support\Facades\DB;
class listItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return listItems::orderBy('created_at', 'DESC')->get();
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
        $list_for = $id;
        $listItem = new listItems;
        $listItem->list_for = $list_for;
        $listItem->price = $request->item['price'];
        $listItem->quantity = $request->item['quantity'];
        $listItem->item_name = $request->item['item_name'];
        $listItem->plus_gct = $request->item['plus_gct'];
        $listItem->itemSubTotal = $request->item['itemSubTotal'];
        $listItem->itemTotal = $request->item['itemTotal'];
        $listItem->itemGCT = $request->item['itemGCT'];
        $listItem->save();
        return $listItem;
       
    }

    public function getListTotal($id)
    {   
        $list_for = $id;
        $items = DB::table('list_items')->where('list_for', $list_for)->sum('itemTotal');
        return $items;
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
        $existingItem = listItems::find($id);

        if ($existingItem){
        $existingItem->price = $request->item['price'];
        $existingItem->quantity = $request->item['quantity'];
        $existingItem->item_name = $request->item['item_name'];
        $existingItem->plus_gct = $request->item['plus_gct'];
        $existingItem->itemSubTotal = $request->item['itemSubTotal'];
        $existingItem->itemTotal = $request->item['itemTotal'];
        $existingItem->itemGCT = $request->item['itemGCT'];
        $existingItem->save();

        return $existingItem;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $existingItem = listItems::find($id);

        if ($existingItem) {
            $existingItem->delete();
            return "List succesfully deleted";
        }
        return "list not found";
    }
}
