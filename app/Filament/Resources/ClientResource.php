<?php

namespace App\Filament\Resources;

use App\Models\Client;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions;

class ClientResource extends Resource
{
    // Указываем правильный тип для модели
    public static ?string $model = Client::class;

    // Настройки навигации
    public static ?string $navigationLabel = 'Clients';
    public static ?string $navigationIcon = 'heroicon-o-users';
    public static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')
                ->label('Name')
                ->required(),

            TextInput::make('registration_date')
                ->label('Registration date')
                ->required(),

            TextInput::make('password')
                ->label('Password')
                ->required(),

            TextInput::make('phone')
                ->label('Phone')
                ->required(),

            TextInput::make('email')
                ->label('Email Address')
                ->required()
                ->email(),

        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('name')
                ->label('Name')  
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('registration_date')
                ->label('Registration date')  
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('password')
                ->label('Password')  
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('phone')
                ->label('Phone')  
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('email')
                ->label('Email Address')
                ->sortable()
                ->searchable(),

        ])
        ->filters([
            // Здесь можно добавить фильтры, если нужно
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),  // Действие для массового удаления
        ]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Resources\ClientResource\Pages\ListClients::route('/'),
            'create' => \App\Filament\Resources\ClientResource\Pages\CreateClient::route('/create'),
            'edit' => \App\Filament\Resources\ClientResource\Pages\EditClient::route('/{record}/edit'),
        ];
    }
}
