<?php

namespace App\Filament\Resources;

use App\Models\Order;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Actions;

class OrderResource extends Resource
{
    // Указываем правильный тип для модели
    public static ?string $model = Order::class;

    // Настройки для навигации
    public static ?string $navigationLabel = 'Orders';
    public static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    public static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('client_id')
                ->relationship('client', 'name')  // Связь с моделью Client
                ->label('Client')  // Добавление метки
                ->required(),

            TextInput::make('number')
                ->label('Number')
                ->required(),

            TextInput::make('product_id')
                ->label('Product id')
                ->required(),

            TextInput::make('total_amount')
                ->label('Total Amount')  // Добавление метки
                ->numeric()
                ->required(),
            
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('client.name')  // Отображение имени клиента
                ->label('Client')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('number')  // Отображение количества товаров
                ->label('Number')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('product_id')  // Отображение id товара
                ->label('Product id')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('total_amount')  // Отображение общей суммы
                ->label('Total Amount')
                ->sortable()
                ->searchable(),

        ])
        ->filters([
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),  // Действие для массового удаления
        ]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Resources\OrderResource\Pages\ListOrders::route('/'),
            'create' => \App\Filament\Resources\OrderResource\Pages\CreateOrder::route('/create'),
            'edit' => \App\Filament\Resources\OrderResource\Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
