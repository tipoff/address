<?php

namespace App\Http\Requests\Availability;

use Tipoff\Locations\Models\Location;
use App\Rules\DayRange;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class IndexAvailabilities extends FormRequest
{
    /**
     * @var Location
     */
    protected $location;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get initial date.
     *
     * @return Carbon
     */
    public function getUtcInitialDate()
    {
        if (! $this->has('initial_date')) {
            return Carbon::now();
        }

        return $this->getLocation()->toUtcDateTime($this->input('initial_date'));
    }

    /**
     * Get final date.
     *
     * @return Carbon
     */
    public function getUtclFinalDate()
    {
        if (! $this->has('final_date')) {
            return Carbon::now();
        }

        return $this->getLocation()->toUtcDateTime($this->input('final_date'));
    }

    /**
     * Get location.
     *
     * @return Carbon
     */
    public function getLocation()
    {
        if (empty($this->location)) {
            $this->location = Location::where('slug', $this->route()->parameter('locationSlug'))
                ->firstOrFail();
        }

        return $this->location;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'initial_date' => [
                'date',
            ],
            'sort' => [
                'in:slot_number,participants,room_id,rate_id,schedule_id,schedule_type,time,start_at,room_available_at,participants_available',
            ],
            'final_date' => [
                'date',
                new DayRange($this->input('initial_date', now()->format('Y-m-d')), 7),
            ],
        ];
    }
}
