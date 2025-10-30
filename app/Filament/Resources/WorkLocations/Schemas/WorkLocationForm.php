<?php

namespace App\Filament\Resources\WorkLocations\Schemas;

use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class WorkLocationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Location Information')
                    ->schema([
                        TextInput::make('name')
                            ->label('Location Name')
                            ->required()
                            ->placeholder('e.g., Head Office, Branch Jakarta')
                            ->maxLength(255),

                        Textarea::make('address')
                            ->label('Address')
                            ->required()
                            ->placeholder('Enter complete address')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),

                Section::make('Geolocation')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('latitude')
                                    ->label('Latitude')
                                    ->required()
                                    ->numeric()
                                    ->placeholder('-6.200000')
                                    ->helperText('Geographic latitude coordinate'),

                                TextInput::make('longitude')
                                    ->label('Longitude')
                                    ->required()
                                    ->numeric()
                                    ->placeholder('106.816666')
                                    ->helperText('Geographic longitude coordinate'),
                            ]),

                        Grid::make(2)
                            ->schema([
                                TextInput::make('radius')
                                    ->label('Radius (meters)')
                                    ->helperText('Geofencing radius for attendance check')
                                    ->numeric()
                                    ->default(100)
                                    ->minValue(10)
                                    ->maxValue(1000)
                                    ->required()
                                    ->suffix('m'),

                                Checkbox::make('is_active')
                                    ->label('Active')
                                    ->helperText('Only active locations can be assigned')
                                    ->default(true),
                            ]),
                    ]),
            ]);
    }
}
