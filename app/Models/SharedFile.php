<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SharedFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'token',
        'original_name',
        'storage_path',
        'mime_type',
        'size',
        'expiration_type',
        'expires_at',
        'is_deleted'
    ];

    protected $casts = [
        'expires_at' => 'datetime',
    ];

    public function isExpired()
    {
        if ($this->expiration_type === 'time' && $this->expires_at) {
            return now()->greaterThan($this->expires_at);
        }

        if ($this->expiration_type === 'download' && $this->is_deleted) {
            return true;
        }

        return false;
    }

    public function markAsDownloaded()
    {
        if ($this->expiration_type === 'download') {
            $this->update(['is_deleted' => true]);
        }
    }
}