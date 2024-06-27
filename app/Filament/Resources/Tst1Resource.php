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
use Filament\Widgets\StatsOverviewWidget\Stat;


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
                ->afterStateUpdated( fn(Set $set, $state) => $set('slug', Str::slug($state))),
                
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
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
