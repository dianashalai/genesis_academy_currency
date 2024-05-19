<?php
namespace App\Repositories;

use App\Contracts\Repositories\SubscriberRepositoryInterface;
use App\Models\ExchangeRate;
use App\Models\Subscriber;
use Illuminate\Database\Eloquent\Collection;

class SubscriberRepository extends BaseRepository implements SubscriberRepositoryInterface
{
    public function getAllSubscribers(): Collection
    {
        return Subscriber::all();
    }
    public function createSubscriber($email, ExchangeRate $rate): Subscriber
    {
        return Subscriber::create(['email' => $email, 'exchange_rate_id' => $rate->getAttribute('id')]);
    }
}
