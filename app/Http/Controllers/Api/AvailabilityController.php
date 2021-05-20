<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Availability\CreateHold;
use App\Http\Requests\Availability\IndexAvailabilities;
use Tipoff\Locations\Models\Location;
use Tipoff\Scheduler\Models\EscaperoomSlot;
use Tipoff\Scheduler\Services\EscaperoomSchedulingService as CalendarService;
use App\Transformers\AvailabilitySlotTransformer;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;

class AvailabilityController extends Controller
{
    /**
     * @var App\Transformers\AvailabilitySlotTransformer
     */
    protected $transformer;

    public function __construct(AvailabilitySlotTransformer $transformer)
    {
        $this->transformer = $transformer;
    }

    /**
     * @var CalendarService
     */
    public $calendarService;

    /**
     * Get calendar service instance.
     * @return CalendarService
     */
    public function getCalendaService()
    {
        if (empty($this->calendarService)) {
            $this->calendarService = app(CalendarService::class);
        }

        return $this->calendarService;
    }

    /**
     * Find slot by slot by number.
     *
     * Includes viertual slots.
     *
     * @return Slot
     */
    public function findByLocationSlug($locationSlug, $slotNumber)
    {
        $location = Location::where('slug', $locationSlug)->firstOrFail();
        $slot = $location->findOrGenerateSlot($slotNumber);

        return fractal($slot, $this->transformer)
            ->respond();
    }

    /**
     * Get hold.
     *
     * @param string $locationSlug
     * @param string $slotNumber
     * @return array
     */
    public function getHold($locationSlug, $slotNumber)
    {
        $location = Location::where('slug', $locationSlug)->firstOrFail();
        $slot = $location->findOrGenerateSlot($slotNumber);

        return $slot->getHold();
    }

    /**
     * Set slot hold. Throw error if lock already exists.
     *
     * @param Location $location
     * @param string $slotNumber
     * @return array
     */
    public function setHold(Location $location, $slotNumber, CreateHold $request)
    {
        $slot = $location->findOrGenerateSlot($slotNumber);

        if ($slot->hasHold()) {
            throw ValidationException::withMessages([
                'slot_number' => 'The slot is already locked.',
            ]);
        }

        $slot->setHold($request->user()->id);

        return fractal($slot, $this->transformer)
            ->includeHold()
            ->respond();
    }

    /**
     * Delete hold.
     *
     * @param string $locationSlug
     * @param string $slotNumber
     * @return array
     */
    public function deleteHold($locationSlug, $slotNumber)
    {
        $location = Location::where('slug', $locationSlug)->firstOrFail();
        $slot = $location->findOrGenerateSlot($slotNumber);

        return $slot->releaseHold();
    }

    /**
     * List slots by location slug.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexByLocationSlug($locationSlug, IndexAvailabilities $request)
    {
        $calendarService = $this->getCalendaService();
        $location = $request->getLocation();

        $initialDate = $request->input('initial_date');
        $finalDate = $request->input('final_date');

        $slots = $calendarService->getLocationSlotsForDateRange($location->id, $initialDate, $finalDate);

        $recurringSchedules = $calendarService->getLocationRecurringScheduleForDateRange($location->id, $initialDate, $finalDate);
        $erasers = $calendarService->getLocationScheduleErasersForDateRange(
            $location->id,
            Carbon::parse($initialDate, $location->getPhpTzAttribute()),
            Carbon::parse($finalDate ?? $initialDate, $location->getPhpTzAttribute())->addDays(1)->setTime(0, 0, 0),
        );

        $slots = $slots
            ->applyRecurringSchedules($recurringSchedules, $initialDate, $finalDate)
            ->applyFilters($request->filter)
            ->removeConflicts()
            ->applyErasers($erasers)
            ->sortBy($request->input('sort', 'start_at'));

        return fractal($slots, $this->transformer)
            ->respond();
    }
}
