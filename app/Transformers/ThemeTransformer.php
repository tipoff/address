<?php

namespace App\Transformers;

use Tipoff\EscapeRoom\Models\EscaperoomTheme;
use League\Fractal\TransformerAbstract;

class ThemeTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include.
     *
     * @var array
     */
    protected $defaultIncludes = [
        //
    ];

    /**
     * List of resources possible to include.
     *
     * @var array
     */
    protected $availableIncludes = [
        //
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(EscaperoomTheme $theme)
    {
        return [
            'id' => $theme->id,
            'slug' => $theme->slug,
            'name' => $theme->name,
            'title' => $theme->title,
            'excerpt' => $theme->excerpt,
            'description' => $theme->description,
            'synopsis' => $theme->synopsis,
            'story' => $theme->story,
            'info' => $theme->info,
            'duration' => $theme->duration,
            'occupied_time' => $theme->occupied_time,
            'scavenger_level' => $theme->scavenger_level,
            'puzzle_level' => $theme->puzzle_level,
            'escape_rate' => $theme->escape_rate,
            'image_id' => $theme->image_id,
            'video_id' => $theme->video_id,
            'poster_image_id' => $theme->poster_image_id,
            'icon_id' => $theme->icon_id,
            'icon_url' => $theme->icon_url,
            'youtube' => $theme->youtube,
            'pitch' => $theme->pitch,
        ];
    }
}
