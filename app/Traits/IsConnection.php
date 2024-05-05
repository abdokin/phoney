<?php
// VirtualAttributesTrait.php

namespace App\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait IsConnection
{
    
    protected static function booted()
    {
        static::addGlobalScope('orderByCreatedAt', function ($query) {
            $query->orderByDesc('created_at');
        });
    }
    


    // Define a virtual attribute for "tries_to_pwned"
    public function triesToPwned(): Attribute
    {
        return new Attribute(
            get: fn() => $this->pwned ?
            static::where('remoteAddr', $this->remoteAddr)
                ->where('pwned', false)
                ->count()  . " tries": "null"
        );
    }
    public function timeToPowned(): Attribute
    {
        return new Attribute(
            get: fn() => $this->pwned ? $this->calculateTimeToPowned() : "null"
        );
    }

    private function calculateTimeToPowned(): ?string
    {
        $firstTry = static::where('remoteAddr', $this->remoteAddr)
            ->where('pwned', false)
            ->orderBy('created_at')
            ->first();

        if ($firstTry) {
            return -$this->created_at->diffInSeconds($firstTry->created_at) . " seconds";
        } else {
            return 0 . " seconds";
        }
    }

}
