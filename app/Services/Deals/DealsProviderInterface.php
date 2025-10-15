<?php
namespace App\Services\Deals;

interface DealsProviderInterface
{
    /** @return array<int,array{source:string,title:string,price?:float|int|string|null,url:string,image?:string|null}> */
    public function fetch(int $limit = 10): array;
}
