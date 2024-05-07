<?php

namespace App\Filament\Resources\FtpResource\Pages;

use App\Filament\Resources\FtpResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Pages\ListRecords;

class ListFtps extends ListRecords
{
    protected static ?string $title = "FTP connections";
    protected static string $resource = FtpResource::class;
    
    public function getPluralModelLabel(): ?string
    {
        return "FTPs";
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make(),
            'pwned' => Tab::make()->modifyQueryUsing(fn(Builder $query) => $query->where('pwned', true)),
            'in progress' => Tab::make()->modifyQueryUsing(fn(Builder $query) => $query->where('pwned', false)),
        ];
    }

}
