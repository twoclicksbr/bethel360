<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Api\ThemeCelebration;
use App\Models\Api\ThemeCelebrationOccurrence;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class GenerateCelebrationOccurrences extends Command
{
    protected $signature = 'generate:celebration-occurrences';
    protected $description = 'Gera automaticamente as ocorrências dos cultos com base nos dados do tema celebration';

    public function handle(): void
    {
        $celebrations = ThemeCelebration::where('active', 1)->where('deleted', 0)->get();

        foreach ($celebrations as $celebration) {
            $start = Carbon::parse($celebration->start_date);
            $end = Carbon::parse($celebration->end_date);
            $dayOfWeek = $celebration->day_of_week; // 0 = domingo, 6 = sábado
            $time = $celebration->hour; // ex: '10:00'

            $period = CarbonPeriod::create($start, $end);

            foreach ($period as $date) {
                if ((int)$date->dayOfWeek === (int)$dayOfWeek) {
                    $occurrenceDate = $date->copy()->setTimeFromTimeString($time);

                    $exists = ThemeCelebrationOccurrence::where('id_theme_celebration', $celebration->id)
                        ->whereDate('start', $occurrenceDate->toDateString())
                        ->exists();

                    if (!$exists) {
                        ThemeCelebrationOccurrence::create([
                            'id_credential' => $celebration->id_credential,
                            'id_theme_celebration' => $celebration->id,
                            'start' => $occurrenceDate,
                            'end' => $occurrenceDate->copy()->addHour(), // ajustar se precisar
                            'active' => 1,
                            'deleted' => 0,
                        ]);

                        $this->info("Ocorrência criada: {$celebration->label} - {$occurrenceDate}");
                    }
                }
            }
        }

        $this->info('Todas as ocorrências foram geradas com sucesso.');
    }

    public function generateFor(ThemeCelebration $celebration): void
    {
        $start = Carbon::parse($celebration->start_date);
        $end = Carbon::parse($celebration->end_date);
        $dayOfWeek = $celebration->day_of_week; // 0 = domingo, 6 = sábado
        $time = $celebration->hour; // ex: '10:00'

        $period = CarbonPeriod::create($start, $end);

        foreach ($period as $date) {
            if ((int)$date->dayOfWeek === (int)$dayOfWeek) {
                $occurrenceDate = $date->copy()->setTimeFromTimeString($time);

                $exists = ThemeCelebrationOccurrence::where('id_theme_celebration', $celebration->id)
                    ->whereDate('start', $occurrenceDate->toDateString())
                    ->exists();

                if (!$exists) {
                    ThemeCelebrationOccurrence::create([
                        'id_credential' => $celebration->id_credential,
                        'id_theme_celebration' => $celebration->id,
                        'start' => $occurrenceDate,
                        'end' => $occurrenceDate->copy()->addHour(), // ajuste se precisar
                        'active' => 1,
                        'deleted' => 0,
                    ]);
                }
            }
        }
    }
}
