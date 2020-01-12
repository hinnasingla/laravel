<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchOddsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_odds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('match_id');
            $table->decimal('team_one');
            $table->decimal('team_two');
            $table->decimal('tie');
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
        Schema::dropIfExists('match_odds');
    }
}
