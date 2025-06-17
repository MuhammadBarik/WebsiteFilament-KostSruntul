<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataPemesananResource\Pages;
use App\Filament\Resources\DataPemesananResource\RelationManagers;
use App\Models\DataPemesanan;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DataPemesananResource extends Resource
{
    protected static ?string $model = DataPemesanan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Data Pemesanan';
    protected static ?string $pluralLabel = 'Data Pemesanan';
    protected static ?string $modelLabel = 'Data Pemesanan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                    ->required()
                    ->maxLength(255),

                TextInput::make('no_hp')
                    ->label('No. HP')
                    ->required()
                    ->maxLength(20),

                TextInput::make('nama_kamar')
                    ->required()
                    ->maxLength(100),

                TextInput::make('durasi')
                    ->numeric()
                    ->required(),

                TextInput::make('total_harga')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->searchable()->sortable(),
                TextColumn::make('no_hp')->label('No HP')->sortable(),
                TextColumn::make('nama_kamar')->sortable(),
                TextColumn::make('durasi')->sortable(),
                TextColumn::make('total_harga')->label('Total Harga'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListDataPemesanans::route('/'),
            'create' => Pages\CreateDataPemesanan::route('/create'),
            'edit' => Pages\EditDataPemesanan::route('/{record}/edit'),
        ];
    }
}
