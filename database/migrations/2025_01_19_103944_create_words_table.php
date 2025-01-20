<?php

use App\Models\Dialect;
use App\Models\Language;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('words', function (Blueprint $table) {
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Language::class);
            $table->foreignIdFor(Dialect::class);
            $table->id();
            $table->string('word');
            $table->string('meaning');
            $table->string('example');
            $table->integer('upvotes');
            $table->integer('downvotes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('words');
    }
};
