<?php

namespace App\Filament\Pages;

use App\Models\Tst3;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Exceptions\Halt;

class Tst1Page extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.tst1-page';

    public ?array $data = ['toto']; 
    public ?array $data1 = ['toto1']; 
    public ?array $data2 = null; 
    

    public function getTst3(){
        $tst3 = Tst3::all()->toArray();
        return $tst3;
    }

    
    public function mount(): void 
    {
        $this->data2 = $this->getTst3();
        $this->form->fill();
    }
 
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
            ])
            ->statePath('data')
            ;
    } 

    public function save(): void
    {
        try {
            $data = $this->form->getState();
            $tst3 = new Tst3();
            $tst3->name = $data['name'];
            $tst3->age = 11;
            $tst3->save();
 
        } catch (Halt $exception) {
            return;
        }

        Notification::make() 
        ->success()
        ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
        ->send(); 
    }
   
    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
                ->submit('save')
                ->label('toto'),
        ];
    }
}
