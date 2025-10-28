<?php

namespace App\Filament\Resources\Coupons;

use App\Filament\Resources\Coupons\Pages\CreateCoupon;
use App\Filament\Resources\Coupons\Pages\EditCoupon;
use App\Filament\Resources\Coupons\Pages\ListCoupons;
use App\Filament\Resources\Coupons\Schemas\CouponForm;
use App\Filament\Resources\Coupons\Tables\CouponsTable;
use App\Models\Coupon;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class CouponResource extends Resource
{
    protected static ?string $model = Coupon::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Coupon';

    public static function form(Schema $schema): Schema
    {
        return $schema-> components([
            TextInput::make('code')
                ->label('code Name')
                ->maxLength(40),

            Select::make('type')
                ->options([
                    'fixed' => 'Fixed',
                    'percentage' => 'Percentage',
                ]),
            TextInput::make('value')
                ->numeric()
                ->inputMode('decimal'),

            TextInput::make('max_uses')
                ->numeric(),

            TextInput::make('min_spend')
                ->numeric()
                ->inputMode('decimal'),

            DateTimePicker::make('valid_from'),

            DateTimePicker::make('valid_to'),

            Toggle::make('is_active')
                        ->label('Active')
                        ->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code')
                    ->label('Code')
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(fn ($state) => strtoupper($state)),

                TextColumn::make('type')
                    ->label('Type')
                    ->sortable(),

                TextColumn::make('value')
                    ->label('Value')
                    ->numeric(decimalPlaces: 2)
                    ->sortable()
                    ->suffix(fn ($record) => $record->type === 'percentage' ? ' %' : ' IDR'),

                TextColumn::make('max_uses')
                    ->label('Max Uses')
                    ->sortable()
                    ->alignCenter(),

                TextColumn::make('min_spend')
                    ->label('Min Spend')
                    ->numeric(decimalPlaces: 2)
                    ->sortable(),

                TextColumn::make('valid_from')
                    ->label('Valid From')
                    ->dateTime('d M Y H:i')
                    ->sortable(),

                TextColumn::make('valid_to')
                    ->label('Valid To')
                    ->dateTime('d M Y H:i')
                    ->sortable(),

                IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TernaryFilter::make('is_active')
                    ->label('Active')
                    ->trueLabel('Active')
                    ->falseLabel('Inactive'),

                Filter::make('valid')
                    ->label('Currently Valid')
                    ->query(fn (Builder $query): Builder =>
                        $query->where('valid_from', '<=', now())
                              ->where('valid_to', '>=', now())
                    ),
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ])
            ->defaultSort('created_at', 'desc');
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
            'index' => ListCoupons::route('/'),
            'create' => CreateCoupon::route('/create'),
            'edit' => EditCoupon::route('/{record}/edit'),
        ];
    }
}
