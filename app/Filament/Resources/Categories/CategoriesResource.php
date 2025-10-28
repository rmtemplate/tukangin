<?php

namespace App\Filament\Resources\Categories;

use App\Filament\Resources\Categories\Pages\CreateCategories;
use App\Filament\Resources\Categories\Pages\EditCategories;
use App\Filament\Resources\Categories\Pages\ListCategories;
use App\Filament\Resources\Categories\Schemas\CategoriesForm;
use App\Filament\Resources\Categories\Tables\CategoriesTable;
use App\Models\Category;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class CategoriesResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Category';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('code'),

            TextInput::make('name')
                ->live(onBlur: true)
                ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                    if (($get('slug') ?? '') !== Str::slug($old)) {
                        return;
                    }
                    $set('slug', Str::slug($state));
                })
                ->required(),

            TextInput::make('slug')->required(),

            Textarea::make('description')->required(),


            FileUpload::make('icon_mobile')
                ->label('Icon (Mobile)')
                ->directory('uploads/icons') // folder penyimpanan
                ->image() // hanya boleh gambar
                ->maxSize(2048) // maksimal 2MB
                ->imagePreviewHeight('100') // preview kecil di form
                ->required(false),

            FileUpload::make('banner_desktop')
                ->label('Banner (Desktop)')
                ->directory('uploads/banners')
                ->image()
                ->maxSize(4096) // maksimal 4MB
                ->imagePreviewHeight('150')
                ->required(false),

            Toggle::make('is_active')
                ->label('Active'),

        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('code'),
            TextColumn::make('name'),
            ToggleColumn::make('is_active')
                ->label('Active')
                ->onIcon('heroicon-o-check-circle')
                ->offIcon('heroicon-o-x-circle')
                ->onColor('success')
                ->offColor('danger')
                ->sortable()
                ->updateStateUsing(function ($record, $state) {
                    $record->update(['is_active' => $state]);
                }),
            TextColumn::make('sort_order')->sortable(),
        ])
        ->actions([
            Action::make('move_up')
                ->icon('heroicon-o-arrow-up')
                ->action(fn($record) => $record->decrement('sort_order'))
                ->requiresConfirmation(false),

            Action::make('move_down')
                ->icon('heroicon-o-arrow-down')
                ->action(fn($record) => $record->increment('sort_order'))
                ->requiresConfirmation(false),
        ])
        ->defaultSort('sort_order', 'asc');
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
            'index' => ListCategories::route('/'),
            'create' => CreateCategories::route('/create'),
            'edit' => EditCategories::route('/{record}/edit'),
        ];
    }
}
