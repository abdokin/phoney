<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SmtpResource\Pages;
use App\Filament\Resources\SmtpResource\RelationManagers;
use App\Models\Smtp;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BooleanColumn;

class SmtpResource extends Resource
{
    protected static ?string $model = Smtp::class;


    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationLabel(): string
    {
        return 'SMTP connections';
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
            'index' => Pages\ListSmtps::route('/'),
        ];
    }
}
