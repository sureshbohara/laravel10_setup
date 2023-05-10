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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('system_name')->nullable();
            $table->string('email')->nullable();
            $table->string('email1')->nullable();
            $table->string('phone')->nullable();
            $table->string('contact')->nullable();
            $table->string('address')->nullable();
            $table->string('address1')->nullable();
            $table->string('opening_hr')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->string('webiste')->nullable();
            $table->string('github')->nullable();
            $table->string('title1')->nullable();
            $table->string('title2')->nullable();
            $table->string('title3')->nullable();
            $table->string('title4')->nullable();
            $table->string('title5')->nullable();
            $table->string('title6')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->longText('meta_description')->nullable();
            $table->text('google_analytic_id')->nullable();
            $table->text('is_analytic')->nullable();
            $table->text('google_recaptcha_site_key')->nullable();
            $table->text('google_recaptcha_secret_key')->nullable();
            $table->text('is_recaptcha')->nullable();
            $table->text('cookie_consent_message')->nullable();
            $table->text('cookie_consent_btn_text')->nullable();
            $table->text('is_cookie')->nullable();
            $table->text('is_maintainance')->default(1)->nullable();
            $table->text('maintainance_text')->nullable();
            $table->string('mail_transport')->nullable();
            $table->string('mail_host')->nullable();
            $table->string('mail_port')->nullable();
            $table->string('mail_username')->nullable();
            $table->string('mail_password')->nullable();
            $table->string('mail_encryption')->nullable();
            $table->string('mail_from')->nullable();
            $table->string('mail_from_name')->nullable();
            $table->string('twilio_sid')->nullable();
            $table->string('twilio_token')->nullable();
            $table->string('twilio_form_number')->nullable();
            $table->string('twilio_country_code')->nullable();
            $table->string('link_1')->nullable();
            $table->string('link_2')->nullable();
            $table->string('link_3')->nullable();
            $table->string('link_4')->nullable();
            $table->string('link_5')->nullable();
            $table->text('currency_name')->nullable();
            $table->text('currency_sign')->nullable();
            $table->text('currency_value')->nullable();

            $table->longText('introduction')->nullable();
            $table->longText('our_vision')->nullable();
            $table->longText('our_mission')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
