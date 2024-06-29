<?php

namespace App\Filament\Resources;

use App\Filament\Exports\PrestasiExporter;
use App\Filament\Resources\PrestasiResource\Pages;
use App\Filament\Resources\PrestasiResource\RelationManagers;
use App\Filament\Resources\PrestasiResource\Widgets\PrestasiTerbaru;
use App\Filament\Resources\SiswaResource\RelationManagers\PrestasiRelationManager;
use App\Models\Prestasi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PrestasiResource extends Resource
{
    protected static ?string $model = Prestasi::class;

    protected static ?int $navigationSort = 7;

    protected static ?string $navigationGroup = 'Manajemen Point';

    protected static ?string $navigationIcon = 'heroicon-o-check-badge';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('siswa_id')
                    ->relationship('siswa', 'nama')
                    ->searchable()
                    ->preload()
                    ->live()
                    ->required(),
                Forms\Components\TextInput::make('nama')
                    ->placeholder('Nama Prestasi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('point')
                    ->placeholder('Bobot Point')
                    ->required()
                    ->numeric(),
                Forms\Components\DatePicker::make('waktu')
                    ->label('Tanggal')
                    ->placeholder('Tanggal')
                    ->native(false)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(self::getTableColumns())
            ->filters([
                //
            ])
            ->headerActions([
                ExportAction::make()
                    ->exporter(PrestasiExporter::class)
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
                    ->hiddenOn(PrestasiRelationManager::class),
                Tables\Columns\TextColumn::make('siswa.tahunAjaran.kode')
                    ->label('Tahun Ajaran')
                    ->hiddenOn(PrestasiTerbaru::class),
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Prestasi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('point')
                    ->label('Point Prestasi')
                    ->alignCenter(true)
                    ->badge()
                    ->color('success')
                    ->sortable(),
                Tables\Columns\TextColumn::make('waktu')
                    ->label('Tanggal')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePrestasis::route('/'),
        ];
    }
}
