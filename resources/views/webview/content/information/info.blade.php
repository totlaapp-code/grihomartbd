@extends('webview.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}-{{ $title }}
@endsection

<div class="body-content outer-top-xs">
    <div class="breadcrumb pt-2">
        <div class="container">
            <div class="row">
                <div class="breadcrumb-inner p-0">
                    <ul class="list-inline list-unstyled mb-0">
                        <li><a href="#"
                                style="text-transform: capitalize !important;color: #888;padding-right: 12px;font-size: 12px;">Home
                                > {{ $title }}
                            </a></li>
                    </ul>
                </div>
                <!-- /.breadcrumb-inner -->
            </div>
        </div>
        <!-- /.container -->
    </div>
</div>

<div class="container">
    <div class="row mt-4">
        <div class="col-12 p-0">
            <div class="body-content outer-top-xs p-2" style="background: white !important;">
                @if (request()->segment(count(request()->segments())) == 'contact_us')
                    @php
                        $basicinfo = App\Models\Basicinfo::first();
                    @endphp

                    <div class="body-content">
                        <div class="container">
                            <div class="contact-page">
                                <div class="row">
                                    <div class="col-12 contact-map outer-bottom-vs"></div>
                                    <div class="col-md-12 contact-info">
                                        <div class="contact-title">
                                            <h4>Information</h4>
                                        </div>

                                        <div class="address clearfix">{{ $basicinfo->address }}
                                        </div>
                                        <br>

                                        <div class="clearfix phone-no">+(88) {{ $basicinfo->phone_one }}<br> +(88)
                                            {{ $basicinfo->phone_two }}</div>

                                        <div class="clearfix email"><a
                                                href="mailto:{{ $basicinfo->email }}">{{ $basicinfo->email }}</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.contact-page -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                @else
                    {!! $value->value !!}
                @endif
            </div>
        </div>
    </div>
</div>
</div>

<style>
    .breadcrumb {
        padding: 5px 0;
        border-bottom: 1px solid #e9e9e9;
        background-color: #fafafa;
    }
</style>
@endsection
