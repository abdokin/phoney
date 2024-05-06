<?php

namespace App\Filament\Resources\SmtpResource\Pages;

use App\Filament\Resources\SmtpResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Pages\ListRecords;


class ListSmtps extends ListRecords
{
    protected static ?string $title = "SMTP connections";
    protected static string $resource = SmtpResource::class;

    public function getPluralModelLabel(): ?string
    {
        return "SMTP Connection";
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
