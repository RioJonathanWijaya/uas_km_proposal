<?php

namespace App\Filament\Resources\ProposalResource\Pages;

use App\Filament\Resources\ProposalResource;
use App\Models\Proposal;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Actions\Action;
use Filament\Forms\Components\Select;

class ViewProposal extends ViewRecord
{
    protected static string $resource = ProposalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('baka_id')
                ->label("BAKA Acccept")
                ->color('info')
                ->form([
                    Select::make('baka_id')
                        ->label('BAKA')
                        ->options(User::pluck('name', 'id')->toArray())
                        ->required(),
                ])
                ->action(function(array $data, Proposal $proposal) {
                    $proposal->update([
                        'status' => 'Accepted by BAKA',
                        'baka_id' => $data['baka_id'],
                    ]);
                }),
                Action::make('wr3_id')
                    ->label("WR3 Acccept")
                    ->color('success')
                    ->form([
                        Select::make('wr3_id')
                            ->label('WR3')
                            ->options(User::pluck('name', 'id')->toArray())
                            ->required(),
                    ])
                    ->action(function(array $data, Proposal $proposal) {
                        $proposal->update([
                            'status' => 'Accepted by WR3',
                            'wr3_id' => $data['wr3_id'],
                        ]);
                    }),
            Action::make('reject')
                ->color('danger')
                ->requiresConfirmation()
                ->action(fn (Proposal $proposal) => $proposal->update([
                    'status' => 'Rejected',
                    'baka_id' => null,
                    'wr3_id' => null,
                ])),

                Action::make('view_pdf')
                ->label('View PDF')
                ->icon('heroicon-o-eye')
                ->color('primary')
                ->url(fn (Proposal $proposal) => route('proposals.pdf', $proposal->pdf))
                ->openUrlInNewTab()
                
        ];
    }
}
