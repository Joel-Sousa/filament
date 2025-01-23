<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getColumns(): int
    {
        return 3;
    }

    public function getStats(): array
    {
        // [

        $data =  static::getIndicatorFields();
        // dd($data);
        return $data;
    }

    private static function getIndicatorFields()
    {
        return [
            Stat::make('Valor Global ', 1000)
                // ->description('32k increase')
                // ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Stat::make('Valor Global1 ', 1000)
                // ->description('32k increase')
                // ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Stat::make('Total de Meses do Contrato', 1),
        ];
    }
}
