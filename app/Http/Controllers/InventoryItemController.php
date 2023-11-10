<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\InventoryItem;
use App\Http\Requests\StoreInventoryItemRequest;
use App\Http\Requests\UpdateInventoryItemRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class InventoryItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Inventory $inventory)
    {
        $inventoryitems = InventoryItem::where("inventory_id",$inventory->id)->orderByDesc("created_at")->paginate(10);
        return view("inventoryitem.index",["inventory"=>$inventory,"inventoryitems"=>$inventoryitems]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Inventory $inventory,$added)
    {

        return view("inventoryitem.create",["inventory"=>$inventory,"added"=>$added]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInventoryItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInventoryItemRequest $request,Inventory $inventory,$added)
    {
        $data = $request->validated();
        $amount =  $data["amount"];
        $user = Auth::user();
        $amount = $added=="minus" ? -$amount : $amount;

        if ($added == "minus" && $inventory->amount < $amount) return back()->with("error",Lang::get("Invetory does not contain enough items!"));
        $data = array("user_id"=>$user->id,"inventory_id"=>$inventory->id,"amount"=>$amount,"comments"=>$data["comments"]);

        InventoryItem::create($data);
        return redirect(route("inventoryitem.index",$inventory));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InventoryItem  $inventoryItem
     * @return \Illuminate\Http\Response
     */
    public function show(InventoryItem $inventoryItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InventoryItem  $inventoryItem
     * @return \Illuminate\Http\Response
     */
    public function edit(InventoryItem $inventoryItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInventoryItemRequest  $request
     * @param  \App\Models\InventoryItem  $inventoryItem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInventoryItemRequest $request, InventoryItem $inventoryItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InventoryItem  $inventoryItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventoryItem $inventoryItem)
    {
        $inventoryItem->delete();
        return redirect(route("inventoryitem.show",$inventoryItem->inventory));
    }
}
