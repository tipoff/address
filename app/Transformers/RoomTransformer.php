<?php

namespace App\Transformers;

use Tipoff\EscapeRoom\Models\Room;
use League\Fractal\TransformerAbstract;

class RoomTransformer extends TransformerAbstract
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
        'theme',
        'location',
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Room $room)
    {
        return [
            'id' => $room->id,
            'location_id' => $room->location_id,
            'theme_id' => $room->theme_id,
            'rate_id' => $room->rate_id,
            'opened_at' => $room->opened_at,
            'closed_at' => $room->closed_at,
            'participants' => $room->participants,
            'participants_private' => $room->participants_private,
            'reset_time' => $room->reset_time,
            'occupied_time' => $room->occupied_time,
            'priority' => $room->priority,
            'note' => $room->note,
            'title' => $room->title,
            'excerpt' => $room->excerpt,
            'description' => $room->description,
            'image_id' => $room->image_id,
            'poster_image_id' => $room->poster_image_id,
            'icon_url' => $room->icon_url,
            'youtube' => $room->youtube,
            'pitch' => $room->pitch,
        ];
    }

    /**
     * Include theme.
     *
     * @return League\Fractal\ItemResource
     */
    public function includeTheme(Room $room)
    {
        return $this->item($room->theme, new ThemeTransformer());
    }

    /**
     * Include location.
     *
     * @return League\Fractal\ItemResource
     */
    public function includeLocation(Room $room)
    {
        return $this->item($room->location, new LocationTransformer());
    }
}
