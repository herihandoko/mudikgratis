@php
    $page_title = 'Admin | Seat Bus';
@endphp
@extends('admin.layouts.master')
@section('content')
    {{-- Main Content --}}
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Seat Bus</h1>
            </div>
            <a class="btn btn-primary mb-4" href="{{ URL::previous() }}" role="button"><i class="fas fa-arrow-circle-left"></i>
                {{ trans('admin.Back') }}</a>
            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <div class="plane">
                            <div class="exit exit--front fuselage">
                            </div>
                            <ol class="cabin fuselage">
                                @for ($row = 1; $row <= 10; $row++)
                                    <li class="row row--{{ $row }}">
                                        <ol class="seats" type="A">
                                            <li class="seat">
                                                <input type="checkbox" id="{{ $row }}A" value="{{ $row }}A" @if(isset($kursi[$row.'A'])) disabled @endif />
                                                <label for="{{ $row }}A" style="color: #FFFFFF !important;">{{ $row }}A</label>
                                            </li>
                                            <li class="seat">
                                                <input type="checkbox" id="{{ $row }}B" value="{{ $row }}B" @if(isset($kursi[$row.'B'])) disabled @endif/>
                                                <label for="{{ $row }}B" style="color: #FFFFFF !important;">{{ $row }}B</label>
                                            </li>
                                            <li class="" style="width:80px;"></li>
                                            <li class="seat">
                                                <input type="checkbox" id="{{ $row }}C" value="{{ $row }}C" @if(isset($kursi[$row.'C'])) disabled @endif/>
                                                <label for="{{ $row }}C" style="color: #FFFFFF !important;">{{ $row }}C</label>
                                            </li>
                                            <li class="seat">
                                                <input type="checkbox" id="{{ $row }}D" value="{{ $row }}D" @if(isset($kursi[$row.'D'])) disabled @endif/>
                                                <label for="{{ $row }}D" style="color: #FFFFFF !important;">{{ $row }}D</label>
                                            </li>
                                        </ol>
                                    </li>
                                @endfor
                                <li class="row row--11">
                                    <ol class="seats" type="A">
                                        <li class="seat">
                                            <input type="checkbox" id="11A" value="11A" @if(isset($kursi['11A'])) disabled @endif/>
                                            <label for="11A" style="color: #FFFFFF !important;">11A</label>
                                        </li>
                                        <li class="seat">
                                            <input type="checkbox" id="11B" value="11B" @if(isset($kursi['11B'])) disabled @endif/>
                                            <label for="11B" style="color: #FFFFFF !important;">11B</label>
                                        </li>
                                        <li class="seat">
                                            <input type="checkbox" id="11C" value="11C" @if(isset($kursi['11C'])) disabled @endif/>
                                            <label for="11C" style="color: #FFFFFF !important;">11C</label>
                                        </li>
                                        <li class="seat">
                                            <input type="checkbox" id="11D" value="11D" @if(isset($kursi['11D'])) disabled @endif/>
                                            <label for="11D" style="color: #FFFFFF !important;">11D</label>
                                        </li>
                                        <li class="seat">
                                            <input type="checkbox" id="11E" value="11E" @if(isset($kursi['11E'])) disabled @endif/>
                                            <label for="11E" style="color: #FFFFFF !important;">11E</label>
                                        </li>
                                    </ol>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('style')
    <style>
        *,
        *:before,
        *:after {
            box-sizing: border-box;
        }

        html {
            font-size: 16px;
        }

        .plane {
            margin: 20px auto;
            max-width: 300px;
        }

        .cockpit {
            height: 250px;
            position: relative;
            overflow: hidden;
            text-align: center;
            border-bottom: 5px solid #d8d8d8;

            &:before {
                content: "";
                display: block;
                position: absolute;
                top: 0;
                left: 0;
                height: 500px;
                width: 100%;
                border-radius: 50%;
                border-right: 5px solid #d8d8d8;
                border-left: 5px solid #d8d8d8;
            }

            h1 {
                width: 60%;
                margin: 100px auto 35px auto;
            }
        }

        .exit {
            position: relative;
            height: 50px;

            &:before,
            &:after {
                content: "DEPAN";
                font-size: 14px;
                line-height: 18px;
                padding: 0px 2px;
                font-family: "Arial Narrow", Arial, sans-serif;
                display: block;
                position: absolute;
                background: green;
                color: white;
                top: 50%;
                transform: translate(0, -50%);
            }

            &:before {
                left: 0;
            }

            &:after {
                right: 0;
            }
        }

        .fuselage {
            /* border-right: 5px solid #d8d8d8;
                    border-left: 5px solid #d8d8d8; */
        }

        ol {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .row {}

        .seats {
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            justify-content: flex-start;
        }

        .seat {
            display: flex;
            flex: 0 0 14.28571428571429%;
            padding: 5px;
            position: relative;

            &:nth-child(2) {
                /* margin-right: 14.28571428571429%; */
            }

            input[type=checkbox] {
                position: absolute;
                opacity: 0;
            }

            input[type=checkbox]:checked {
                +label {
                    background: #bada55;
                    -webkit-animation-name: rubberBand;
                    animation-name: rubberBand;
                    animation-duration: 300ms;
                    animation-fill-mode: both;
                }
            }

            input[type=checkbox]:disabled {
                +label {
                    background: #dddddd;
                    text-indent: -9999px;
                    overflow: hidden;

                    &:after {
                        content: "X";
                        text-indent: 0;
                        position: absolute;
                        top: 4px;
                        left: 50%;
                        transform: translate(-50%, 0%);
                    }

                    &:hover {
                        box-shadow: none;
                        cursor: not-allowed;
                    }
                }
            }

            label {
                display: block;
                position: relative;
                width: 70px;
                font-size: 12px;
                /* width: 100%; */
                text-align: center;
                /* font-size: 14px; */
                font-weight: bold;
                line-height: 1.5rem;
                padding: 4px 0;
                background: #F42536;
                border-radius: 5px;
                animation-duration: 300ms;
                animation-fill-mode: both;
                padding: 20px;

                &:before {
                    content: "";
                    position: absolute;
                    width: 75%;
                    height: 75%;
                    top: 1px;
                    left: 50%;
                    transform: translate(-50%, 0%);
                    background: rgba(255, 255, 255, .4);
                    border-radius: 3px;
                }

                &:hover {
                    cursor: pointer;
                    box-shadow: 0 0 0px 2px #5C6AFF;
                }

            }
        }

        @-webkit-keyframes rubberBand {
            0% {
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1);
            }

            30% {
                -webkit-transform: scale3d(1.25, 0.75, 1);
                transform: scale3d(1.25, 0.75, 1);
            }

            40% {
                -webkit-transform: scale3d(0.75, 1.25, 1);
                transform: scale3d(0.75, 1.25, 1);
            }

            50% {
                -webkit-transform: scale3d(1.15, 0.85, 1);
                transform: scale3d(1.15, 0.85, 1);
            }

            65% {
                -webkit-transform: scale3d(.95, 1.05, 1);
                transform: scale3d(.95, 1.05, 1);
            }

            75% {
                -webkit-transform: scale3d(1.05, .95, 1);
                transform: scale3d(1.05, .95, 1);
            }

            100% {
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1);
            }
        }

        @keyframes rubberBand {
            0% {
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1);
            }

            30% {
                -webkit-transform: scale3d(1.25, 0.75, 1);
                transform: scale3d(1.25, 0.75, 1);
            }

            40% {
                -webkit-transform: scale3d(0.75, 1.25, 1);
                transform: scale3d(0.75, 1.25, 1);
            }

            50% {
                -webkit-transform: scale3d(1.15, 0.85, 1);
                transform: scale3d(1.15, 0.85, 1);
            }

            65% {
                -webkit-transform: scale3d(.95, 1.05, 1);
                transform: scale3d(.95, 1.05, 1);
            }

            75% {
                -webkit-transform: scale3d(1.05, .95, 1);
                transform: scale3d(1.05, .95, 1);
            }

            100% {
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1);
            }
        }

        .rubberBand {
            -webkit-animation-name: rubberBand;
            animation-name: rubberBand;
        }
    </style>
@endpush
@push('script')
    <script>
        $(document).on('change', 'input[type=checkbox]', function(e) {
            var seatNumber = $(this).val();
            $.ajax({
                type: 'POST',
                url: "<?= route('admin.mudik-verifikasi.seat.store') ?>",
                data: {
                    seat: seatNumber,
                    idbus: "<?= isset($request->idbus) ? $request->idbus : 0 ?>",
                    idpeserta: "<?= isset($request->idpeserta) ? $request->idpeserta : 0 ?>"
                },
                success: function(data) {
                    if (data.status == 'success') {
                        window.location.href = data.url;
                        toastr.success(data.message);
                    } else {
                        toastr.error(data.message);
                        location.reload();
                    }
                }
            });
        });
    </script>
@endpush
