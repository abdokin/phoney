<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SshResource\Pages;
use App\Filament\Resources\SshResource\RelationManagers;
use App\Models\Ssh;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BooleanColumn;

class SshResource extends Resource
{
    protected static ?string $model = Ssh::class;


    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationLabel(): string
    {
        return 'SSH';
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('remoteAddr'),
                TextColumn::make('username'),
                TextColumn::make('password'),
                TextColumn::make('client_version'),
                TextColumn::make('tries_to_pwned'),
                TextColumn::make('time_to_powned'),
                TextColumn::make('created_at'),
                BooleanColumn::make('pwned'),

            ])
            ->filters([

            ])
        ;
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSshes::route('/'),
        ];
    }
}
