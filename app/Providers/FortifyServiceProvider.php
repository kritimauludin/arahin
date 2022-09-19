<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\Ads;
use App\Models\Post;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for("login", function () {
            Limit::perMinute(5);
        });
        Fortify::loginView(function () {
            return view('auth.login', [
                "mostReader" => Post::where('status', 1)->with(['author', 'category'])->take(5)->orderBy('reader', 'desc')->get(),
                "runningNews" => Post::where('status', 1)->with(['author', 'category'])->latest()->take(5)->get(),
                "bannerTop" => Ads::where('status', 1)->where('categoryads_id', 1)->get(),
                "footHome263" => Ads::where('status', 1)->where('categoryads_id', 5)->get()
            ]);
        });
        Fortify::registerView(function () {
            return view('auth.register', [
                "mostReader" => Post::where('status', 1)->with(['author', 'category'])->take(5)->orderBy('reader', 'desc')->get(),
                "runningNews" => Post::where('status', 1)->with(['author', 'category'])->latest()->take(5)->get(),
                "bannerTop" => Ads::where('status', 1)->where('categoryads_id', 1)->get(),
                "footHome263" => Ads::where('status', 1)->where('categoryads_id', 5)->get()
            ]);
        });
        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.passwords.email', [
                "mostReader" => Post::where('status', 1)->with(['author', 'category'])->take(5)->orderBy('reader', 'desc')->get(),
                "runningNews" => Post::where('status', 1)->with(['author', 'category'])->latest()->take(5)->get(),
                "bannerTop" => Ads::where('status', 1)->where('categoryads_id', 1)->get(),
                "footHome263" => Ads::where('status', 1)->where('categoryads_id', 5)->get()
            ]);
        });
        Fortify::resetPasswordView(function ($request) {
            return view('auth.passwords.reset', [
                'request' => $request,
                "mostReader" => Post::where('status', 1)->with(['author', 'category'])->take(5)->orderBy('reader', 'desc')->get(),
                "runningNews" => Post::where('status', 1)->with(['author', 'category'])->latest()->take(5)->get(),
                "bannerTop" => Ads::where('status', 1)->where('categoryads_id', 1)->get(),
                "footHome263" => Ads::where('status', 1)->where('categoryads_id', 5)->get()
            ]);
        });
        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('email', $request->username)->orWhere('username', $request->username)->first();

            if (
                $user &&
                Hash::check($request->password, $user->password)
            ) {
                return $user;
            }
        });
        Fortify::verifyEmailView(function () {
            return view('auth.verify', [
                "mostReader" => Post::where('status', 1)->with(['author', 'category'])->take(5)->orderBy('reader', 'desc')->get(),
                "runningNews" => Post::where('status', 1)->with(['author', 'category'])->latest()->take(5)->get(),
                "bannerTop" => Ads::where('status', 1)->where('categoryads_id', 1)->get(),
                "footHome263" => Ads::where('status', 1)->where('categoryads_id', 5)->get()
            ]);
        });
    }
}
