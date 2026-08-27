<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOtpColumnsToOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('otp', 6)->nullable()->after('is_pixel_fired');
            $table->boolean('otp_verified')->default(false)->after('otp');
            $table->tinyInteger('otp_attempts')->default(0)->after('otp_verified');
            $table->timestamp('otp_expires_at')->nullable()->after('otp_attempts');
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['otp', 'otp_verified', 'otp_attempts', 'otp_expires_at']);
        });
    }
}
