<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lists', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')
                  ->index()
                  ->comment('Пользователь, который создал список');

            $table->string('name')
                  ->index()
                  ->comment('Название списка');

            $table->integer('position')
                  ->default(0)
                  ->comment('Порядок отображения списка');
                  
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
        Schema::dropIfExists('lists');
    }
}
