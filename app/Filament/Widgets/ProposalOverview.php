<?php

namespace App\Filament\Widgets;

use App\Models\Proposal;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ProposalOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Proposals', Proposal::count())
            ->color('warning')
            ->description('Total number of proposals submitted by students.'),
            Stat::make('Total Proposals (Accepted by BAKA)', Proposal::where('status', 'Accepted by BAKA')->count())
            ->color('info')
            ->description('Total number of proposals accepted by BAKA.'),
            Stat::make('Total Proposals (Accepted by WR3)', Proposal::where('status', 'Accepted by WR3')->count())
            ->color('success')
            ->description('Total number of proposals accepted by WR3.'),
        ];
    }
}
