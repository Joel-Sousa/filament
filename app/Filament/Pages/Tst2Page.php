<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;


class Tst2Page extends BaseDashboard
// class Tst2Page extends BaseWidget
{
    use BaseDashboard\Concerns\HasFiltersForm;


    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static string $routePath = 'tst/tst2Page';
    protected static ?string $label = 'Tst2 page';
    protected static ?string $title = 'Tst2 page';

    protected static string $view = 'filament.pages.tst2-page';

    public function getColumns(): int
    {
        return 0;
    }

    // public function getStat(): array
    public function getWidgets(): array
    {
        // return static::getStat1();
        return [];
    }
    
    private static function getStat1()
    {
        
        return [
            Stat::make('Valor Global ', 1000)
                // ->description('32k increase')
                // ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
        ];
    }
}
