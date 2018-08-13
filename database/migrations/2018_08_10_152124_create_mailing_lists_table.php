<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailingListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mailing_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index();
            $table->text('company');
            $table->text('address1');
            $table->text('address2')->nullable()->default(null);
            $table->text('city');
            $table->text('state');
            $table->text('zip');
            $table->text('country');
            $table->text('phone')->nullable()->default(null);
            $table->text('permission_reminder');
            $table->text('use_archive_bar')->nullable()->default(null);
            $table->text('from_name');
            $table->text('from_email');
            $table->text('subject')->nullable()->default(null);
            $table->text('language');
            $table->text('notify_on_subscribe')->nullable()->default(null);
            $table->text('notify_on_unsubscribe')->nullable()->default(null);
            $table->boolean('email_type_option');
            $table->text('visibility')->nullable()->default(null);
            $table->text('double_optin')->nullable()->default(null);
            $table->text('marketing_permissions')->nullable()->default(null);
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
        Schema::dropIfExists('mailing_lists');
    }
}