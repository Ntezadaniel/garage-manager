<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkOrderItem extends Model
{
    protected $fillable = [
        'work_order_id', 'type', 'description', 'quantity',
        'unit_price', 'unit_cost', 'time_value', 'performed_by', 'worker_name',
    ];

    public function workOrder()
    {
        return $this->belongsTo(WorkOrder::class);
    }

    public function revenue(): int
    {
        return (int) round($this->quantity * $this->unit_price);
    }

    public function cashCost(): int
    {
        return (int) round($this->quantity * $this->unit_cost);
    }
}
