<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KategoriPelanggaranResource\Pages;
use App\Filament\Resources\KategoriPelanggaranResource\RelationManagers;
use App\Models\KategoriPelanggaran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KategoriPelanggaranResource extends Resource
{
    protected static ?string $model = KategoriPelanggaran::class;

    protected static ?int $navigationSort = 5;

    protected static ?string $navigationGroup = 'Manajemen Point';

    protected static ?string $navigationIcon = 'heroicon-o-hashtag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->label('Nama Pelanggaran')
                    ->placeholder('Nama Pelanggaran')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('point')
                    ->placeholder('Bobot Point')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('point')
                    ->label('Point Pelanggaran')
                    ->badge()
                    ->color('danger')
                    ->alignCenter(true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageKategoriPelanggarans::route('/'),
        ];
    }
}
