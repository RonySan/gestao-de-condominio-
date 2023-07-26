<?php

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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('cfp')->unique();
            $table->string('password');
        });
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('id_owner');
        });
        Schema::create('unitpeoples', function (Blueprint $table) {
            $table->id();
            $table->string('id_unit');
            $table->string('name');
            $table->string('birtdata');
        });
        Schema::create('unitvwhicles', function (Blueprint $table) {
            $table->id();
            $table->string('id_unit');
            $table->string('title');
            $table->string('color');
            $table->string('plate');
        });
        Schema::create('unitpets', function (Blueprint $table) {
            $table->id();
            $table->string('id_unit');
            $table->string('name');
            $table->string('race');
        });
        Schema::create('walls', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('body');
            $table->datetime('datecreate');
        });
        Schema::create('walllikes', function (Blueprint $table) {
            $table->id();
            $table->integer('id_wall');
            $table->integer('id_user');
        });
        Schema::create('docs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('fileurl');
        });
        Schema::create('billets', function (Blueprint $table) {
            $table->id();
            $table->string('id_unit');
            $table->string('title');
            $table->string('fileurl');
        });
        Schema::create('warnigs', function (Blueprint $table) {
            $table->id();
            $table->integer('id_unit');
            $table->string('title');
            $table->string('status')->default('IN_ REVIEW');
            $table->date('datecreated');
            $table->text('photos');
        });
        Schema::create('foundandlost', function (Blueprint $table) {
            $table->id();
            $table->string('status')->default('LOST');
            $table->string('photo');
            $table->string('description');
            $table->string('where');
            $table->date('datecreated');
        });
        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->integer('allowed')->default(1);
            $table->string('title');
            $table->string('cover');
            $table->string('days');
            $table->time('start_time');
            $tatle->time('end_time');
        });
        Schema::create('areadisableddays', function (Blueprint $table) {
            $table->id();
            $table->integer('id_area');
            $table->string('day');
        });
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->integer('id_unit');
            $table->integer('id_area');
            $table->datetime('reservation_date');
        });


}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('units');
        Schema::dropIfExists('unitpeoples');
        Schema::dropIfExists('unitvwhicles');
        Schema::dropIfExists('unitpets');
        Schema::dropIfExists('walls');
        Schema::dropIfExists('walllikes');
        Schema::dropIfExists('docs');
        Schema::dropIfExists('billets');
        Schema::dropIfExists('warnigs');
        Schema::dropIfExists('foundandlost');
        Schema::dropIfExists('all_tables');
        Schema::dropIfExists('all_tables');
        Schema::dropIfExists('all_tables');
        Schema::dropIfExists('all_tables');
        Schema::dropIfExists('all_tables');
        Schema::dropIfExists('all_tables');

    }
};
