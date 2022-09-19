@extends('templates.userLayout')
@section('title', 'About Page - Arahin Media Kreasi')
@section('content')
<main>
    <div class="about-details section-padding30">
        <div class="container">
            <div class="row">
                <div class="offset-xl-1 col-lg-8">
                    <div class="about-details-cap mb-50">
                        <h4>Our Mission</h4>
                        <p>Misi kami adalah mengembalikan tradisi menulis dan membaca , dimana kami ingin membuat semua orang bisa mulai menulis buku, informasi atau hal penting lain yang sangat berguna.
                        </p>
                        <p>Kami juga ingin memastikan segala tugas, laporan bisa dibagikan dengan tujuan agar segala karya itu tidak hanya berakhir disebuah lemari ataupun tempat sampah. Dan kami memberi kesempatan kepada individu yang merasa memiliki kreatifitas untuk memulai menuangkannya melalui buku, dan postingan.</p>
                    </div>
                    <div class="about-details-cap mb-50">
                        <h4>Our Vision</h4>
                        <p>Visi kami menjadikan semua orang untuk menanamkan kembali kata-kata "Membaca adalah jendela dunia". Dan slogan utama kami, Semua bisa menulis, Semua bisa berbagi.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team Start -->
    <div class="team-area section-padding30">
        <div class="container">
            {{-- <div class="row">
                <div class="cl-xl-7 col-lg-8 col-md-10">
                    <!-- Section Tittle -->
                    <div class="section-tittles mb-70">
                        <span>Our Professional members </span>
                        <h2>Pendiri Arahin</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- single Tem -->
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-">
                    <div class="single-team mb-30">
                        <div class="team-img">
                            <img src="{{asset('storage')}}/img/web-arahin/team/kriti.jpg" class="rounded-circle" height="363px" width="290px" alt="">
                        </div>
                        <div class="team-caption">
                            <h3><a href="#">Kriti Mauludin</a></h3>
                            <span>Fullstack Web Developer</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-">
                    <div class="single-team mb-30">
                        <div class="team-img">
                            <img src="{{asset('storage')}}/img/web-arahin/team/ilham.jpg" class="rounded-circle" height="363px" width="290px" alt="">
                        </div>
                        <div class="team-caption">
                            <h3><a href="#">Ilham Adlani</a></h3>
                            <span>UI/UX Designer</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-">
                    <div class="single-team mb-30">
                        <div class="team-img">
                            <img src="{{asset('storage')}}/img/web-arahin/team/rafli.jpg" class="rounded-circle" height="363px" width="290px" alt="">
                        </div>
                        <div class="team-caption">
                            <h3><a href="#">M. Rafly Maulana</a></h3>
                            <span>Public Relation</span>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="row">
                <div class="col-lg-12">
                    <!-- Section Tittle -->
                    <div class="section-tittles mb-70">
                        <span>Our Family</span>
                        <h2>Keluarga Arahin</h2>
                            <div class="row d-flex justify-content-center">
                                @foreach ($users as $user)                
                                <div class="family-width ">
                                    @if($user->user_data->img_profile)
                                    <img src="{{asset('storage/'. $user->user_data->img_profile)}}" alt="Profile" class="rounded-circle" width="100">
                                    @else
                                    <img src="{{asset('storage'. '/img/user-profile/default.svg')}}" alt="Profile" class="rounded-circle" width="100">
                                    @endif
                                    <p>{{ $user->name }}</p>                                      
                                </div>
                                @endforeach
                            </div>                  
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->
    <!-- banner-last Start -->
    <div class="banner-area gray-bg pb-90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-10">
                    <div class="banner-one">
                        <img src="{{asset('template')}}/img/gallery/body_card3.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner-last End -->
</main>
@endsection
