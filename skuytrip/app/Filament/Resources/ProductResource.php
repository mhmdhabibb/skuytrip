<?php

namespace App\Filament\Resources;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('Judul Produk')
                    ->required(),

                Textarea::make('description')
                    ->label('Deskripsi Produk')
                    ->required(),

                FileUpload::make('images')
                    ->label('Gambar Produk')
                    // ->image()
                    // ->directory('products') // simpan ke storage/app/public/products
                    ->visibility('public'),

                TextInput::make('price')
                    ->label('Harga per Tiket')
                    ->numeric()
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set, callable $get) {
                        $set('total', $state * $get('quantity'));
                    }),

                TextInput::make('quantity')
                    ->label('Jumlah Tiket')
                    ->numeric()
                    ->default(1)
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set, callable $get) {
                        $set('total', $get('price') * $state);
                    }),

                TextInput::make('total')
                    ->label('Total Harga')
                    ->numeric()
                    ->disabled()
                    ->dehydrated(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Menampilkan gambar di tabel
                ImageColumn::make('images')
                    ->label('Gambar Produk')
                    ->disk('public')
                    ->width(100)
                    ->height(100)
                    ->square(),
               

                TextColumn::make('title')
                    ->label('Judul Produk')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('description')
                    ->label('Deskripsi')
                    ->limit(50),

                TextColumn::make('price')
                    ->label('Harga per Tiket')
                    ->money('IDR', true)
                    ->sortable(),
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
