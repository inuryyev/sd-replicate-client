<?php

namespace INuryyev\SdReplicateClient\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StableDiffusionPrediction extends Model
{
    use HasFactory;

    // Disable Laravel's mass assignment protection
    protected $guarded = [];

    protected $casts = [
        'output' => 'array',
    ];

    public function scopeUnfinished($query)
    {
        return $query->whereIn('status', ['starting', 'processing']);
    }

    public function isSuccessful()
    {
        return $this->status === 'succeeded';

    }

    public function isStarting()
    {
        return $this->status === 'starting';
    }

    public function isProcessing()
    {
        return $this->status === 'processing';
    }

    public function isFailed()
    {
        return $this->status === 'failed';

    }


}
