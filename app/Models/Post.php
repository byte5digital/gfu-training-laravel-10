<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;
use Illuminate\View\View;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model
{
    use HasFactory;
    use HasSlug;
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'text',
    ];

    /**
     * @param array $options
     * @return bool
     */
    public function save(array $options = array()): bool
    {
        // assign to current user
        if (empty($this->user_id)) {
            $this->user_id = auth()->id();
        }

        return parent::save($options);
    }

    /**
     * returns the relation to the user has posted this
     *
     * @return HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, App::make(User::class)->getKeyName(), 'user_id');
    }

    /**
     * @return SlugOptions
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Explodes the content-text as single paragraphs and returns as an array
     *
     * @return array
     */
    public function getTextAsParagraphs(): array
    {
        return preg_split('#[\r\n]+#', $this->text);
    }

    /**
     * Returns the Links to the details page
     *
     * @return string
     */
    public function getReadMoreLinkAttribute(): string
    {
        return route('blog.view', [$this->slug]);
    }

}
