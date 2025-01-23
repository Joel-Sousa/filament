<?php

namespace App\Filament\Resources\Tst3Resource\Pages;

use App\Filament\Resources\Tst3Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTst3s extends ListRecords
{
    protected static string $resource = Tst3Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
