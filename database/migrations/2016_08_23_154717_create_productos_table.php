<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

            Schema::create('productos', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nombre', 60)->required();

                $table->integer('clasificacion_id')->unsigned();
                $table->integer('marca_id')->unsigned();
                $table->integer('file_id')->unsigned();
                $table->foreign('clasificacion_id')
                    ->references('id')
                    ->on('clasificaciones')
                    ->OnDelete('cascade');
                $table->foreign('marca_id')
                    ->references('id')
                    ->on('marcas')
                    ->OnDelete('cascade');
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
        Schema::drop('productos');
    }
}
