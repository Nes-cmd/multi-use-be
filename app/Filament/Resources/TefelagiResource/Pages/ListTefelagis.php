<?php

namespace App\Filament\Resources\TefelagiResource\Pages;

use App\Filament\Resources\TefelagiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTefelagis extends ListRecords
{
    protected static string $resource = TefelagiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
