<?php

namespace App\Filament\Resources\Tst3Resource\Pages;

use App\Filament\Resources\Tst3Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTst3 extends EditRecord
{
    protected static string $resource = Tst3Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
