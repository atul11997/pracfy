<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThemeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
    Route::get('/', [SiteController::class, 'userIndex'])->name('user.index');
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register-process', [AuthController::class, 'registerProcess'])->name('register.process');
    Route::get('/admin/login', [AuthController::class, 'login'])->name('login');
    Route::post('login-proccess', [AuthController::class, 'Authenticate'])->name('login.process');
    Route::get('logout', [AuthController::class, 'signOut'])->name('logout');
    Route::get('auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
    Route::get('auth/google/callback', [AuthController::class, 'handleGoogleCallback']);
  //Admin Panel Routs
    Route::middleware('admin.auth')->group(function(){
        Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
        Route::get('get-profile/{id}', [AuthController::class, 'getProfile'])->name('profile.show');
        Route::post('profile-update', [AuthController::class, 'profileUpdate'])->name('profile.update');

    //Page
    Route::prefix('admin')->name('page.')->group(function () {
        Route::get('page-list', [PageController::class, 'pageList'])->name('list');
        Route::post('page-process', [PageController::class, 'pageProcess'])->name('process');
        Route::get('page-edit/{id}', [PageController::class, 'editPage'])->name('edit');
        Route::post('page-update', [PageController::class, 'updatePage'])->name('update');
        Route::get('page-status-change/{id}/{status}', [PageController::class, 'statusChangePage'])->name('status.change');
    });

    //Banner
    Route::prefix('admin')->name('banner.')->group(function () {
        Route::get('banner-list', [BannerController::class, 'bannerList'])->name('list');
        Route::post('banner-process', [BannerController::class, 'bannerProcess'])->name('process');
        Route::get('banner-edit/{id}', [BannerController::class, 'editBanner'])->name('edit');
        Route::post('banner-update', [BannerController::class, 'updateBanner'])->name('update');
        Route::post('banner-delete', [BannerController::class, 'deleteBanner'])->name('delete');
    });

    //About
    Route::prefix('admin')->name('about.')->group(function () {
        // Route::get('about-list', [AboutController::class, 'aboutList'])->name('list');
        // Route::post('about-process', [AboutController::class, 'aboutProcess'])->name('process');
        // Route::get('about-edit/{id}', [AboutController::class, 'editAbout'])->name('edit');
        Route::get('about', [AboutController::class, 'createAbout'])->name('create');
        Route::post('about-update', [AboutController::class, 'updateAbout'])->name('update');
        // Route::post('about-delete', [AboutController::class, 'deleteAbout'])->name('delete');
    });

    //Services
    Route::prefix('admin')->name('service.')->group(function () {
        Route::get('service-list', [ServiceController::class, 'serviceList'])->name('list');
        Route::post('service-process', [ServiceController::class, 'serviceProcess'])->name('process');
        Route::get('service-edit/{id}', [ServiceController::class, 'serviceEdit'])->name('edit');
        Route::post('service-update', [ServiceController::class, 'serviceUpdate'])->name('update');
        Route::post('service-delete', [ServiceController::class, 'serviceDelete'])->name('delete');
    });

    //Address
    Route::prefix('admin')->name('address.')->group(function () {
        Route::get('address-list', [AddressController::class, 'addressList'])->name('list');
        Route::post('address-process', [AddressController::class, 'addressProccess'])->name('process');
        Route::get('address-edit/{id}', [AddressController::class, 'addressEdit'])->name('edit');
        Route::post('address-update', [AddressController::class, 'addressUpdate'])->name('update');
        Route::post('address-delete', [AddressController::class, 'addressDelete'])->name('delete');
    });

    //Social Media
    Route::prefix('admin')->name('social.')->group(function () {
        Route::get('social-list', [SocialMediaController::class, 'socialMediaList'])->name('list');
        Route::post('social-process', [SocialMediaController::class, 'socialProcess'])->name('process');
        Route::post('social-update', [SocialMediaController::class, 'socialUpdate'])->name('update');
        Route::post('social-delete', [SocialMediaController::class, 'socialDelete'])->name('delete');
    });

    //gallery
    Route::prefix('admin')->name('gallery.')->group(function () {
        Route::get('gallery-list', [GalleryController::class, 'galleryList'])->name('list');
        Route::post('gallery-process', [GalleryController::class, 'galleryProcess'])->name('process');
        Route::post('gallery-delete', [GalleryController::class, 'deleteGallery'])->name('delete');
    });

    //Video
    Route::prefix('admin')->name('video.')->group(function () {
        Route::get('video-list', [VideoController::class, 'videoList'])->name('list');
        Route::post('video-process', [VideoController::class, 'VideoProcess'])->name('process');
        Route::post('video-update', [VideoController::class, 'videoUpdate'])->name('update');
        Route::post('video-delete', [VideoController::class, 'videoDelete'])->name('delete');
    });

    //Faqs
    Route::prefix('admin')->name('faq.')->group(function () {
        Route::get('faq-list', [FAQController::class, 'faqList'])->name('list');
        Route::post('faq-process', [FAQController::class, 'faqProcess'])->name('process');
        Route::post('faq-update', [FAQController::class, 'faqUpdate'])->name('update');
        Route::post('faq-delete', [FAQController::class, 'faqDelete'])->name('delete');
    });

    //Blog
    Route::prefix('admin')->name('blog.')->group(function () {
        Route::get('blog-list', [BlogController::class, 'blogList'])->name('list');
        Route::post('blog-process', [BlogController::class, 'blogProcess'])->name('process');
        Route::get('blog-edit/{id}', [BlogController::class, 'blogEdit'])->name('edit');
        Route::post('blog-update', [BlogController::class, 'blogUpdate'])->name('update');
        Route::post('blog-delete', [BlogController::class, 'blogDelete'])->name('delete');
    });

    //Testimonials
    Route::prefix('admin')->name('testimonials.')->group(function () {
        Route::get('testimonials-list', [TestimonialController::class, 'testimonialList'])->name('list');
        Route::post('testimonials-process', [TestimonialController::class, 'testimonialProcess'])->name('process');
        Route::get('testimonial-edit/{id}', [TestimonialController::class, 'testimonialEdit'])->name('edit');
        Route::post('testimonial-update', [TestimonialController::class, 'testimonialUpdate'])->name('update');
        Route::post('testimonial-delete', [TestimonialController::class, 'testimonialDelete'])->name('delete');
    });

        //Departments
    Route::prefix('admin')->name('department.')->group(function () {
        Route::get('department-list', [DepartmentController::class, 'departmentList'])->name('list');
        Route::post('department-process', [DepartmentController::class, 'departmentProcess'])->name('process');
        Route::get('department-edit/{id}', [DepartmentController::class, 'departmentEdit'])->name('edit');
        Route::post('department-update', [DepartmentController::class, 'departmentUpdate'])->name('update');
        Route::post('department-delete', [DepartmentController::class, 'departmentDelete'])->name('delete');
    });

        //Doctors
    Route::prefix('admin')->name('doctors.')->group(function () {
        Route::get('doctor-list', [DoctorController::class, 'doctorList'])->name('list');
        Route::post('doctor-process', [DoctorController::class, 'doctorProcess'])->name('process');
        Route::get('doctor-edit/{id}', [DoctorController::class, 'doctorEdit'])->name('edit');
        Route::post('doctor-update', [DoctorController::class, 'doctorUpdate'])->name('update');
         Route::post('doctor-delete', [DoctorController::class, 'doctorDelete'])->name('delete');
    });

    Route::get('/user/{id}', [SiteController::class, 'index'])->name('index');
    // Route::get('/about', [PageController::class, 'about'])->name('about');
    // Route::get('/services', [PageController::class, 'services'])->name('services');
    Route::post('/enquires', [SiteController::class, 'addEnquiry'])->name('add.enquiry');

    Route::post('/theme-customization', [SettingController::class, 'themeCustomization'])->name('theme.customization');
    Route::get('/themes', [ThemeController::class, 'showThemes'])->name('themes.select');
    Route::post('/themes', [ThemeController::class, 'selectTheme'])->name('themes.select.post');

});





