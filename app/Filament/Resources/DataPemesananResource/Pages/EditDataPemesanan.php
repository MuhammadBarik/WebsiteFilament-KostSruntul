<?php

namespace App\Filament\Resources\DataPemesananResource\Pages;

use App\Filament\Resources\DataPemesananResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDataPemesanan extends EditRecord
{
    protected static string $resource = DataPemesananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
