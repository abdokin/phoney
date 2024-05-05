<?php

namespace App\Filament\Resources\SshResource\Pages;

use App\Filament\Resources\SshResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Pages\ListRecords;

class ListSshes extends ListRecords
{
    protected static string $resource = SshResource::class;

    protected static ?string $title = "SSH connections";

    public function getPluralModelLabel(): ?string
    {
        return "SSH Connection";
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
