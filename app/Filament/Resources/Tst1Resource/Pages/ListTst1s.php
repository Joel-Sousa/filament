<?php

namespace App\Filament\Resources\Tst1Resource\Pages;

use App\Filament\Resources\Tst1Resource;
use App\Models\Tst1;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Blade;

class ListTst1s extends ListRecords
{
    protected static string $resource = Tst1Resource::class;

    protected function getHeaderActions(): array
    {
        // dd($this);
        return [
            Actions\Action::make('print')
                ->color('info')
                ->form([
                    Radio::make('imp1')
                        ->options([
                            0 => 'PDF',
                            1 => 'Excel'
                        ])
                        // ->required()
                        ->default(0)
                        // ->columnSpan(1)
                        ->inline()
                        ->label('Imprimir'),
                ])
                ->action(function () {
                    // dd($this);
                    $props  = [
                        'pdfOrExcel' => $this->mountedActionsData[0]['imp1'],
                        'name' => $this->tableFilters['name']['value'],
                        'name1' => $this->tableFilters['name1']['value'],
                        'from' => $this->tableFilters['created_at']['from'],
                        'until' => $this->tableFilters['created_at']['until'],
                    ];

                    return response()->streamDownload(function () use ($props) {
                        $pdfOrExcel = $props;


                        $data = [
                            'pdf' => 'tst3'
                        ];
                        // echo Pdf::loadView('tst', compact('data'))->stream();
                        echo Pdf::loadView('tst', compact('data'))->stream();
                    }, 'tst.pdf');
                })
                ->label('Imprimir'),
            Actions\CreateAction::make(),
        ];
    }
}
