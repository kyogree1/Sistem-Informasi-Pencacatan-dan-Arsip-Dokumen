<?php

namespace App\Filament\Resources\Archives\Pages;

use App\Filament\Resources\Archives\ArchiveResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListArchives extends ListRecords
{
    protected static string $resource = ArchiveResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
