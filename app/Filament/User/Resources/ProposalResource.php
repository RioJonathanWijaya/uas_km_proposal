<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\ProposalResource\Pages;
use App\Filament\User\Resources\ProposalResource\RelationManagers;
use App\Models\Proposal;
use Filament\Forms;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProposalResource extends Resource
{
    protected static ?string $model = Proposal::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('title')
                ->label('Proposal Title')
                ->required(),
            Forms\Components\DatePicker::make('tanggal_kegiatan_mulai')
            ->label('Tanggal Kegiatan Mulai')
            ->required(),
            Forms\Components\DatePicker::make('tanggal_kegiatan_selesai')
            ->label('Tanggal Kegiatan Selesai')
            ->required(),
            Forms\Components\TimePicker::make('jam_mulai')
            ->label('Jam Kegiatan Mulai')
            ->required(),
            Forms\Components\TimePicker::make('jam_selesai')
            ->label('Jam Kegiatan Selesai')
            ->required(),
            Forms\Components\TextInput::make('tempat_kegiatan')
            ->label('Tempat Kegiatan')
            ->required(),
            Forms\Components\TextInput::make('pelaksana_kegiatan')
            ->label('Pelaksana Kegiatan')
            ->required(),
            Forms\Components\FileUpload::make('pdf')
                ->label('Proposal File')
                ->acceptedFileTypes(['application/pdf'])
                ->required(),
                
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
            // 'edit' => Pages\EditProposal::route('/{record}/edit'),
        ];
    }
}
