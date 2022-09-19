@extends('templates.adminLayout')

@section('title', '[Blog Post - Home]')

@section('content')
<style>
    .form-control-file {
        display: none;
    }
</style>
<div class="container">
    <div class="main-a">
        <form action="/user/{{$user->username}}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <input type="hidden" name="oldImage" value="{{$user->user_data->img_profile}}">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                @if($user->user_data->img_profile)
                                <img src="{{asset('storage/'. $user->user_data->img_profile)}}" class="img-preview rounded-circle p-1 bg-primary d-block" width="110">
                                @else
                                <img class="img-preview rounded-circle p-1 bg-primary" width="110">
                                @endif
                                <a href="#" onclick="document.querySelector('#img_profile').style.display = 'block';"><i class="fas fa-edit"></i></a>
                                <input type="file" class="form-control-file @error('img_profile') is-invalid @enderror" id="img_profile" name="img_profile" onchange="previewImage()">
                                <div class="mt-3">
                                    <h4>{{$user->name}}</h4>
                                    <p class="text-secondary mb-1">{{$user->role->name}}</p>
                                    <p class="text-muted font-size-sm">{{$user->user_data->address}}</p>
                                </div>
                            </div>
                            <hr class="my-4 ">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="2" y1="12" x2="22" y2="12"></line>
                                            <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                        </svg>Website</h6>
                                    <span class="text-secondary"> {{$user->user_data->website}}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline">
                                            <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                                        </svg>Github</h6>
                                    <span class="text-secondary"> {{$user->user_data->github}}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info">
                                            <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                                        </svg>Twitter</h6>
                                    <span class="text-secondary">{{$user->user_data->twitter}}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger">
                                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                        </svg>Instagram</h6>
                                    <span class="text-secondary"> {{$user->user_data->instagram}}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary">
                                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                        </svg>Facebook</h6>
                                    <span class="text-secondary"> {{$user->user_data->facebook}}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name', $user->name)}}" required autofocus>
                                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">User Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{old('username', $user->username)}}" required>
                                    @error('username')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email', $user->email)}}" required readonly>
                                    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    @error('address')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    <textarea name="address" class="form-control" placeholder="Address" id="address" rows="3">{{old('address', $user->user_data->address)}}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">About Yourself</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    @error('about_yourself')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    <textarea name="about_yourself" class="form-control" placeholder="About Yourself" id="about_yourself" rows="3">{{old('about_yourself', $user->user_data->about_yourself)}}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone Number</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="number" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" placeholder="Phone Number" value="{{old('phone_number', $user->user_data->phone_number)}}" required>
                                    @error('phone_number')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Social Media</h6>
                                </div>
                                <div class="col-sm-9">
                                    <div class="row mb-3">
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control @error('website') is-invalid @enderror" id="website" name="website" placeholder="Website" value="{{old('website', $user->user_data->website)}}">
                                            @error('website')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control @error('hobby') is-invalid @enderror" id="hobby" name="hobby" placeholder="Hobby" value="{{old('hobby', $user->user_data->hobby)}}">
                                            @error('hobby')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-6 text-secondary">
                                            <input type="text" class="form-control @error('github') is-invalid @enderror" id="github" name="github" placeholder="github" value="{{old('github', $user->user_data->github)}}">
                                            @error('github')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="col-sm-6 text-secondary">
                                            <input type="text" class="form-control @error('twitter') is-invalid @enderror" id="twitter" name="twitter" placeholder="twitter" value="{{old('twitter', $user->user_data->twitter)}}">
                                            @error('twitter')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-6 text-secondary">
                                            <input type="text" class="form-control @error('instagram') is-invalid @enderror" id="instagram" name="instagram" placeholder="instagram" value="{{old('instagram', $user->user_data->instagram)}}">
                                            @error('instagram')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="col-sm-6 text-secondary">
                                            <input type="text" class="form-control @error('facebook') is-invalid @enderror" id="facebook" name="facebook" placeholder="facebook" value="{{old('facebook', $user->user_data->facebook)}}">
                                            @error('facebook')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <a href="/user" class="btn btn-danger px-4">Cancle</a>
                                    <input type="submit" class="btn btn-primary px-4" value="Save Changes">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function previewImage() {
        const img_profile = document.querySelector('#img_profile');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = "block";

        const oFReader = new FileReader();
        oFReader.readAsDataURL(img_profile.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>

@endsection