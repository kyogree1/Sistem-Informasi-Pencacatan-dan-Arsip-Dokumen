<?php

namespace App\Filament\Resources\Archives\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ArchivesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_debitur')
                    ->searchable(),
                TextColumn::make('no_pk')
                    ->searchable(),
                TextColumn::make('nilai_kredit')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('jumlah_bantex')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('dokumen_divisi')
                    ->searchable(),
                TextColumn::make('lokasi_dokumen')
                    ->searchable(),
                TextColumn::make('pic')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
