<?php

namespace App\Filament\Resources\Tst1Resource\Pages;

use App\Filament\Resources\Tst1Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTst1s extends ListRecords
{
    protected static string $resource = Tst1Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
