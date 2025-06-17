<?php

namespace App\Filament\Resources;

use App\Models\Address;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;

class AddressResource extends Resource
{
    public static ?string $model = Address::class;

    // Название для навигации в панели
    public static ?string $navigationLabel = 'Addresses';
    // Иконка для навигации в панели
    public static ?string $navigationIcon = 'heroicon-o-home';
    // Позиция навигации
    public static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('client_id')
                ->relationship('client', 'name') // Связь с моделью Client
                ->required(),
            TextInput::make('street')
                ->required()
                ->maxLength(255),
            TextInput::make('house_number')
                ->required()
                ->maxLength(255),
            TextInput::make('apartment')
                ->required()
                ->maxLength(255),
            TextInput::make('intercom')
                ->required()
                ->maxLength(255),
            TextInput::make('city')
                ->required()
                ->maxLength(255),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('client.name') // Отображение имени клиента
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('street')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('house_number')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('apartment')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('intercom')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('city')
                ->sortable()
                ->searchable(),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }

    // Явная настройка маршрутов для страниц
    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Resources\AddressResource\Pages\ListAddresses::route('/'),
            'create' => \App\Filament\Resources\AddressResource\Pages\CreateAddress::route('/create'),
            'edit' => \App\Filament\Resources\AddressResource\Pages\EditAddress::route('/{record}/edit'),
        ];
    }
}
