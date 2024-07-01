<?php

namespace App\Filament\Resources;

use App\Enums\JenisKelamin;
use App\Enums\StatusSiswa;
use App\Filament\Exports\SiswaExporter;
use App\Filament\Resources\SiswaResource\Pages;
use App\Filament\Resources\SiswaResource\RelationManagers;
use App\Filament\Resources\SiswaResource\RelationManagers\PelanggaransRelationManager;
use App\Filament\Resources\SiswaResource\RelationManagers\PrestasiRelationManager;
use App\Models\Kelas;
use App\Models\Siswa;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SiswaResource extends Resource
{
    protected static ?string $model = Siswa::class;

    protected static ?int $navigationSort = 4;

    protected static ?string $navigationGroup = 'Manajemen Siswa';

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nisn')
                    ->placeholder('NISN Siswa')
                    ->numeric()
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Select::make('jurusan_id')
                    ->preload()
                    ->live()
                    ->searchable()
                    ->relationship('jurusan', 'kode')
                    ->required(),
                Forms\Components\Select::make('kelas_id')
                    ->relationship('kelas', 'nama')
                    ->preload()
                    ->searchable()
                    ->live()
                    ->required(),
                Forms\Components\Select::make('tahun_ajaran_id')
                    ->preload()
                    ->searchable()
                    ->live()
                    ->relationship('tahunAjaran', 'kode')
                    ->required(),
                Forms\Components\TextInput::make('nama')
                    ->placeholder('Nama Siswa')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->placeholder('Alamat Email')
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nomor_hp')
                    ->label('Nomor Handphone')
                    ->placeholder('Nomor Handphone')
                    ->maxLength(255),
                Forms\Components\Radio::make('jenis_kelamin')
                    ->options(JenisKelamin::class)
                    ->required(),
                Forms\Components\Select::make('status')
                    ->preload()
                    ->searchable()
                    ->live()
                    ->options(StatusSiswa::class)
                    ->required(),
                Forms\Components\MarkdownEditor::make('alamat')
                    ->placeholder('Alamat Siswa')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('jurusan.nama')
                    ->description(fn ($record) => 'Kelas: ' . $record->kelas->nama)
                    ->numeric()
                    ->sortable(),
                TextColumn::make('nisn')
                    ->badge()
                    ->color('gray')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenis_kelamin')
                    ->badge()
                    ->color(fn ($state) => $state->getColor()),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn ($state) => $state->getColor()),
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
                SelectFilter::make('status')
                    ->options(StatusSiswa::class)
                    ->searchable(),
            ])
            ->headerActions([
                Tables\Actions\ExportAction::make()
                ->label('Export Excel')
                ->fileDisk('public')
                ->color('success')
                ->icon('heroicon-o-document-text')
                ->exporter(SiswaExporter::class),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])->icon('heroicon-o-bars-3'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            PelanggaransRelationManager::class,
            PrestasiRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSiswas::route('/'),
            'create' => Pages\CreateSiswa::route('/create'),
            'view' => Pages\ViewSiswa::route('/{record}'),
            'edit' => Pages\EditSiswa::route('/{record}/edit'),
        ];
    }

    
}
