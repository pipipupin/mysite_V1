<?php

namespace App\Filament\Resources;

use App\Models\Setting;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;


class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationLabel = 'Settings';
    protected static ?string $navigationIcon = 'heroicon-o-cog';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('client_id')
                ->relationship('client', 'name')
                ->label('Client')  
                ->required(),
            TextInput::make('alias')
                ->required()
                ->maxLength(255),
            TextInput::make('component')
                ->required()
                ->maxLength(255),
            TextInput::make('value')
                ->required()
                ->maxLength(255),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('client.name')->label('Client')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('alias')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('component')->sortable(),
                Tables\Columns\TextColumn::make('value')->sortable(),
            ])
            ->headerActions([
                Tables\Actions\Action::make('create')
                    ->url(route('filament.admin.resources.settings.create')),  
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Resources\SettingResource\Pages\ListSettings::route('/'),
            'create' => \App\Filament\Resources\SettingResource\Pages\CreateSetting::route('/create'),
            'edit' => \App\Filament\Resources\SettingResource\Pages\EditSetting::route('/{record}/edit'),
        ];
    }

}
