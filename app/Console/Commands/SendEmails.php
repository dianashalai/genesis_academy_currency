<?php

namespace App\Console\Commands;

use App\Contracts\Repositories\SubscriberRepositoryInterface;
use App\Models\ExchangeRate;
use App\Models\Subscriber;
use App\Services\MailService;
use Illuminate\Console\Command;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function __construct(private SubscriberRepositoryInterface $repository) {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $subscribers = $this->repository->getAllSubscribers();

        /**
         * @var $subscriber Subscriber
         * @var $rate ExchangeRate
         */
        foreach ($subscribers as $subscriber) {
            $rate = ExchangeRate::where(['id'=> $subscriber->getAttribute('exchange_rate_id')])->first();

            MailService::sendCurrencyRateEmail(
                $subscriber,
                $rate->getAttribute('from_currency'),
                $rate->getAttribute('to_currency'),
                $rate->getAttribute('rate'),
            );
        }
    }
}
