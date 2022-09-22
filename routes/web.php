<?php

use App\Http\Controllers\HomeController;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Laracasts\Flash\Flash;

// Route::get('/', [HomeController::class, 'index'])->name("index");

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name("index");
Route::get('/recent/tenders', [HomeController::class, 'tenders']);
Route::get('/recent/jobs', [HomeController::class, 'jobs']);
Route::get('/recent/internships', [HomeController::class, 'internships']);

Route::group(["middleware" => "auth"], function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'admin'], function () {

        Route::get('/', [App\Http\Controllers\Admin\LayoutAdminController::class, 'index'])->name('admin.dashboard');

        Route::resource('jobs', App\Http\Controllers\Admin\JobController::class, ["as" => 'admin']);
        Route::resource('users', App\Http\Controllers\Admin\UserController::class, ["as" => 'admin']);

        Route::post('users/filter', [App\Http\Controllers\Admin\UserController::class, 'filter'])->name("admin.users.filter");
        Route::get('/admin/users/clear-filter', [App\Http\Controllers\Admin\UserController::class, 'clear_filter'])->name("admin.users.clearFilter");

        Route::post('jobs/{job}/filter', [App\Http\Controllers\Admin\JobController::class, 'filter'])->name("admin.jobs.filter");
        Route::get('/admin/jobs/{job}/clear-filter', [App\Http\Controllers\Admin\JobController::class, 'clear_filter'])->name("admin.jobs.clearFilter");

        Route::post('/jobs/{job}/approve/{user}', [App\Http\Controllers\Admin\JobController::class, 'approveMember'])->name("admin.jobs.approveMember");
        Route::post('/jobs/{job}/remove/{user}', [App\Http\Controllers\Admin\JobController::class, 'removeMember'])->name("admin.jobs.removeMember");

        Route::group(['prefix' => 'filters'], function () {

            Route::resource('nationalities', App\Http\Controllers\Admin\Filters\NationalityController::class, ["as" => 'admin.filters']);

            Route::resource('proffessions', App\Http\Controllers\Admin\Filters\ProffessionController::class, ["as" => 'admin.filters']);

            Route::resource('experiences', App\Http\Controllers\Admin\Filters\ExperienceController::class, ["as" => 'admin.filters']);

            Route::resource('education', App\Http\Controllers\Admin\Filters\EducationController::class, ["as" => 'admin.filters']);

            Route::resource('salaries', App\Http\Controllers\Admin\Filters\SalaryController::class, ["as" => 'admin.filters']);

            Route::resource('genders', App\Http\Controllers\Admin\Filters\GenderController::class, ["as" => 'admin.filters']);

            Route::resource('languages', App\Http\Controllers\Admin\Filters\LanguageController::class, ["as" => 'admin.filters']);
        });
    });

    Route::group(['prefix' => 'candidate'], function () {

        Route::get('/', [App\Http\Controllers\Candidate\LayoutCandidateController::class, 'index'])->name('candidate.dashboard');
        Route::get('/edit', [App\Http\Controllers\Candidate\LayoutCandidateController::class, 'edit'])->name('candidate.edit');
        Route::post('/edit', [App\Http\Controllers\Candidate\LayoutCandidateController::class, 'update'])->name('candidate.edit');
    });




    Route::group(['prefix' => 'shared'], function () {
        Route::resource('tenders', App\Http\Controllers\Shared\TenderController::class, ["as" => 'shared']);
        Route::get('tenders/{tender}/publish', [App\Http\Controllers\Shared\TenderController::class, "publish"])->name('shared.tenders.publish');

        Route::resource('companies', App\Http\Controllers\Shared\CompanyController::class, ["as" => 'shared']);

        Route::resource('internships', App\Http\Controllers\Shared\InternshipController::class, ["as" => 'shared']);

        Route::post('/internships/{internship}/approve/{user}', [App\Http\Controllers\Shared\InternshipController::class, 'approveMember'])->name("shared.internships.approveMember");
        Route::post('/internships/{internship}/remove/{user}', [App\Http\Controllers\Shared\InternshipController::class, 'removeMember'])->name("shared.internships.removeMember");

        Route::post('internships/{internship}/filter', [App\Http\Controllers\Shared\InternshipController::class, 'filter'])->name("shared.internships.filter");
        Route::get('/shared/internships/{internship}/clear-filter', [App\Http\Controllers\Shared\InternshipController::class, 'clear_filter'])->name("shared.internships.clearFilter");
    });
});


Route::get("/tenders/{tender}", [App\Http\Controllers\HomeController::class, 'showTenders']);
Route::get("/tenders/{tender}/apply", [App\Http\Controllers\HomeController::class, 'applyTender'])->name("apply.tender");

Route::get("/partners", [App\Http\Controllers\HomeController::class, 'showPartners'])->name('partners');
Route::get("/team", [App\Http\Controllers\HomeController::class, 'showTeam'])->name('team');

Route::get("/jobs/{job}", [App\Http\Controllers\HomeController::class, 'showJobs'])->name('show.job');
Route::get("/jobs/{job}/apply", [App\Http\Controllers\HomeController::class, 'applyJob'])->name("apply.job");
Route::get("/internships/{internship}", [App\Http\Controllers\HomeController::class, 'showInternships'])->name('show.internship');
Route::get("/internships/{internship}/apply", [App\Http\Controllers\HomeController::class, 'applyInternship'])->name("apply.internship");

Route::get('/health', function () {
    Artisan::call('storage:link');
    return "Link established";
});





Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('reset.request');



Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    $status === Password::RESET_LINK_SENT
        ? Flash::success(__($status))
        : Flash::error(__($status));
    return back();
})->middleware('guest')->name('reset.submit');




Route::get('/password/reset/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');




Route::post('/password/reset', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);


    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    if ($status === Password::PASSWORD_RESET) {
        Flash::success(__($status));
        return redirect()->route('login');
    } else {
        Flash::error(__($status));
        return back();
    }
})->middleware('guest')->name('password.update');
