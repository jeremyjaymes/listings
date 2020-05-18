<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('street_address');
            $table->string('city');
            $table->foreignId('state_id')->constrained();
            $table->string('zip', 10)->nullable();
            $table->float('lat', 10, 6)->nullable();
            $table->float('long', 10, 6)->nullable();
            $table->bigInteger('phone')->nullable()->unsigned();
            $table->string('company_email')->nullable();
            $table->string('contact_email');
            $table->string('website')->nullable();
            $table->boolean('display_contact')->default(false);
            $table->boolean('is_approved')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listings');
    }
}
