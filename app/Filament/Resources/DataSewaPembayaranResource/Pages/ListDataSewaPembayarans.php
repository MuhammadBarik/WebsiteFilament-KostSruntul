<?php

namespace App\Filament\Resources\DataSewaPembayaranResource\Pages;

use App\Filament\Resources\DataSewaPembayaranResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDataSewaPembayarans extends ListRecords
{
    protected static string $resource = DataSewaPembayaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
