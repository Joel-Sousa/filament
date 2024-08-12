<?php

namespace App\Observers;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        Notification::make()
        ->title('Bem vindo toto ')
        ->body('Atualiza a senha maluco!')
        ->warning()
        // ->send()
        ->actions([
            Action::make('view')
            ->button()
            ->label('Editar Usuario')
            // ->url(route('filament.admin.resources.users.edit'))
            ->url(UserResource::getUrl('edit', ['record' => $user]))
            ,
        ])
        ->sendToDatabase($user)
        ;
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
