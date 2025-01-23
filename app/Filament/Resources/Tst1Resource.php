<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Tst1Resource\Pages;
use App\Filament\Resources\Tst1Resource\RelationManagers;
use App\Models\Tst1;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Filament\Widgets\StatsOverview;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Blade;

class Tst1Resource extends Resource
{
    protected static ?string $model = Tst1::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static bool $isLazy = false;
    protected static ?string $pollingInterval = null;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->reactive()
                    // ->live()
                    ->hintIcon('heroicon-m-question-mark-circle', tooltip: 'Need some more information?')
                    ->dehydrated()
                    ->afterStateUpdated(fn ($state, Set $set) => $set('name1', Str::slug($state))),
                Forms\Components\TextInput::make('name1'),

                // Forms\Components\Fieldset::make('Indicador ')
                //     ->dehydrated()
                //     ->schema(
                //         static::tst()
                //     ),
                Forms\Components\Fieldset::make('Indicador1')
                    ->dehydrated()
                    ->schema([
                        // FileUpload::make('image'),
                        // Stat::make('Total de Meses do Contrato', 1),

                    ])
                    ->reactive()
                    ->live()
                    ->afterStateUpdated(fn (Set $set, $state) => $set('slug', Str::slug($state))),

                // Forms\Components\Group::make('')
                Forms\Components\Group::make([
                    // ->schema([
                    // FileUpload::make('image'),
                    // Stat::make('Total de Meses do Contrato', 1),

                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d/m/Y')
                    ->toggleable(true)
                    // ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('name')
                    ->searchable()
                    ->relationship('tst1', 'name')
                    ->preload()
                    ->label('Nome'),
                SelectFilter::make('name1')
                    ->searchable()
                    ->relationship('tst1', 'name')
                    ->preload()
                    ->label('Nome1'),
                Filter::make('created_at')
                    ->form([
                        DatePicker::make('from')
                            ->format('d/m/Y')
                            ->columnSpan(10)
                            ->label('Data Inicial'),
                        DatePicker::make('until')
                            ->format('d/m/Y')
                            ->columnSpan(10)
                            ->label('Data Final'),

                        // Forms\Components\Radio::make('imp1')
                        //     ->options([
                        //         0 => 'PDF',
                        //         1 => 'Excel'
                        //     ])
                        //     // ->columnSpan(5)
                        //     ->inline()
                        //     ->label('Imprimir'),
                        // Forms\Components\Actions::make([
                        //     Forms\Components\Actions\Action::make('botao')
                        //         ->label('Download')
                        //         ->button()
                        //     // ->columnSpan(5)

                        //         ->disabled(function (Get $get) {
                        //             $get('name');
                        //             // dd($this);
                        //         })
                        //         ->url(function (Get $get) {
                        //             return $get('path_url');
                        //         }, true)
                        // ]),
                    ])
                    ->query(
                        function (Builder $query, array $data): Builder {
                            return $query
                                ->when(
                                    $data['from'],
                                    fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                                )
                                ->when(
                                    $data['until'],
                                    fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                                );
                        },
                    )
                ->columns(20)
                ,
                // Tables\Filters\Filter::make('imp')
                //     ->form([
                //         Forms\Components\Radio::make('imp1')
                //             ->options([
                //                 0 => 'PDF',
                //                 1 => 'Excel'
                //             ])
                //             // ->columnSpan(20)
                //             ->inline()
                //             ->label('Imprimir'),
                //         Forms\Components\Actions::make([
                //             Forms\Components\Actions\Action::make('botao')
                //                 ->label('Download')
                //                 ->button()
                //                 ->disabled(function (Get $get) {
                //                     $get('name');
                //                 })
                //                 ->url(function (Get $get) {
                //                     return $get('path_url');
                //                 }, true)
                //         ]),
                //     ]),
            ], layout: FiltersLayout::AboveContent)
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('pdf2')
                    ->label('Pdf')
                    ->color('success')
                    // ->icon('heroicon-s-download')
                    ->action(function (Tst1 $record) {
                        return response()->streamDownload(function () {
                            echo Pdf::loadHtml(
                                // Blade::render('pdf1', ['record' => $record])
                                '<h3>tst</h3>'
                            )->stream();
                            // )->download();
                        }, 'tst.pdf');
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // 'tst2'
            // RelationManagers\Tst2::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTst1s::route('/'),
            'create' => Pages\CreateTst1::route('/create'),
            'edit' => Pages\EditTst1::route('/{record}/edit'),
        ];
    }

    public static function tst()
    {
        $tst = new StatsOverview();

        $data = [
            Forms\Components\TextInput::make('name1'),
            Forms\Components\TextInput::make('name2'),

        ];

        $data1 = [
            Stat::make('Total de Meses do Contrato', 1),
        ];

        // dd($tst->getStats());
        // dd($data);

        // return $tst->getStats();
        return $data;
        return $data1;
    }
}
