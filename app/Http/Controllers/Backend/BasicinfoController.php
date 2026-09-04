<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Basicinfo;
use Illuminate\Http\Request;

class BasicinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $webinfo = Basicinfo::first();
        $orderSecurityStatus = \App\Models\Information::where('key', 'duplicate_order_check')->first()->value ?? 'ON';
        $orderSecurityHours = \App\Models\Information::where('key', 'duplicate_order_hours')->first()->value ?? '24';
        return view('backend.content.basicinfo.index', compact('webinfo', 'orderSecurityStatus', 'orderSecurityHours'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Basicinfo  $basicinfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $webinfo = Basicinfo::where('id', $id)->first();
        $webinfo->email = $request->email;
        $webinfo->courier = $request->courier;
        $webinfo->usd_rate = $request->usd_rate;
        $webinfo->phone_one = $request->phone_one;
        $webinfo->imo = $request->imo;
        $webinfo->phone_two = $request->phone_two;
        $webinfo->address = $request->address;
        $webinfo->wp_1 = $request->wp_1;
        $webinfo->wp_2 = $request->wp_2;
        $webinfo->vat_status = $request->vat_status;
        $webinfo->vat = $request->vat;
        $webinfo->bk = $request->bk;
        $webinfo->ng = $request->ng;
        $webinfo->dbbl = $request->dbbl;
        $webinfo->messanger = $request->messanger;
        if ($request->logo) {
            if ($webinfo->logo == 'webview/assets/images/logo.png') {
            } else {
                //unlink($webinfo->logo);
            }
            $logo = $request->file('logo');
            $name = time() . "_" . $logo->getClientOriginalName();
            $uploadPath = ('images/categorybanner/');
            $logo->move($uploadPath, $name);
            $logoImgUrl = $uploadPath . $name;
            $webinfo->logo = $logoImgUrl;
        }
        
        if ($request->favicon) { 
            $logof = $request->file('favicon');
            $namef = time() . "_" . $logof->getClientOriginalName();
            $uploadPathf = ('images/categorybanner/');
            $logof->move($uploadPathf, $namef);
            $logoImgUrlf = $uploadPathf . $namef;
            $webinfo->favicon = $logoImgUrlf;
        }
        
        if ($request->page_image) { 
            $logop = $request->file('page_image');
            $namep = time() . "_" . $logop->getClientOriginalName();
            $uploadPathp = ('images/categorybanner/');
            $logop->move($uploadPathp, $namep);
            $logoImgUrlp = $uploadPathp . $namep;
            $webinfo->page_image = $logoImgUrlp;
        }
        $webinfo->save();
        return redirect()->back()->with('message', 'Info updated successfully');
    }

    public function pixelanalytics(Request $request, $id)
    {
        $webinfo = Basicinfo::where('id', $id)->first();
        if ($request->facebook_pixel) {
            $webinfo->facebook_pixel = $request->facebook_pixel;
        } else {
            $webinfo->facebook_pixel = '';
        }
        if ($request->google_analytics) {
            $webinfo->google_analytics = $request->google_analytics;
        } else {
            $webinfo->google_analytics = '';
        }
        if ($request->marquee_text) {
            $webinfo->marquee_text = $request->marquee_text;
        } else {
            $webinfo->marquee_text = '';
        }
        if ($request->chat_box) {
            $webinfo->chat_box = $request->chat_box;
        } else {
            $webinfo->chat_box = '';
        }
        if (isset($request->footer_text)) {
            $webinfo->footer_text = $request->footer_text;
        } else {
            $webinfo->footer_text = null;
        }
        $webinfo->update();
        return redirect()->back()->with('message', 'Pixel & Analytics updated successfully');
    }

    public function sociallink(Request $request, $id)
    {
        $webinfo = Basicinfo::where('id', $id)->first();
        if (isset($request->facebook)) {
            $webinfo->facebook = $request->facebook;
        } else {
            $webinfo->facebook = null;
        }
        if (isset($request->twitter)) {
            $webinfo->twitter = $request->twitter;
        } else {
            $webinfo->twitter = null;
        }
        if (isset($request->google)) {
            $webinfo->google = $request->google;
        } else {
            $webinfo->google = null;
        }
        if (isset($request->rss)) {
            $webinfo->rss = $request->rss;
        } else {
            $webinfo->rss = null;
        }
        if (isset($request->pinterest)) {
            $webinfo->pinterest = $request->pinterest;
        } else {
            $webinfo->pinterest = null;
        }
        if (isset($request->linkedin)) {
            $webinfo->linkedin = $request->linkedin;
        } else {
            $webinfo->linkedin = null;
        }
        if (isset($request->youtube)) {
            $webinfo->youtube = $request->youtube;
        } else {
            $webinfo->youtube = null;
        }
        
        $webinfo->update();
        return redirect()->back()->with('message', 'Social Links updated successfully');
    }

    public function shippinginfo(Request $request, $id)
    {
        $webinfo = Basicinfo::where('id', $id)->first();
        if (isset($request->inside_dhaka_charge)) {
            $webinfo->inside_dhaka_charge = $request->inside_dhaka_charge;
        } else {
            $webinfo->inside_dhaka_charge = null;
        }
        if (isset($request->outside_dhaka_charge)) {
            $webinfo->outside_dhaka_charge = $request->outside_dhaka_charge;
        } else {
            $webinfo->outside_dhaka_charge = null;
        }
        if (isset($request->insie_dhaka)) {
            $webinfo->insie_dhaka = $request->insie_dhaka;
        } else {
            $webinfo->insie_dhaka = null;
        }
        if (isset($request->outside_dhaka)) {
            $webinfo->outside_dhaka = $request->outside_dhaka;
        } else {
            $webinfo->outside_dhaka = null;
        }
        if (isset($request->cash_on_delivery)) {
            $webinfo->cash_on_delivery = $request->cash_on_delivery;
        } else {
            $webinfo->cash_on_delivery = null;
        }
        if (isset($request->refund_rule)) {
            $webinfo->refund_rule = $request->refund_rule;
        } else {
            $webinfo->refund_rule = null;
        }
        if (isset($request->contact)) {
            $webinfo->contact = $request->contact;
        } else {
            $webinfo->contact = null;
        }
        if (isset($request->otp_system)) {
            $webinfo->otp_system = $request->otp_system;
        } else {
            $webinfo->otp_system = 'ON'; // Default
        }
        $webinfo->update();
        return redirect()->back()->with('message', 'Shipping info updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Basicinfo  $basicinfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Basicinfo $basicinfo)
    {
        //
    }

    public function smsTemplates()
    {
        $templates = [
            'otp' => \App\Models\Information::where('key', 'sms_template_otp')->first()->value ?? '',
            'confirmed' => \App\Models\Information::where('key', 'sms_template_confirmed')->first()->value ?? '',
            'shipped' => \App\Models\Information::where('key', 'sms_template_shipped')->first()->value ?? '',
        ];

        $statuses = [
            'otp' => \App\Models\Information::where('key', 'sms_status_otp')->first()->value ?? 'ON',
            'confirmed' => \App\Models\Information::where('key', 'sms_status_confirmed')->first()->value ?? 'ON',
            'shipped' => \App\Models\Information::where('key', 'sms_status_shipped')->first()->value ?? 'ON',
        ];

        return view('backend.content.basicinfo.sms_templates', compact('templates', 'statuses'));
    }

    public function updateSmsTemplates(Request $request)
    {
        \App\Models\Information::updateOrCreate(['key' => 'sms_template_otp'], ['value' => $request->sms_template_otp]);
        \App\Models\Information::updateOrCreate(['key' => 'sms_template_confirmed'], ['value' => $request->sms_template_confirmed]);
        \App\Models\Information::updateOrCreate(['key' => 'sms_template_shipped'], ['value' => $request->sms_template_shipped]);

        \App\Models\Information::updateOrCreate(['key' => 'sms_status_otp'], ['value' => $request->has('sms_status_otp') ? 'ON' : 'OFF']);
        \App\Models\Information::updateOrCreate(['key' => 'sms_status_confirmed'], ['value' => $request->has('sms_status_confirmed') ? 'ON' : 'OFF']);
        \App\Models\Information::updateOrCreate(['key' => 'sms_status_shipped'], ['value' => $request->has('sms_status_shipped') ? 'ON' : 'OFF']);

        return redirect()->back()->with('message', 'SMS Templates & Statuses updated successfully');
    }

    public function updateOrderSecurity(Request $request)
    {
        $status = $request->has('duplicate_order_check') ? 'ON' : 'OFF';
        $hours = max(1, (int) $request->input('duplicate_order_hours', 24));

        \App\Models\Information::updateOrCreate(
            ['key' => 'duplicate_order_check'],
            ['value' => $status]
        );
        \App\Models\Information::updateOrCreate(
            ['key' => 'duplicate_order_hours'],
            ['value' => $hours]
        );

        return redirect()->back()->with('message', 'Order security settings updated successfully');
    }
}
