<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProposalResource\Pages;
use App\Filament\Resources\ProposalResource\RelationManagers;
use App\Models\Proposal;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Infolists\Components\ViewEntry;

class ProposalResource extends Resource
{
    protected static ?string $model = Proposal::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function canCreate(): bool
    {
        return false;
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Grid::make(2)->schema([
                    Infolists\Components\TextEntry::make('title')
                        ->color('primary'),
                    Infolists\Components\TextEntry::make('status')
                        ->badge()
                        ->color(fn (string $state): string => match ($state) {
                            'Pending' => 'warning',
                            'Accepted by BAKA' => 'info',
                            'Accepted by WR3' => 'success',
                            'Rejected' => 'danger',
                        }),
                    Infolists\Components\TextEntry::make('tanggal_kegiatan_mulai')
                        ->color('primary'),
                    Infolists\Components\TextEntry::make('tanggal_kegiatan_selesai')
                        ->color('primary'),
                    Infolists\Components\TextEntry::make('jam_mulai')
                        ->color('primary'),
                    Infolists\Components\TextEntry::make('jam_selesai')
                        ->color('primary'),
                    Infolists\Components\TextEntry::make('tempat_kegiatan')
                        ->color('primary'),
                    Infolists\Components\TextEntry::make('pelaksana_kegiatan')
                        ->color('primary'),
                ]),
                Infolists\Components\ViewEntry::make('pdf')
                    ->view('filament.infolists.entries.preview-pdf'),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pdf')->label('Proposal File'),
                Tables\Columns\TextColumn::make('created_at')->label('Submitted At'),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Pending' => 'warning',
                        'Accepted by BAKA' => 'info',
                        'Accepted by WR3' => 'success',
                        'Rejected' => 'danger',
                    })
                    ->searchable(),

            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
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
            'index' => Pages\ListProposals::route('/'),
            'create' => Pages\CreateProposal::route('/create'),
            'view' => Pages\ViewProposal::route('/{record}/view'),
            'edit' => Pages\EditProposal::route('/{record}/edit'),
            'download' => Pages\DownloadProposal::route('/{record}/download'),
        ];
    }
}
