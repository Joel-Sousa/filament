<?php

namespace App\Filament\Resources\Tst2Resource\Pages;

use App\Filament\Resources\Tst2Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTst2 extends EditRecord
{
    protected static string $resource = Tst2Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
