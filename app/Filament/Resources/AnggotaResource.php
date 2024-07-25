<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AnggotaResource\Pages;
use App\Filament\Resources\AnggotaResource\RelationManagers;
use App\Models\Anggota;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AnggotaResource extends Resource
{
    protected static ?string $model = Anggota::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_anggota')
                ->label('Nomor Anggota')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('nama_anggota')
                ->label('Nama')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('alamat')
                ->label('Alamat')
                ->required()
                ->maxLength(255),
                Forms\Components\DatePicker::make('tanggal_daftar')
                ->label('Tanggal Pendaftaran')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_anggota')
                ->label('Nomor Anggota')
                ->searchable(),
                Tables\Columns\TextColumn::make('nama_anggota')
                ->label('Nama')
                ->searchable(),
                Tables\Columns\TextColumn::make('alamat')
                ->label('Alamat')
                ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_daftar')
                ->label('Tanggal Pendaftaran')
                ->date()
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
            'index' => Pages\ListAnggotas::route('/'),
            'create' => Pages\CreateAnggota::route('/create'),
            'view' => Pages\ViewAnggota::route('/{record}'),
            'edit' => Pages\EditAnggota::route('/{record}/edit'),
        ];
    }
}
