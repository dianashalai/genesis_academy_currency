<?php

namespace App\Http\Controllers;

use App\Contracts\Services\SubscribeServiceInterface;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function __construct(private SubscribeServiceInterface $subscriberService) {}

    public function subscribe(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $request->validate([
                'email' => 'required|email|unique:subscribers,email',
                'from_currency' => 'required|string',
                'to_currency' => 'required|string'
            ]);

            $from = $request->get('from_currency');
            $to = $request->get('to_currency');
            $email = $request->get('email');
            $this->subscriberService->subscribeUser($email, $from, $to);

            return response()->json(['message' => 'Subscribed successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
