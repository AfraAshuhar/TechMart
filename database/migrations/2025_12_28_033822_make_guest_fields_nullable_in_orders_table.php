<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('orders', function (Blueprint $table) {
        $table->string('guest_name')->nullable()->change();
        $table->string('guest_email')->nullable()->change();
        $table->string('guest_phone')->nullable()->change();
        $table->text('guest_address')->nullable()->change();
    });
}

public function down()
{
    Schema::table('orders', function (Blueprint $table) {
        $table->string('guest_name')->nullable(false)->change();
        $table->string('guest_email')->nullable(false)->change();
        $table->string('guest_phone')->nullable(false)->change();
        $table->text('guest_address')->nullable(false)->change();
    });
}

};
