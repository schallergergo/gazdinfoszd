<?php

namespace App\Models;

use App\Models\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InventoryItem extends Model
{
    use HasFactory, BelongsToTenant, SoftDeletes;

    protected $guarded = [];

    public function inventory (){
        return $this->belongsTo(Inventory::class);
    }

    protected static function booted(): void
    {
        static::created(function (InventoryItem $inventoryItem) {

            $inventory =  $inventoryItem->inventory;
            $inventory->amount = $inventory->amount - $inventoryItem->amount;
            $inventory->save();

        });

        static::deleting(function (InventoryItem $inventoryItem) {

            $inventory =  $inventoryItem->inventory;
            $inventory->amount = $inventory->amount + $inventoryItem->amount;
            $inventory->save();

        });
    }
}
