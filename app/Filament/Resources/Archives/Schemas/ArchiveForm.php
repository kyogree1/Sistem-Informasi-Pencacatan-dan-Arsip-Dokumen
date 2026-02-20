<?php

namespace App\Filament\Resources\Archives\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Schemas\Schema;

class ArchiveForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Arsip')
                    ->description('Masukkan detail data debitur dan kredit di sini.')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('nama debitur')
                                    ->required()
                                    ->columnSpan(2),
                                TextInput::make('no_pk')
                                    ->required(),
                                TextInput::make('nilai_kredit')
                                    ->numeric()
                                    ->prefix('Rp'),
                            ]),
                    ])->columns(2),

                Section::make('Detail Logistik')
                    ->schema([
                        TextInput::make('Dokumen Divisi')
                            ->required(),
                        TextInput::make('jumlah_bantex')
                            ->required()
                            ->numeric()
                            ->default(1),
                        TextInput::make('lokasi dokumen')
                            ->required(),
                        TextInput::make('Nama PIC')
                            ->required(),
                        TextInput::make('Keterangan')
                            ->columnSpan(2),
                    ])->columns(2),
            ]);
    }
}
