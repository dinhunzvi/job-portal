<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_documents', function (Blueprint $table) {
            $table->id();
            $table->bigInteger( 'user_id' )->unsigned();
            $table->char( 'document_name', 60 )->unique();
            $table->string( 'document_type', 60 );
            $table->timestamps();

            $table->foreign('user_id' )->on( 'users' )->references( 'id' );

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidate_documents');
    }

}
