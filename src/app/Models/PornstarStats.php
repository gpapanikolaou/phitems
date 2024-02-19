<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

readonly class PornstarStats
{
    public function __construct(
        public int $subscriptions,
        public int $monthlySearches,
        public int $views,
        public int $videosCount,
        public int $premiumVideosCount,
        public int $whiteLabelVideoCount,
        public int $rank,
        public int $rankPremium,
        public string $rankWl,
    ) {}

}