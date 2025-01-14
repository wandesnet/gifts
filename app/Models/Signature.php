<?php

namespace App\Models;

use App\Enums\DeliveryType;
use App\Models\Traits\{HasAvatar, Searchable};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\{Builder, Model};

/**
 * @mixin IdeHelperSignature
 */
class Signature extends Model
{
    use HasFactory;
    use Searchable;
    use HasAvatar;

    protected $fillable = [
        'name',
        'phone',
        'delivery',
        'observation',
    ];

    protected $casts = [
        'delivery' => DeliveryType::class,
    ];

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}
