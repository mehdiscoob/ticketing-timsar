<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_from');
            $table->unsignedBigInteger('user_to');
            $table->unsignedBigInteger('ticket_id');
            $table->string('type');
            $table->enum('status', ['open', 'closed', 'pending']);
            $table->text('text');
            $table->string('title');
            $table->timestamp();
            $table->softDeletes();
            $table->unsignedBigInteger('relation_id')->nullable();
            $table->timestamps();
            $table->foreign('user_from')->references('id')->on('users');
            $table->foreign('user_to')->references('id')->on('users');
            $table->foreign('ticket_id')->references('id')->on('tickets');
            $table->fullText('text', 'text_fulltext_index');
            $table->index('user_from');
            $table->index('user_to');
            $table->index('ticket_id');
            $table->index('relation_id');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
