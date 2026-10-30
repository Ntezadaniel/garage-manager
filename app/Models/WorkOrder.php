<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    protected $fillable = ['vehicle_id', 'created_by', 'status', 'problem', 'notes', 'date_in', 'date_out'];

    protected function casts(): array
    {
        return ['date_in' => 'date', 'date_out' => 'date'];
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function items()
    {
        return $this->hasMany(WorkOrderItem::class);
    }

    public function revenue(): int
    {
        return $this->items->sum(fn ($item) => $item->revenue());
    }

    public function cashCost(): int
    {
        return $this->items->sum(fn ($item) => $item->cashCost());
    }

    public function cashProfit(): int
    {
        return $this->revenue() - $this->cashCost();
    }

    public function trueProfit(): int
    {
        return $this->cashProfit() - $this->items->sum('time_value');
    }
}
