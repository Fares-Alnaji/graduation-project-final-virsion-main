@extends('front.parent')
@section('title', '| About')

@section('content')
    <link href="{{ asset('cms/stylee.css') }}" rel="stylesheet">
    <div class="hero-wrap hero-bread" style="background-image: url('cms/images/bg_6.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>About</span></p>
                    <h1 class="mb-0 bread">About Us</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row no-gutters ftco-services">
                <div class="col-lg-12 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services p-4 py-md-5">
                        <div class="icon d-flex justify-content-center align-items-center mb-4">
                            <img src="{{ asset('cms/images/989.png') }}" style="height: 100px ; width: 260px;"
                                alt="">
                        </div>
                        <div class="media-body">
                            <h3 class="heading text-primary">مشروع التخرج خاص بالكلية الجامعية للعلوم التطبيقية</h3>
                        </div>
                        <div class="media-body">
                            <h3 class="body">
                                مشروع التخرج الخاص بالكلية الجامعية للعلوم التطبيقية هو إنشاء متجر إلكتروني لبيع الملابس
                                والأحذية. يهدف المشروع إلى توفير بيئة تسوق مريحة وممتعة للمستخدمين عبر الإنترنت، حيث يمكنهم
                                استعراض وشراء مجموعة متنوعة من المنتجات بسهولة وراحة.</h3>
                            <h3 class="body">
                                تشمل ميزات المتجر الإلكتروني توفير صفحات فرعية لكل فئة من الملابس والأحذية، مع وصف مفصل لكل
                                منتج وصور عالية الجودة. يتم توفير أدوات بحث قوية تساعد المستخدمين على تحديد احتياجاتهم
                                والعثور بسرعة على المنتجات المطلوبة. كما يتم توفير نظام لإدارة عربات التسوق والدفع الآمن عبر
                                الإنترنت.</h3>
                            <h3 class="body">
                                يهدف هذا المشروع إلى تعزيز تجربة التسوق عبر الإنترنت وتسهيل عملية البيع والشراء للملابس
                                والأحذية. كما يوفر فرصة للطلاب لتطبيق المفاهيم والمهارات التي تعلموها خلال دراستهم في إنشاء
                                مشروع عملي وقابل للتطبيق في سوق التجارة الإلكترونية.
                            </h3>
                        </div><br>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section ftco-no-pb ftco-no-pt bg-light"><br>
        <div class="media-body">
            <h4 class="heading text-center text-primary">
                الطلاب المشاركين في عمل هذا المشروع</h4>
        </div>
        <br>
        <div class="container">
            <div class="row no-gutters ftco-services">
                <br>
                <div class="col-lg-4 text-center  align-self-stretch ftco-animate">

                    <div class="card">
                        <div class="header">
                            <div class="image">
                                <img class="image" src="{{ asset('cms/images/ghosain.png') }}">
                            </div>
                            <div>
                                <p class="name">Abdullah AlGhossain</p>
                            </div>
                        </div>
                        <p class="message">
                            A student at UCAS studying web design and development
                        </p>
                        <p class="message text-primary">
                            <i class="fa-solid fa-user-graduate"></i> -
                            a graduate
                        </p>
                    </div>
                    <br>
                </div>
                <div class="col-lg-4 text-center  align-self-stretch ftco-animate">
                    <div class="card">
                        <div class="header">
                            <div class="image">
                                <img class="image" src="{{ asset('cms/images/abod.jpg') }}">

                            </div>
                            <div>
                                <p class="name">Abdullah Marouf</p>
                            </div>
                        </div>
                        <p class="message">
                            A student at UCAS studying web design and development
                        </p>
                        <p class="message text-primary">
                            <i class="fa-solid fa-user-graduate"></i> -
                            a graduate
                        </p>
                    </div>
                    <br>
                </div>
                <div class="col-lg-4 text-center  align-self-stretch ftco-animate">
                    <div class="card">
                        <div class="header">
                            <div class="image">
                                <img class="image" src="{{ asset('cms/images/fares.png') }}">

                            </div>
                            <div>
                                <p class="name">Fares AlNaji</p>
                            </div>
                        </div>
                        <p class="message">
                            A student at UCAS studying web design and development
                        </p>
                        <p class="message text-primary">
                            <i class="fa-solid fa-user-graduate"></i> -
                            a graduate
                        </p>
                    </div>
                    <br>
                </div>
                <div class="col-lg-4 text-center  align-self-stretch ftco-animate">
                    <div class="card">
                        <div class="header">
                            <div class="image"></div>
                            <div>
                                <p class="name">Mohammed Moshtaha</p>
                            </div>
                        </div>
                        <p class="message">
                            A student at UCAS studying web design and development
                        </p>
                        <p class="message text-primary">
                            <i class="fa-solid fa-user-graduate"></i> -
                            a graduate
                        </p>
                    </div>
                    <br>
                </div>
                <div class="col-lg-4 text-center  align-self-stretch ftco-animate">
                    <div class="card">
                        <div class="header">
                            <div class="image">
                                <img class="image" src="{{ asset('cms/images/mah.png') }}">
                            </div>
                            <div>
                                <p class="name">Dev . Mahmoud Dohair</p>
                            </div>
                        </div>
                        <p class="message">
                            Works at UCAS
                            <br><br>
                        </p>
                        <p class="message text-primary">
                            <i class="fa-solid fa-crown"></i> -
                            Project supervisor
                        </p>
                    </div>
                    <br>
                </div>
                <br>
            </div>
        </div>
        <br><br><br>
    </section>
@endsection
