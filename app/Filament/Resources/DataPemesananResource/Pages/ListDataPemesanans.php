<?php

namespace App\Filament\Resources\DataPemesananResource\Pages;

use App\Filament\Resources\DataPemesananResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDataPemesanans extends ListRecords
{
    protected static string $resource = DataPemesananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
