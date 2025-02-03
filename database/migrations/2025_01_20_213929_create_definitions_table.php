<?php

use App\Models\Definition;
use App\Models\Dialect;
use App\Models\User;
use App\Models\Term;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('definitions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(User::class, 'user_id')->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Term::class, 'term_id')->constrained()->cascadeOnDelete();
            $table->string('definition');
            $table->boolean('is_approved')->default(false);
            $table->string('example');
        });

        Schema::create('definition_dialect', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Definition::class);
            $table->foreignIdFor(Dialect::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('definitions');
        Schema::dropIfExists('definition_dialect');
    }
};
