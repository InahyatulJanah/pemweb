<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PembayaranResource\Pages;
use App\Models\Pembayaran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class PembayaranResource extends Resource
{
    protected static ?string $model = Pembayaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    protected static ?string $navigationLabel = 'Data Pembayaran';
    protected static ?string $modelLabel = 'Pembayaran';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_pengguna')
                    ->label('Nama Pengguna')
                    ->required()
                    ->maxLength(255),

                Forms\Components\DatePicker::make('tanggal_pembayaran')
                    ->label('Tanggal Pembayaran')
                    ->required(),

                Forms\Components\TextInput::make('jumlah')
                    ->label('Jumlah Pembayaran')
                    ->required()
                    ->numeric()
                    ->prefix('Rp'),
                
                

                Forms\Components\Select::make('status')
                    ->label('Status Pembayaran')
                    ->required()
                    ->options([
                        'lunas' => 'Lunas',
                        'belum_lunas' => 'Belum Lunas',
                    ]),

                Forms\Components\Textarea::make('keterangan')
                    ->label('Keterangan')
                    ->columnSpanFull()
                    ->maxLength(1000),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_pengguna')
                    ->label('Nama Pengguna')
                    ->searchable(),

                Tables\Columns\TextColumn::make('tanggal_pembayaran')
                    ->label('Tanggal')
                    ->date()
                    ->sortable(),

                Tables\Columns\TextColumn::make('jumlah')
                    ->label('Jumlah')
                    ->money('IDR')
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('keterangan')
                    ->label('Keterangan')
                    ->limit(30) // agar tidak terlalu panjang
                    ->toggleable(),
                

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'lunas' => 'Lunas',
                        'belum_lunas' => 'Belum Lunas',
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'lunas' => 'success',
                        'belum_lunas' => 'warning',
                    }),
                

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'lunas' => 'Lunas',
                        'belum_lunas' => 'Belum Lunas',
                    ]),
            ])
            ->actions([
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPembayarans::route('/'),
            'create' => Pages\CreatePembayaran::route('/create'),
            'edit' => Pages\EditPembayaran::route('/{record}/edit'),
        ];
    }
}
