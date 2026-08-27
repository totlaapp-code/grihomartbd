<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertDefaultSmsTemplatesIntoInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $templates = [
            [
                'key' => 'sms_template_otp',
                'value' => 'Grihomartbd অর্ডার #[invoice_id] নিশ্চিত করতে OTP: [otp_code] (১৫ মিনিট বৈধ)। কাউকে শেয়ার করবেন না।'
            ],
            [
                'key' => 'sms_template_confirmed',
                'value' => 'ধন্যবাদ, আপনার অর্ডারটি ID:[invoice_id] কনফার্ম হয়েছে - মোটঃ [sub_total] টাকা।প্যাকেজিং এর জন্য প্রস্তুত , Hotline: 01888173003'
            ],
            [
                'key' => 'sms_template_shipped',
                'value' => ' অভিনন্দন,আপনার অর্ডারটি [invoice_id] কুরিয়ার করা হয়েছে।মোটঃ[sub_total] টাকা। ডেলিভারির সময়ঃ ২-৩ দিন। ট্র্যাক পার্সেলঃ [tracking_link] , Hotline: 01888173003'
            ]
        ];

        foreach ($templates as $template) {
            $exists = \Illuminate\Support\Facades\DB::table('information')->where('key', $template['key'])->exists();
            if (!$exists) {
                \Illuminate\Support\Facades\DB::table('information')->insert($template);
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \App\Models\Information::whereIn('key', [
            'sms_template_otp',
            'sms_template_confirmed',
            'sms_template_shipped'
        ])->delete();
    }
}
