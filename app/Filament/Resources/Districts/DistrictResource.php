<?php

namespace App\Filament\Resources\Districts;

use App\Filament\Resources\Districts\Pages\CreateDistrict;
use App\Filament\Resources\Districts\Pages\EditDistrict;
use App\Filament\Resources\Districts\Pages\ListDistricts;
use App\Filament\Resources\Districts\Schemas\DistrictForm;
use App\Filament\Resources\Districts\Tables\DistrictsTable;
use App\Models\City;
use App\Models\District;
use BackedEnum;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class DistrictResource extends Resource
{
    protected static ?string $model = District::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'District';

    public static function form(Schema $schema): Schema
    {
    
        return $schema->components([
             Select::make('city_id')
                ->label('City')
                ->options(City::query()->pluck('name', 'id'))
                ->required()
                ->searchable(),

                TextInput::make('name')
                ->label(' Name')
                ->maxLength(120)
                ->live(onBlur: true)
                ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                    if (($get('slug') ?? '') !== Str::slug($old)) {
                        return;
                    }
                    $set('slug', Str::slug($state));
                })
                ->required(),

            TextInput::make('slug')
                ->label('Slug')
                ->maxLength(160)
                ->unique(ignoreRecord: true)
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
             TextColumn::make('city.name')
                    ->label('City')
                    ->sortable()
                    ->searchable(),

                     TextColumn::make('name')
                    ->label('Districts Name')
                    ->sortable()
                    ->searchable()
                    ->limit(40),

                TextColumn::make('slug')
                    ->label('Slug')
                    ->sortable()
                    ->limit(40)
                    ->toggleable()

                    
        ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDistricts::route('/'),
            'create' => CreateDistrict::route('/create'),
            'edit' => EditDistrict::route('/{record}/edit'),
        ];
    }
}