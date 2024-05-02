<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Quest extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = ['title', 'reward', 'user_id'];

    //Model relation-----------------------------
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function todos()
    {
        return $this->hasMany(Todo::class);
    }

    //Business logic------------------------------
    public function isAllowedToEdit(User $user): bool
    {
        if ($user->superadmin) {
            return true;
        }

        return $user->id == $this->user_id;
    }

    public function getCardImageUrl()
    {
        if ($this->media->first() === null) {
            return '/img/default-article-image.jpg';
        }

        return $this->media->first()?->getUrl('preview');
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Fit::Contain, 50, 50)
            ->nonQueued();
        // $this
        //     ->addMediaConversion('card')
        //     ->fit(FIT::Crop, 400, 100)
        //     ->nonQueued();
        // $this
        //     ->addMediaConversion('features')
        //     ->fit(FIT::Crop, 400, 300)
        //     ->nonQueued();

    }
}
