<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function(Blueprint $table) {
            $table->id();
            
            $table->foreignId('list_id')
                  ->constrained('lists')
                  ->comment('Лист к которой привязана задача');

            $table->bigInteger('user_id')
                  ->index()
                  ->comment('Пользователь, который создал задачу');

            $table->bigInteger('parent_id')
                  ->index()
                  ->nullable()
                  ->comment('Задача родитель');
            
            $table->string('name')
                  ->index()
                  ->comment('Название задачи');

            $table->string('description')
                  ->index()
                  ->nullable()
                  ->comment('Допольнительное описание задачи');

            $table->integer('position')
                  ->default(0)
                  ->comment('Порядок отображения задачи');

            $table->boolean('is_completed')
                  ->index()
                  ->default(false)
                  ->comment('Флаг статуса выполнения задачи');
            
            $table->dateTime('completed_at')
                  ->nullable()
                  ->comment('Время выполнения задачи');

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
        Schema::dropIfExists('tasks');
    }
}
