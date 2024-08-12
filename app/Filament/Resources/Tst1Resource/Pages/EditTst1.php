<?php

namespace App\Filament\Resources\Tst1Resource\Pages;

use App\Filament\Resources\Tst1Resource;
use Filament\Actions;
use Filament\Notifications\Notification;
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

    // protected function beforeSave(): void
    // {
    //     Notification::make()
    //         ->title('toto atualizado')
    //         // ->body('The rate limiting settings have been saved successfully.')
    //         ->success()
    //         // ->send()
    //         ->sendToDatabase(auth()->user())
    //     ;
    // }

    // protected function getSavedNotification(): ?Notification
    // {
    //     return Notification::make()
    //     ->title('toto atualizado')
    //     // ->body('The rate limiting settings have been saved successfully.')
    //     ->success()
    //     ->send()
    //     ->sendToDatabase(auth()->user())
    //     ;
    // }
}
