<?php

namespace App\Filament\User\Resources\ProposalResource\Pages;

use App\Filament\User\Resources\ProposalResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProposal extends CreateRecord
{
    protected static string $resource = ProposalResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['submitter_id'] = auth()->id();
    
        return $data;
    }
}
