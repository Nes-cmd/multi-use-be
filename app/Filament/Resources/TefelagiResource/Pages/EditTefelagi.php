<?php

namespace App\Filament\Resources\TefelagiResource\Pages;

use App\Filament\Resources\TefelagiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTefelagi extends EditRecord
{
    protected static string $resource = TefelagiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
