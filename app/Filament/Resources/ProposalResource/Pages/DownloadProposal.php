<?php

namespace App\Filament\Resources\ProposalResource\Pages;

use App\Filament\Resources\ProposalResource;
use Filament\Resources\Pages\Page;

class DownloadProposal extends Page
{
    protected static string $resource = ProposalResource::class;

    protected static string $view = 'filament.resources.proposal-resource.pages.download-proposal';
}
