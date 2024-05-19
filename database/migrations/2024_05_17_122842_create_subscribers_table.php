<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscribersTable extends Migration
{
    public function up(): void
    {
        Schema::create('subscribers', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->timestamps();
            $table->foreignIdFor(\App\Models\ExchangeRate::class);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subscribers');
    }
}
