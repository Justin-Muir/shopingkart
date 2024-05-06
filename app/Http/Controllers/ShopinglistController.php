<?php

namespace App\Http\Controllers;

use App\Models\shopingList;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
class ShopinglistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return shopingList::orderBy('created_at', 'DESC')->get();
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
    public function store(Request $request)
    {
        $newList = new shopingList;
        $newList->listfor = $request->list['listfor'];
        $newList->listdate = $request->list["listdate"];
        $newList->save();

        return $newList;
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
        $existingList = ShopingList::find($id);

        if ( $existingList) {
            $existingList->listdate = $request->list["listdate"];
            $existingList->listfor = $request->list["listfor"];
            $existingList->updated_at = $request->list['listdate'] ? Carbon::now() : null;
            $existingList->save();

            return $existingList;
        }
        return "Your shoping list not found.";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $existingList = ShopingList::find($id);

        if ($existingList) {
            $existingList->delete();
            return "List succesfully deleted";
        }

        return "list not found";
    }
}
