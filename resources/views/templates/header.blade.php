<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cahaya Musik</title>

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet" />


    <!-- bootstrap -->


    <!-- featers icon -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- my style css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ time() }}" />
    <link rel="stylesheet" href="{{ asset('css/pricelist.css') }}?v={{ time() }}" />
    <link rel="stylesheet" href="{{ asset('css/scrol-main.css') }}?v={{ time() }}" />

    <!-- FullCalendar Styles & Scripts -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/locales-all.global.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Syne:wght@400..800&display=swap");
        @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Syne:wght@400..800&display=swap");

        body {
            font-family: "Poppins", sans-serif;
        }

        .cont {
            position: relative;
            overflow: hidden;
            width: 100%;
            height: 240vh;
            padding: 80px 70px;
        }

        .cont__inner {
            position: relative;
            height: 40%;
        }

        .cont__inner:hover .el__bg:after {
            opacity: 1;
        }

        .el {
            position: absolute;
            left: 0;
            top: 0;
            width: 25%;
            height: 100%;
            background: #252525;
            transition: transform 0.6s 0.7s, width 0.7s, opacity 0.6s 0.7s,
                z-index 0s 1.3s;
            will-change: transform, width, opacity;
        }

        .el:not(.s--active) {
            cursor: pointer;
        }

        .el__overflow {
            overflow: hidden;
            position: relative;
            height: 100%;
        }

        .el__inner {
            overflow: hidden;
            position: relative;
            height: 100%;
            transition: transform 1s;
        }

        .cont.s--inactive .el__inner {
            transform: translate3d(0, 100%, 0);
        }

        .el__bg {
            position: relative;
            width: calc(100vw - 100px);
            height: 100%;
            transition: transform 0.6s 0.7s;
            will-change: transform;
        }

        .el__bg:before {
            content: "";
            position: absolute;
            left: 0;
            top: -1%;
            width: 100%;
            height: 110%;
            background-size: cover;
            background-position: center center;
            transition: transform 1s;
            transform: translate3d(0, 0, 0) scale(1);
        }

        .cont.s--inactive .el__bg:before {
            transform: translate3d(0, -100%, 0) scale(1.2);
        }

        .el.s--active .el__bg:before {
            transition: transform 0.8s;
        }

        .el__bg:after {
            content: "";
            z-index: 1;
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.3);
            opacity: 0;
            transition: opacity 0.5s;
        }

        .cont.s--el-active .el__bg:after {
            transition: opacity 0.5s 1.4s;
            opacity: 1 !important;
        }

        .el__preview-cont {
            z-index: 2;
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            transition: all 0.3s 1.2s;
        }

        .cont.s--inactive .el__preview-cont {
            opacity: 0;
            transform: translateY(10px);
        }

        .cont.s--el-active .el__preview-cont {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.5s;
        }

        .el__heading {
            color: #fff;
            background: rgba(58, 58, 58, 0.5);
            /* Latar belakang semi-transparan */
            text-transform: uppercase;
            font-size: 18px;
            font-family: "Syne", sans-serif;
        }

        .el__content {
            z-index: -1;
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            padding: 30px;
            opacity: 0;
            pointer-events: none;
            transition: all 0.1s;
        }

        .el.s--active .el__content {
            z-index: 2;
            opacity: 1;
            pointer-events: auto;
            transition: all 0.5s 1.4s;
        }

        /* Wrapper teks dengan latar belakang semi-transparan */
        .el__text-wrapper {
            background: rgba(0, 0, 0, 0.5);
            /* Latar belakang semi-transparan */
            padding: 10px 20px;
            margin-top: 0;
            display: inline-block;
            border-radius: 5px;
        }

        /* Styling untuk teks */
        .el__text {
            text-transform: uppercase;
            font-size: 50px;
            color: white;
            font-family: "Syne", sans-serif !important;
            font-weight: 800;
            padding-bottom: 20px;

            /* Tambahkan efek shadow agar teks tetap jelas di background terang */
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.8), 4px 4px 10px rgba(0, 0, 0, 0.5);

            /* Tambahkan efek blur pada background teks */
            backdrop-filter: blur(5px);
        }

        .pricelist {
            color: #fff;
            font-size: 20px;
            font-weight: 500;
            padding: 10px;
        }

        .pricelist h2 {
            width: 30;
            padding-top: 25px;
            font-size: 3em;
            text-decoration: none;
            text-transform: uppercase;
            line-height: 1;
            color: transparent;
            -webkit-text-stroke: 1.5px #455eb5;
            text-shadow: 0 0 0 #fff;
            transition: all 250ms;
        }

        .pricelist h2:hover {
            text-shadow: 4px 4px 0 #5643cc;
            transform: translate(-2px, -2px);
        }

        .pricelist p {
            font-size: 20px;
            font-weight: 300;
        }

        .btn-price {
            background-image: linear-gradient(92.88deg,
                    #455eb5 9.16%,
                    #5643cc 43.89%,
                    #673fd7 64.72%);
            border-radius: 8px;
            border-style: none;
            box-sizing: border-box;
            color: #ffffff;
            cursor: pointer;
            flex-shrink: 0;
            font-family: "Inter UI", "SF Pro Display", -apple-system, BlinkMacSystemFont,
                "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans",
                "Helvetica Neue", sans-serif;
            font-size: 16px;
            font-weight: 500;
            height: 4rem;
            padding: 0 1.6rem;
            text-align: center;
            text-shadow: rgba(0, 0, 0, 0.25) 0 3px 8px;
            transition: all 0.5s;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
        }

        .btn-price:hover {
            box-shadow: rgba(80, 63, 205, 0.5) 0 1px 30px;
            transition-duration: 0.1s;
        }

        .el__close-btn {
            z-index: -1;
            position: absolute;
            right: 10px;
            top: 25px;
            width: 40px;
            height: 40px;
            opacity: 0;
            pointer-events: none;
            transition: all 0s 0.45s;
            cursor: pointer;
        }

        .el.s--active .el__close-btn {
            z-index: 5;
            opacity: 1;
            pointer-events: auto;
            transition: all 0s 1.4s;
        }

        .el__close-btn:before,
        .el__close-btn:after {
            content: "";
            position: absolute;
            left: 0;
            top: 50%;
            width: 80%;
            height: 8px;
            margin-top: -4px;
            background: #fff;
            opacity: 0;
            transition: opacity 0s;
        }

        .el.s--active .el__close-btn:before,
        .el.s--active .el__close-btn:after {
            opacity: 1;
        }

        .el__close-btn:before {
            transform: rotate(45deg) translateX(100%);
        }

        .el.s--active .el__close-btn:before {
            transition: all 0.3s 1.4s cubic-bezier(0.72, 0.09, 0.32, 1.57);
            transform: rotate(45deg) translateX(0);
        }

        .el__close-btn:after {
            transform: rotate(-45deg) translateX(100%);
        }

        .el.s--active .el__close-btn:after {
            transition: all 0.3s 1.55s cubic-bezier(0.72, 0.09, 0.32, 1.57);
            transform: rotate(-45deg) translateX(0);
        }

        .el__index {
            overflow: hidden;
            position: absolute;
            left: 0;
            bottom: -80px;
            width: 100%;
            height: 100%;
            min-height: 250px;
            text-align: center;
            font-size: 20vw;
            line-height: 0.85;
            font-weight: bold;
            transition: transform 0.5s, opacity 0.3s 1.4s;
            transform: translate3d(0, 1vw, 0);
        }

        .el:hover .el__index {
            transform: translate3d(0, 0, 0);
        }

        .cont.s--el-active .el__index {
            transition: transform 0.5s, opacity 0.3s;
            opacity: 0;
        }

        .el__index-back,
        .el__index-front {
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
        }

        .el__index-back {
            color: #2f3840;
            opacity: 0;
            transition: opacity 0.25s 0.25s;
        }

        .el:hover .el__index-back {
            transition: opacity 0.25s;
            opacity: 1;
        }

        .el__index-overlay {
            overflow: hidden;
            position: relative;
            transform: translate3d(0, 100%, 0);
            transition: transform 0.5s 0.1s;
            color: transparent;
        }

        .el__index-overlay:before {
            content: attr(data-index);
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            color: #fff;
            transform: translate3d(0, -100%, 0);
            transition: transform 0.5s 0.1s;
        }

        .el:hover .el__index-overlay {
            transform: translate3d(0, 0, 0);
        }

        .el:hover .el__index-overlay:before {
            transform: translate3d(0, 0, 0);
        }

        .el:nth-child(1) {
            transform: translate3d(0%, 0, 0);
            transform-origin: 50% 50%;
        }

        .cont.s--el-active .el:nth-child(1):not(.s--active) {
            transform: scale(0.5) translate3d(0%, 0, 0);
            opacity: 0;
            transition: transform 0.95s, opacity 0.95s;
        }

        .el:nth-child(1) .el__inner {
            transition-delay: 0s;
        }

        .el:nth-child(1) .el__bg {
            transform: translate3d(0%, 0, 0);
        }

        .el:nth-child(1) .el__bg:before {
            transition-delay: 0s;
            background-image: url({{ asset('/img/product/PriceList.png') }});
        }

        .el:nth-child(2) {
            transform: translate3d(105.2083333333%, 0, 0);
            transform-origin: 155.2083333333% 50%;
        }

        .cont.s--el-active .el:nth-child(2):not(.s--active) {
            transform: scale(0.5) translate3d(105.2083333333%, 0, 0);
            opacity: 0;
            transition: transform 0.95s, opacity 0.95s;
        }

        .el:nth-child(2) .el__inner {
            transition-delay: 0.1s;
        }

        .el:nth-child(2) .el__bg {
            transform: translate3d(-19.2%, 0, 0);
        }

        .el:nth-child(2) .el__bg:before {
            transition-delay: 0.1s;
            background-image: url({{ asset('/img/product/PriceList3.png') }});
        }

        .el:nth-child(3) {
            transform: translate3d(210.4166666667%, 0, 0);
            transform-origin: 260.4166666667% 50%;
        }

        .cont.s--el-active .el:nth-child(3):not(.s--active) {
            transform: scale(0.5) translate3d(210.4166666667%, 0, 0);
            opacity: 0;
            transition: transform 0.95s, opacity 0.95s;
        }

        .el:nth-child(3) .el__inner {
            transition-delay: 0.2s;
        }

        .el:nth-child(3) .el__bg {
            transform: translate3d(-38.4%, 0, 0);
        }

        .el:nth-child(3) .el__bg:before {
            transition-delay: 0.2s;
            background-image: url({{ asset('/img/product/organtunggal1.png') }});
        }

        .el:nth-child(4) {
            transform: translate3d(315.625%, 0, 0);
            transform-origin: 365.625% 50%;
        }

        .cont.s--el-active .el:nth-child(4):not(.s--active) {
            transform: scale(0.5) translate3d(315.625%, 0, 0);
            opacity: 0;
            transition: transform 0.95s, opacity 0.95s;
        }

        .el:nth-child(4) .el__inner {
            transition-delay: 0.3s;
        }

        .el:nth-child(4) .el__bg {
            transform: translate3d(-57.6%, 0, 0);
        }

        .el:nth-child(4) .el__bg:before {
            transition-delay: 0.3s;
            background-image: url({{ asset('/img/product/PriceList2.jpg') }});
        }

        .el:nth-child(5) {
            margin-top: 9rem;
            transform: translate3d(0%, 100%, 0);
            transform-origin: 50% 50%;
        }

        .cont.s--el-active .el:nth-child(5):not(.s--active) {
            transform: scale(0.5) translate3d(0%, 0, 0);
            opacity: 0;
            transition: transform 0.95s, opacity 0.95s;
        }

        .el:nth-child(5) .el__inner {
            transition-delay: 0s;
        }

        .el:nth-child(5) .el__bg {
            transform: translate3d(0%, 0, 0);
        }

        .el:nth-child(5) .el__bg:before {
            transition-delay: 0s;
            background-image: url({{ asset('/img/product/PriceList_wd1.jpg') }});
        }

        .el:nth-child(6) {
            margin-top: 9rem;
            transform: translate3d(105.2083333333%, 100%, 0);
            transform-origin: 155.2083333333% 50%;
        }

        .cont.s--el-active .el:nth-child(6):not(.s--active) {
            transform: scale(0.5) translate3d(105.2083333333%, 0, 0);
            opacity: 0;
            transition: transform 0.95s, opacity 0.95s;
        }

        .el:nth-child(6) .el__inner {
            transition-delay: 0.1s;
        }

        .el:nth-child(6) .el__bg {
            transform: translate3d(-19.2%, 0, 0);
        }

        .el:nth-child(6) .el__bg:before {
            transition-delay: 0.1s;
            background-image: url({{ asset('/img/product/PriceList_wd2.jpg') }});
        }

        .el:nth-child(7) {
            margin-top: 9rem;
            transform: translate3d(210.4166666667%, 100%, 0);
            transform-origin: 260.4166666667% 50%;
        }

        .cont.s--el-active .el:nth-child(7):not(.s--active) {
            transform: scale(0.5) translate3d(210.4166666667%, 0, 0);
            opacity: 0;
            transition: transform 0.95s, opacity 0.95s;
        }

        .el:nth-child(7) .el__inner {
            transition-delay: 0.2s;
        }

        .el:nth-child(7) .el__bg {
            transform: translate3d(-38.4%, 0, 0);
        }

        .el:nth-child(7) .el__bg:before {
            transition-delay: 0.2s;
            background-image: url({{ asset('/img/product/PriceList_wd3.jpg') }});
        }

        .el:hover .el__bg:after {
            opacity: 0;
        }

        .el.s--active {
            z-index: 1;
            width: 100%;
            transform: translate3d(0, 0, 0);
            transition: transform 0.6s, width 0.7s 0.7s, z-index 0s;
        }

        .el.s--active .el__bg {
            transform: translate3d(0, 0, 0);
            transition: transform 0.6s;
        }

        .el.s--active .el__bg:before {
            transition-delay: 0.6s;
            transform: scale(1.1);
        }

        .icon-link {
            position: absolute;
            left: 5px;
            bottom: 5px;
            width: 32px;
        }

        .icon-link img {
            width: 100%;
            vertical-align: top;
        }

        .icon-link--twitter {
            left: auto;
            right: 5px;
        }

        /* === MODAL STYLING === */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            /* Ditinggikan agar tidak tertutup elemen lain */
        }

        .modal-content {
            background: white;
            padding: 20px 30px;
            border-radius: 10px;
            position: relative;
            text-align: center;
            width: 80%;
            max-width: 1000px;
            height: 600px;
            overflow-y: auto;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .modal-content span,
        h2 {
            color: #252525;
        }

        .modal-content .fc-icon {
            color: #fff;
        }

        .close-btn {
            position: absolute;
            top: 5px;
            right: 15px;
            font-size: 25px;
            cursor: pointer;
        }

        /* Kalender container */
        #calendar {
            width: 100%;
            height: 100%;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            font-size: 14px;
            color: #333;
        }

        /* === FULLCALENDAR CUSTOM STYLE === */

        /* Header hari (Senin, Selasa, dst) */
        .fc .fc-col-header-cell-cushion {
            padding: 10px 0;
            font-weight: 600;
            background-color: #f7f7f7;
            color: #444;
            border-bottom: 1px solid #ddd;
            text-transform: capitalize;
            font-size: 13px;
        }

        /* Garis grid dan frame */
        .fc .fc-scrollgrid {
            border: none;
        }

        .fc .fc-daygrid-day-top {
            color: red;
        }

        .fc .fc-scrollgrid-section,
        .fc .fc-daygrid-day-frame {
            border: 1px solid #eee;
        }

        /* Nomor tanggal di pojok kanan atas tiap kotak */
        .fc .fc-daygrid-day-number {
            padding: 4px;
            font-size: 13px;
            color: #ffffff;
            font-weight: 500;
            text-align: right;
        }

        /* Event (acara yang dibooking) */
        .fc-event {
            border: none;
            border-radius: 6px;
            padding: 5px 10px;
            font-size: 12px;
            color: white;
            transition: background-color 0.3s ease;
        }

        .fc-event:hover {
            filter: brightness(0.9);
        }

        .modal-content a {
            width: 100%;
            align-items: center;
            justify-content: center;
            text-align: center;
            margin-top: 0;
            padding: 2rem 1.6rem;
        }

        section h2 {
            color: #ffffff;
        }

        /* Tombol navigasi dan tampilan */
        .fc .fc-button {
            background-color: #6c757d;
            border: none;
            border-radius: 6px;
            padding: 6px 12px;
            font-size: 13px;
            color: white;
        }

        .fc .fc-button:hover {
            background-color: #5a6268;
        }

        .fc .fc-button:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        /* button kalender */
        .fc-toolbar-chunk {
            padding: 12px;
        }

        /* Tombol utama seperti "Hari Ini" */
        .fc .fc-button-primary {
            background-color: #000000;
        }

        .fc .fc-button-primary:hover {
            background-color: #010101;
        }

        /* Media query untuk tablet */
        @media (max-width: 1024px) {
            .cont {
                padding: 60px 50px;
            }

            .el {
                width: 25%;
            }

            .el__heading {
                font-size: 16px;
            }

            .el__text {
                font-size: 28px;
            }
        }

        /* Media query untuk handphone */
        @media (max-width: 768px) {
            .cont {
                padding: 20px 30px;
                padding-left: -10px;
            }

            .el {
                width: 25%;
                height: 30vh;
            }

            .el__content {
                transform: translateY(-10px);
            }

            .el__heading {
                font-size: 14px;
                text-align: center;
            }

            .el__text {
                font-size: 14px;
                padding-bottom: 5px;
            }

            .pricelist li {
                font-size: 8px;
                font-weight: 400;
            }

            .pricelist h2 {
                font-size: 0.8em;
            }

            .pricelist p {
                font-size: 5px;
            }

            .btn-price {
                border-radius: 4px;
                font-size: 10px;
                font-weight: 500;
                height: 2rem;
                padding: 0 1.6rem;
            }

            .el__close-btn {
                width: 30px;
                height: 30px;
                top: 10px;
                right: 10px;
            }

            .el__close-btn:before,
            .el__close-btn:after {
                height: 5px;
                margin-top: 30px;
            }

            .modal-content {
                width: 95%;
                height: 90%;
                padding: 15px 20px;
            }
        }

        @media (max-width: 768px) {
            .container {
                padding-top: 80px;
                /* Sesuaikan dengan tinggi navbar */
            }

            h2 {
                font-size: 1.3rem;
            }

            .table-responsive {
                overflow-x: auto;
            }

            .table th,
            .table td {
                font-size: 0.95rem;
                padding: 8px;
            }
        }
    </style>

</head>

<body>
