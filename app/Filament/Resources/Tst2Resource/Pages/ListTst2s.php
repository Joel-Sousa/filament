<?php

namespace App\Filament\Resources\Tst2Resource\Pages;

use App\Filament\Resources\Tst2Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTst2s extends ListRecords
{
    protected static string $resource = Tst2Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
