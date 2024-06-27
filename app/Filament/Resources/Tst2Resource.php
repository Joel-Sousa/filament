<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Tst2Resource\Pages;
use App\Filament\Resources\Tst2Resource\RelationManagers;
use App\Models\Tst2;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class Tst2Resource extends Resource
{
    protected static ?string $model = Tst2::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('tb2.name')
                    ->maxLength(255),

                // Forms\Components\Group::make([
                //     Forms\Components\TextInput::make('name')
                //     ->label('tb1.name')
                //     ->maxLength(255),
                // ])->relationship('tst2'),

                Forms\Components\Select::make('tst1_id')
                    ->relationship('tst2', 'name')
                    // ->searchable()
                    ->label('tb1.name'),

                // static::getRepeater(),
                

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tst2.name')
                    ->label('tb1'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->label('tb2'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTst2s::route('/'),
            'create' => Pages\CreateTst2::route('/create'),
            'edit' => Pages\EditTst2::route('/{record}/edit'),
        ];
    }

    private static function getRepeater(): Repeater
    {
        
        return Forms\Components\Repeater::make('members')
        ->relationship('tst3')
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('nome'),
                Forms\Components\TextInput::make('age')
                    ->label('Idade')
            ])
            ->addActionLabel('add toto')
            ->reorderable(false)
            // ->collapsed()
            // ->collapsible()
            // ->reorderableWithButtons()
            // ->deletable(false)
            // ->defaultItems(3)
            // ->addable(false)
            ;
    }
}
