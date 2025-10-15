<?php
namespace App\Services\Deals;

final class DealsFetcher
{
    /** @param DealsProviderInterface[] $providers */
    public function __construct(private array $providers) {}

    public function fetchAll(int $limitPerProvider = 5): array
    {
        $all = [];
        foreach ($this->providers as $p) {
            $all = array_merge($all, $p->fetch($limitPerProvider));
        }
        return $all;
    }
}
