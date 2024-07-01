<?php

namespace App\Filament\Resources\ProposalResource\Widgets;

use App\Models\Proposal;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Proposals', "137"),
            Stat::make('Total Proposals', "137"),
            Stat::make('Total Proposals', "137")
        ];
    }
}
