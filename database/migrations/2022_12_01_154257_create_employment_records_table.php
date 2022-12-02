<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmploymentRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employment_records', function (Blueprint $table) {
            $table->id();
            $table->bigInteger( 'user_id' )->unsigned();
            $table->string( 'company_name' );
            $table->date( 'start_date' );
            $table->date( 'end_date' )->nullable();
            $table->string( 'position', 100 );
            $table->text( 'description' );
            $table->timestamps();

            $table->foreign( 'user_id' )->on( 'users' )->references( 'id' );

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employment_records');
    }
}
