<?php

namespace App\Filament\Resources\DataMemberResource\Pages;

use App\Filament\Resources\DataMemberResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDataMembers extends ListRecords
{
    protected static string $resource = DataMemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
