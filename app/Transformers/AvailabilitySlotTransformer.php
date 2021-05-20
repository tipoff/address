<?php

namespace App\Transformers;

use Tipoff\Scheduler\Models\EscaperoomSlot;
use League\Fractal\TransformerAbstract;

class AvailabilitySlotTransformer extends TransformerAbstract
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
        'hold',
        'room',
        'rate',
        'schedule',
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(EscaperoomSlot $slot)
    {
        $output = [
            'slot_number' => $slot->slot_number,
            'room_id' => $slot->room_id,
            'rate_id' => $slot->rate_id,
            'schedule_id' => $slot->schedule_id,
            'schedule_type' => $slot->schedule_type,
            'date' => $slot->date->format('Y-m-d'),
            'time' => $slot->time,
            'start_at' => (string) $slot->start_at,
            'end_at' => (string) $slot->end_at,
            'room_available_at' => (string) $slot->room_available_at,
            'location_start' => (string) $slot->location_start,
            'location_end' => (string) $slot->location_end,
            'location_available' => (string) $slot->location_available,
            'participants' => $slot->participants,
            'participants_blocked' => $slot->participants_blocked,
            'participants_available' => $slot->participants_available,
            'has_hold' => $slot->hasHold(),
            'is_virtual' => true,
        ];

        if ($slot->id) {
            $output['id'] = $slot->id;
            $output['is_virtual'] = false;
        }

        return $output;
    }

    /**
     * Include room.
     *
     * @return League\Fractal\ItemResource
     */
    public function includeRoom(EscaperoomSlot $slot)
    {
        return $this->item($slot->room, new RoomTransformer());
    }

    /**
     * Include hold.
     *
     * @return League\Fractal\ItemResource
     */
    public function includeHold(EscaperoomSlot $slot)
    {
        if (! $hold = $slot->hold) {
            return $this->null();
        }

        return $this->item($hold, new HoldTransformer());
    }

    /**
     * Include rate.
     *
     * @return League\Fractal\ItemResource
     */
    public function includeRate(EscaperoomSlot $slot)
    {
        return $this->item($slot->rate, new RateTransformer());
    }
}
