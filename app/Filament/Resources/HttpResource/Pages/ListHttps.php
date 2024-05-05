<?php

namespace App\Filament\Resources\HttpResource\Pages;

use App\Filament\Resources\HttpResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;
class ListHttps extends ListRecords
{
    protected static string $resource = HttpResource::class;

    protected static ?string $title = "HTTP connections";

    public function getPluralModelLabel(): ?string
    {
        return "HTTP Connection";
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
