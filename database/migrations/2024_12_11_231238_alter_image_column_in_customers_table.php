<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AlterImageColumnInCustomersTable extends Migration
{
    public function up(): void
    {
        // Step 1: Update existing NULL values to an empty string
        DB::table('customers')->whereNull('image')->update(['image' => '']);

        // Step 2: Modify the 'image' column to 'text' and make it NOT NULL
        Schema::table('customers', function (Blueprint $table) {
            $table->text('image')->nullable(false)->change();
        });
    }

    public function down(): void
    {
        // Revert the 'image' column back to 'string' and make it nullable
        Schema::table('customers', function (Blueprint $table) {
            $table->string('image')->nullable()->change();
        });
    }
}
