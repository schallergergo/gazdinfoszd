<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\InventoryItem;
use App\Http\Requests\StoreInventoryItemRequest;
use App\Http\Requests\UpdateInventoryItemRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Carbon\Carbon;

class InventoryItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Inventory $inventory)
    {
        $this->authorize("viewAny",App\Models\InventoryItem::class);
        $inventoryitems = InventoryItem::where("inventory_id",$inventory->id)->orderByDesc("created_at")->paginate(10);
        $usage3Month = $this->getUsage($inventoryitems,3);
        return view("inventoryitem.index",
            ["inventory"=>$inventory,
            "inventoryitems"=>$inventoryitems,
            "usage3Month" => $usage3Month,
            ]);
    }

    private function getUsage($inventoryitems, int $month){
        $now = Carbon::now();
        $date = Carbon::now()->subMonth($month);

        $usage = $inventoryitems->where("created_at",">",$date)->where("amount","<",0);
        if (count($usage)==0) return "";
        $diff = $now->diffInDays($usage->first()->created_at);
        return $usage->sum("amount")*-30.0/$diff
        ;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Inventory $inventory,$added)
    {
        $this->authorize("create",App\Models\InventoryItem::class);
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
        $this->authorize("create",App\Models\InventoryItem::class);
        $data = $request->validated();
        $amount =  $data["amount"];
        if ($added == "minus" && $inventory->amount < $amount) return back()->with("error",Lang::get("Invetory does not contain enough items!"));
        $user = Auth::user();
        $amount = $added=="minus" ? -$amount : $amount;

        
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
        $this->authorize("delete",$inventory);
        $inventoryItem->delete();
        return redirect(route("inventoryitem.show",$inventoryItem->inventory));
    }
}
