<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PelanggaranResource\Pages;
use App\Filament\Resources\PelanggaranResource\RelationManagers;
use App\Filament\Resources\SiswaResource\RelationManagers\PelanggaransRelationManager;
use App\Models\Pelanggaran;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PelanggaranResource extends Resource
{
    protected static ?string $model = Pelanggaran::class;

    protected static ?int $navigationSort = 7;

    protected static ?string $navigationGroup = 'Manajemen Point';

    protected static ?string $navigationIcon = 'heroicon-o-exclamation-triangle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('siswa_id')
                    ->preload()
                    ->live()
                    ->searchable()
                    ->relationship('siswa', 'nama')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Select::make('kategori_pelanggaran_id')
                    ->preload()
                    ->searchable()
                    ->live()
                    ->relationship('kategoriPelanggaran', 'nama')
                    ->required(),
                DatePicker::make('waktu')
                    ->label('Tanggal Pelanggaran')
                    ->native(false)
                    ->placeholder('Tanggal'),
                Forms\Components\MarkdownEditor::make('deskripsi')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(self::getTableColumns())
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

    public static function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('siswa.nama')
                    ->description(fn ($record) => $record->siswa->kelas->nama)
                    ->numeric()
                    ->sortable()
                    ->hiddenOn(PelanggaransRelationManager::class),
                Tables\Columns\TextColumn::make('kategoriPelanggaran.nama')
                    ->label('Pelanggaran')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kategoriPelanggaran.point')
                    ->label('Point Pelanggaran')
                    ->alignCenter(true)
                    ->color('danger')
                    ->badge(),
                TextColumn::make('waktu')
                    ->date(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePelanggarans::route('/'),
        ];
    }
}
