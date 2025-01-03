<?php

namespace App\Services;

use App\Enums\DaysInWeek;
use App\Models\Shop;
use App\Models\WorkingTimeShop;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;

class WorkingTimeShopService
{

    public function addWorkingTimeForShop(Shop $shop, array $data) :void
    {
        $daysInWeek = DaysInWeek::cases();
        $existingWorkingTimes = WorkingTimeShop::where("shop_id", $shop->id)
            ->get()
            ->keyBy('day_of_week');

        $workingTimesToUpdate = [];
        $workingTimesToCreate = [];

        foreach ($daysInWeek as $day) {
            $openingTimeKey = $day->value . "_opening_time";
            $closingTimeKey = $day->value . "_closing_time";

            $existingRecord = $existingWorkingTimes->get($day->name);

            if (isset($data[$openingTimeKey]) || isset($data[$closingTimeKey])) {
                $workingTimeData = [
                    "shop_id" => $shop->id,
                    "day_of_week" => $day->name,
                    "opening_time" => $data[$openingTimeKey] ?? ($existingRecord->opening_time ?? null),
                    "closing_time" => $data[$closingTimeKey] ?? ($existingRecord->closing_time ?? null),
                ];

                if ($existingRecord) {
                    $workingTimesToUpdate[] = array_merge(["id" => $existingRecord->id], $workingTimeData);
                } else {
                    $workingTimesToCreate[] = $workingTimeData;
                }
            }
        }

        foreach ($workingTimesToUpdate as $update) {
            WorkingTimeShop::where("id", $update['id'])->update(Arr::except($update, 'id'));
        }

        if (!empty($workingTimesToCreate)) {
            WorkingTimeShop::insert($workingTimesToCreate);
        }
    }

    public function ensureAllDaysHaveWorkingTime(Collection $workingTimeForShop) :Collection
    {
        if ($workingTimeForShop->count() !== 7) {
            $existingDays = $workingTimeForShop->pluck('day_of_week')->toArray();

            $dayCases = DaysInWeek::cases();

            foreach ($dayCases as $day) {
                if (!in_array($day->name, $existingDays)) {

                    $workingTimeForShop->push((object)[
                        'day_of_week' => $day->name,
                        'opening_time' => null,
                        'closing_time' => null,
                    ]);
                }
            }
        }
        $dayOrder = array_column(DaysInWeek::cases(), 'name');
        return $workingTimeForShop->sortBy(function ($item) use ($dayOrder) {
            return array_search($item->day_of_week, $dayOrder);
        })->values();
    }
}
