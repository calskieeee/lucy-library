<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransaksiResource\Pages;
use App\Filament\Resources\TransaksiResource\RelationManagers;
use App\Models\Transaksi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransaksiResource extends Resource
{
    protected static ?string $model = Transaksi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_transaksi')
                ->label('Nomor Transaksi')
                ->required(),
                Forms\Components\Select::make('id_buku')
                ->relationship('buku', 'judul_buku')
                ->required(),
                Forms\Components\Select::make('id_anggota')
                ->relationship('anggota', 'nama_anggota')
                ->required(),
                Forms\Components\DatePicker::make('tanggal_meminjam')
                ->label('Tanggal Meminjam')
                ->required(),
                Forms\Components\DatePicker::make('tanggal_mengembalikan')
                ->label('Tanggal Mengembalikan')
                ->required(),
                Forms\Components\Select::make('status_transaksi')
                ->label('Status')
                ->options([
                    'Selesai' => 'Selesai',
                    'Belum Selesai' => 'Belum Selesai',
                    'Terlambat' => 'Terlambat',
                ])
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_transaksi')
                ->searchable(),
                Tables\Columns\TextColumn::make('buku.judul_buku')
                ->searchable(),
                Tables\Columns\TextColumn::make('anggota.nama_anggota')
                ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_meminjam')
                ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_mengembalikan')
                ->sortable(),
                Tables\Columns\TextColumn::make('status_transaksi')
                ->searchable(),
                
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
            'index' => Pages\ListTransaksis::route('/'),
            'create' => Pages\CreateTransaksi::route('/create'),
            'view' => Pages\ViewTransaksi::route('/{record}'),
            'edit' => Pages\EditTransaksi::route('/{record}/edit'),
        ];
    }
}
