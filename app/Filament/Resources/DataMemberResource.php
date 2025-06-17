<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataMemberResource\Pages;
use App\Models\DataMember;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class DataMemberResource extends Resource
{
    protected static ?string $model = DataMember::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Data Member';
    protected static ?string $pluralLabel = 'Data Member';
    protected static ?string $slug = 'data-members';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                    ->required()
                    ->maxLength(255),

                TextInput::make('role')
                    ->required()
                    ->maxLength(100),

                TextInput::make('asal')
                    ->required()
                    ->maxLength(255),

                DatePicker::make('tgl_lahir')
                    ->label('Tanggal Lahir')
                    ->required(),

                TextInput::make('no_hp')
                    ->label('No. HP')
                    ->required()
                    ->maxLength(20),

                TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->searchable()->sortable(),
                TextColumn::make('role')->sortable(),
                TextColumn::make('asal')->sortable(),
                TextColumn::make('tgl_lahir')->label('Tanggal Lahir')->date(),
                TextColumn::make('no_hp')->label('No. HP'),
                TextColumn::make('email')->searchable(),
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDataMembers::route('/'),
            'create' => Pages\CreateDataMember::route('/create'),
            'edit' => Pages\EditDataMember::route('/{record}/edit'),
        ];
    }
}
