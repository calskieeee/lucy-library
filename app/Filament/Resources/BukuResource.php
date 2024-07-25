<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BukuResource\Pages;
use App\Filament\Resources\BukuResource\RelationManagers;
use App\Models\Buku;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BukuResource extends Resource
{
    protected static ?string $model = Buku::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_buku')
                    ->label('Kode Buku')
                    ->required(),
                Forms\Components\Select::make('id_kategori')
                    ->relationship('kategori', 'nama_kategori')
                    ->required(),
                Forms\Components\TextInput::make('judul_buku')
                    ->label('Judul Buku')
                    ->required(),
                Forms\Components\TextInput::make('pengarang')
                    ->label('Pengarang Buku')
                    ->required(),
                Forms\Components\TextInput::make('penerbit')
                    ->label('Penerbit Buku')
                    ->required(),
                Forms\Components\Datepicker::make('tahun_terbit')
                    ->label('Tahun Terbit')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_buku')
                ->label('Kode Buku')
                ->searchable(),
                Tables\Columns\TextColumn::make('kategori.nama_kategori')
                ->label('Kategori')
                ->searchable(),
                Tables\Columns\TextColumn::make('judul_buku')
                ->label('Judul Buku')
                ->searchable(),
                Tables\Columns\TextColumn::make('pengarang')
                ->label('Pengarang Buku')
                ->searchable(),
                Tables\Columns\TextColumn::make('penerbit')
                ->label('penerbit_buku')
                ->searchable(),
                Tables\Columns\TextColumn::make('tahun_terbit')
                ->label('Tahun Terbit')
                ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBukus::route('/'),
            'create' => Pages\CreateBuku::route('/create'),
            'view' => Pages\ViewBuku::route('/{record}'),
            'edit' => Pages\EditBuku::route('/{record}/edit'),
        ];
    }
}
