<?php

namespace App\Filament\Resources\Tst1Resource\Pages;

use App\Filament\Resources\Tst1Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTst1 extends EditRecord
{
    protected static string $resource = Tst1Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
