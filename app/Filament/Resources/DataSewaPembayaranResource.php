<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataSewaPembayaranResource\Pages;
use App\Filament\Resources\DataSewaPembayaranResource\RelationManagers;
use App\Models\DataSewaPembayaran;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DataSewaPembayaranResource extends Resource
{
    protected static ?string $model = DataSewaPembayaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Data Pembayaran';
    protected static ?string $pluralLabel = 'Data Pembayaran';
    protected static ?string $modelLabel = 'Data Pembayaran';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                    ->required()
                    ->maxLength(255),

                TextInput::make('asal')
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

                DatePicker::make('tgl_mulai')
                    ->label('Tanggal Mulai')
                    ->required(),

                TextInput::make('total_harga')
                    ->numeric()
                    ->required(),

                TextInput::make('status')
                    ->required()
                    ->maxLength(100),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->sortable()->searchable(),
                TextColumn::make('asal')->sortable(),
                TextColumn::make('no_hp')->label('No. HP'),
                TextColumn::make('nama_kamar'),
                TextColumn::make('durasi'),
                TextColumn::make('tgl_mulai')->label('Tanggal Mulai')->date(),
                TextColumn::make('total_harga')->money('IDR'),
                TextColumn::make('status')->badge()->color(fn($state) => match ($state) {
                    'selesai' => 'success',
                    'menunggu' => 'warning',
                    default => 'gray',
                }),
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
            'index' => Pages\ListDataSewaPembayarans::route('/'),
            'create' => Pages\CreateDataSewaPembayaran::route('/create'),
            'edit' => Pages\EditDataSewaPembayaran::route('/{record}/edit'),
        ];
    }
}
