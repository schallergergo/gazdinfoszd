<?php
namespace App\Models\Traits;

use App\Models\Scopes\TenantScope;
use App\Models\Tenant;

trait BelongsToTenant {


    protected static function bootBelongsToTenant()
    {
        static::addGlobalScope(new TenantScope);

        static::creating(function ($model){

            if (session()->has("tenant_id"))
                $model->tenant_id = session()->get("tenant_id");
        });
    }

    public function tenant(){
        
        this->belongsTo(Tenant::class);
    }
}

