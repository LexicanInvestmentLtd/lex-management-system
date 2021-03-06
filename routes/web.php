<?php

use App\Http\Middleware\checkAccount;
use App\Http\Middleware\checkAdmin;
use App\Http\Middleware\checkAuth;
use App\Http\Middleware\checkHr;
use App\Http\Middleware\checkManager;
use Illuminate\Support\Facades\Route;

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

    /*Route::get('/', function () {
        $file = public_path('/uploads/qr-code.png');

        return \QrCode::text('Qr code here')->setOutFile($file)->png();
    });*/

    Route::get('/check', [
        'uses' => 'API\ApiController@checkTest',
        /*'as' => 'api.updateTitle'*/
    ]);

    /*Route::get('update/titles', [
        'uses' => 'API\ApiController@Title',
        'as' => 'api.updateTitle'
    ]);

    Route::post('upload/designation', [
        'uses' => 'API\ApiController@uploadDesignation',
        'as' => 'api.uploadDesignation'
    ]);*/



    Route::get('/login', function () {
        return view('Pages.Actions.Auth.login');
    })->name('login');

    Route::post('user/login', [
        'uses' => 'Auth\AuthController@Login',
        'as' => 'user.login'
    ]);
     //General Actions
    Route::middleware([checkAuth::class])->group(function (){
        Route::get('/', [
            'uses' => 'Dashboard\DashboardController@Dashboard',
            'as' => 'user.dashboard'
        ]);

        Route::get('user/logout', [
            'uses' => 'Auth\AuthController@Logout',
            'as' => 'logout'
        ]);

        Route::get('user/dashboard/add-excel-employee', [
            'uses' => 'Dashboard\DashboardController@uploadEmployeeExcel',
            'as' => 'dashboard.upload-excel-employee'
        ]);

        Route::get('user/change-password', [
            'uses' => 'Settings\AccountController@changePassword',
            'as' => 'user.change-password'
        ]);

        Route::post('user/submit-change-password', [
            'uses' => 'Settings\AccountController@changeFinalPassword',
            'as' => 'user.submit-change-password'
        ]);
    });

    //Employee Details
    Route::middleware([checkHr::class])->group(function (){
        Route::get('user/add-employee', [
            'uses' => 'Employee\EmployeeController@addEmployee',
            'as' => 'user.add-employee'
        ]);

        Route::post('user/submit-new-employee', [
            'uses' => 'Employee\EmployeeController@submitNewEmployee',
            'as' => 'user.submit-new-employee'
        ]);

        Route::get('user/view-employees', [
            'uses' => 'Employee\EmployeeController@viewEmployees',
            'as' => 'user.view-employees'
        ]);

        Route::get('user/update-employee-details/{token}', [
            'uses' => 'Employee\EmployeeController@updateEmployeeDetails',
            'as' => 'user.update-employee-details'
        ]);

        Route::get('user/view-employee-details/{token}', [
            'uses' => 'Employee\EmployeeController@viewEmployeeDetails',
            'as' => 'user.view-employee-details'
        ]);

        Route::get('user/print-employee-card/{token}', [
            'uses' => 'Employee\EmployeeController@printEmployeeCard',
            'as' => 'user.print-employee-card'
        ]);

        Route::post('user/update-employee-data/{token}', [
            'uses' => 'Employee\EmployeeController@updateEmployeeDate',
            'as' => 'user.update-employee-data'
        ]);

        Route::post('user/update-employee-guarantor/{token}', [
            'uses' => 'Employee\EmployeeController@updateEmployeeGuarantor',
            'as' => 'user.update-employee-guarantor'
        ]);

        Route::post('user/add-employee-education/{token}', [
            'uses' => 'Employee\EmployeeController@addEmployeeEducation',
            'as' => 'user.add-employee-education'
        ]);

        Route::post('user/add-employee-work-details/{token}', [
            'uses' => 'Employee\EmployeeController@addEmployeeWorkDetails',
            'as' => 'user.add-employee-work-details'
        ]);

        Route::post('user/add-employee-employment-history/{token}', [
            'uses' => 'Employee\EmployeeController@addEmployeeEmploymentHistory',
            'as' => 'user.add-employee-employment-history'
        ]);
    });

    // System Settings adn User Settings

    Route::middleware([checkAdmin::class])->group(function (){
        Route::post('user/register', [
            'uses' => 'Auth\AuthController@Register',
            'as' => 'user.register'
        ]);

        Route::get('/upload-title', function () {
            return view('welcome');
        });

        Route::get('/register', function () {
            return view('Pages.Actions.Auth.register');
        })->name('register');

        Route::get('user/add-new-user', [
            'uses' => 'User\UserController@addUser',
            'as' => 'user.add-new-user'
        ]);

        Route::get('user/suspend-user/{token}', [
            'uses' => 'User\UserController@suspendUser',
            'as' => 'user.suspend-user'
        ]);

        Route::get('user/activate-user/{token}', [
            'uses' => 'User\UserController@activateUser',
            'as' => 'user.activate-user'
        ]);

        Route::post('user/edit-user-details/{token}', [
            'uses' => 'User\UserController@editUserDetails',
            'as' => 'user.edit-user-details'
        ]);

        Route::get('user/view-all-users', [
            'uses' => 'User\UserController@viewUser',
            'as' => 'user.view-users'
        ]);

        Route::get('user/add-new-excel-users', [
            'uses' => 'User\UserController@addExcelUsers',
            'as' => 'user.add-new-users'
        ]);

        Route::post('user/submit-new-user-form', [
            'uses' => 'User\UserController@submitUserForm',
            'as' => 'user.submit-new-user-form'
        ]);

        Route::post('user/upload-user-excel-file', [
            'uses' => 'User\UserController@uploadUserExcel',
            'as' => 'user.upload-user-excel-file'
        ]);

        Route::get('get-all-banks', [
            'uses' => 'Employee\EmployeeController@getBankCode',
            'as' => 'api.get-bank-code'
        ]);

        Route::get('user/store-settings', [
            'uses' => 'Settings\SettingController@addStore',
            'as' => 'user.add-store'
        ]);

        Route::post('user/submit-store-form', [
            'uses' => 'Settings\SettingController@submitStore',
            'as' => 'user.submit-store'
        ]);

        Route::post('user/edit-store-details/{token}', [
            'uses' => 'Settings\SettingController@editStoreDetails',
            'as' => 'user.edit-store-details'
        ]);

        Route::get('user/month-settings', [
            'uses' => 'Settings\SettingController@addMonth',
            'as' => 'user.add-month'
        ]);

        Route::post('user/submit-month-form', [
            'uses' => 'Settings\SettingController@submitMonth',
            'as' => 'user.submit-month'
        ]);

        Route::post('user/edit-month-details/{token}', [
            'uses' => 'Settings\SettingController@editMonthDetails',
            'as' => 'user.edit-month-details'
        ]);

        Route::get('user/deactivate-month/{token}', [
            'uses' => 'Settings\SettingController@deactivateMonth',
            'as' => 'month.deactivate'
        ]);

        Route::get('user/activate-month/{token}', [
            'uses' => 'Settings\SettingController@activateMonth',
            'as' => 'month.activate'
        ]);

        Route::get('user/year-settings', [
            'uses' => 'Settings\SettingController@addYear',
            'as' => 'user.add-year'
        ]);

        Route::post('user/submit-year-form', [
            'uses' => 'Settings\SettingController@submitYear',
            'as' => 'user.submit-year'
        ]);

        Route::post('user/edit-year-details/{token}', [
            'uses' => 'Settings\SettingController@editYearDetails',
            'as' => 'user.edit-year-details'
        ]);

        Route::get('user/deactivate-year/{token}', [
            'uses' => 'Settings\SettingController@deactivateYear',
            'as' => 'year.deactivate'
        ]);

        Route::get('user/activate-year/{token}', [
            'uses' => 'Settings\SettingController@activateYear',
            'as' => 'year.activate'
        ]);

        Route::get('user/title-settings', [
            'uses' => 'Settings\SettingController@addTitle',
            'as' => 'user.add-title'
        ]);

        Route::post('user/submit-title-form', [
            'uses' => 'Settings\SettingController@submitTitle',
            'as' => 'user.submit-title'
        ]);

        Route::post('user/edit-title-details/{token}', [
            'uses' => 'Settings\SettingController@editTitleDetails',
            'as' => 'user.edit-title-details'
        ]);

        Route::get('user/state-settings', [
            'uses' => 'Settings\SettingController@addState',
            'as' => 'user.add-state'
        ]);

        Route::post('user/submit-state-form', [
            'uses' => 'Settings\SettingController@submitState',
            'as' => 'user.submit-state'
        ]);

        Route::post('user/edit-state-details/{token}', [
            'uses' => 'Settings\SettingController@editStateDetails',
            'as' => 'user.edit-state-details'
        ]);

        Route::get('user/lgs-settings', [
            'uses' => 'Settings\SettingController@addLgs',
            'as' => 'user.add-lgs'
        ]);

        Route::post('user/submit-lgs-form', [
            'uses' => 'Settings\SettingController@submitLgs',
            'as' => 'user.submit-lgs'
        ]);

        Route::post('user/edit-lgs-details/{token}', [
            'uses' => 'Settings\SettingController@editLgsDetails',
            'as' => 'user.edit-lgs-details'
        ]);

        Route::get('user/home_town-settings', [
            'uses' => 'Settings\SettingController@addHome',
            'as' => 'user.add-home-town'
        ]);

        Route::post('user/submit-home-town-form', [
            'uses' => 'Settings\SettingController@submitHome',
            'as' => 'user.submit-home-town'
        ]);

        Route::post('user/edit-home-town-details/{token}', [
            'uses' => 'Settings\SettingController@editHomeDetails',
            'as' => 'user.edit-home-town-details'
        ]);

        Route::get('user/role-settings', [
            'uses' => 'Settings\SettingController@addRole',
            'as' => 'user.add-role'
        ]);

        Route::post('user/submit-role-form', [
            'uses' => 'Settings\SettingController@submitRole',
            'as' => 'user.submit-role'
        ]);

        Route::post('user/edit-role-details/{token}', [
            'uses' => 'Settings\SettingController@editRoleDetails',
            'as' => 'user.edit-role-details'
        ]);

        Route::get('user/rating-settings', [
            'uses' => 'Settings\SettingController@addRating',
            'as' => 'user.add-rating'
        ]);

        Route::post('user/submit-rating-form', [
            'uses' => 'Settings\SettingController@submitRating',
            'as' => 'user.submit-rating'
        ]);

        Route::post('user/edit-rating-details/{token}', [
            'uses' => 'Settings\SettingController@editRatingDetails',
            'as' => 'user.edit-rating-details'
        ]);

        Route::get('user/bank-settings', [
            'uses' => 'Settings\SettingController@addBank',
            'as' => 'user.add-bank'
        ]);

        Route::get('user/deactivate-bank/{token}', [
            'uses' => 'Settings\SettingController@deactivateBank',
            'as' => 'user.deactivate-bank'
        ]);

        Route::get('user/activate-bank/{token}', [
            'uses' => 'Settings\SettingController@activateBank',
            'as' => 'user.activate-bank'
        ]);

        Route::get('user/designation-settings', [
            'uses' => 'Settings\SettingController@addDesignation',
            'as' => 'user.add-designation'
        ]);

        Route::post('user/submit-designation-form', [
            'uses' => 'Settings\SettingController@submitDesignation',
            'as' => 'user.submit-designation'
        ]);

        Route::post('user/edit-designation-details/{token}', [
            'uses' => 'Settings\SettingController@editDesignationDetails',
            'as' => 'user.edit-designation-details'
        ]);

        Route::get('user/image-settings', [
            'uses' => 'Settings\SettingController@addImage',
            'as' => 'user.add-image'
        ]);

        Route::post('user/submit-image-form', [
            'uses' => 'Settings\SettingController@submitImage',
            'as' => 'user.submit-image'
        ]);

        Route::post('user/edit-image-details/{token}', [
            'uses' => 'Settings\SettingController@editImageDetails',
            'as' => 'user.edit-image-details'
        ]);

    });

    Route::middleware([checkManager::class])->group(function (){
        Route::get('user/process-initial-salary', [
            'uses' => 'Financials\FinancialController@initialSalary',
            'as' => 'user.salary-initial'
        ]);

        Route::get('user/process-salary', [
            'uses' => 'Financials\FinancialController@processSalary',
            'as' => 'user.process-salary'
        ]);

        Route::post('user/submit-final-salary', [
            'uses' => 'Financials\FinancialController@submitFinalSalary',
            'as' => 'user.submit-final-salary'
        ]);

        Route::post('user/update-final-salary/{token}', [
            'uses' => 'Financials\FinancialController@updateFinalSalary',
            'as' => 'user.update-final-salary'
        ]);
    });

    Route::middleware([checkAccount::class])->group(function (){
        Route::get('user/account-update-salary', [
            'uses' => 'Account\AccountController@viewAccountForm',
            'as' => 'user.account-update-salary'
        ]);

        Route::get('user/account-process-salary', [
            'uses' => 'Account\AccountController@accountProcessSalary',
            'as' => 'user.account-process-salary'
        ]);

        Route::post('user/account-final-salary', [
            'uses' => 'Account\AccountController@accountFinalSalary',
            'as' => 'user.account-final-salary'
        ]);

        Route::get('user/preview-salary', [
            'uses' => 'Account\AccountController@previewSalary',
            'as' => 'user.preview-salary'
        ]);

        Route::get('user/submit-preview-salary', [
            'uses' => 'Account\AccountController@submitPreviewSalary',
            'as' => 'user.submit-preview-salary'
        ]);

        Route::get('user/preview-salary-list', [
            'uses' => 'Account\AccountController@previewSalaryList',
            'as' => 'user.preview-salary-list'
        ]);

        Route::get('user/print-salary-list', [
            'uses' => 'Account\AccountController@printSalaryList',
            'as' => 'user.print-salary-list'
        ]);
    });

/*Route::post('user/final-salary-process/{token}', function () {
   dd('uthekrhejrhejrer');
});*/

    Route::get('employee/{token}', [
        'uses' => 'API\ApiController@fetchEmployeeDetails',
        'as' => 'api.fetch-employee-details'
    ]);


    /*Route::get('api/fetch/states', [
       'uses' => 'API\ApiController@fetchStates',
       'as' => 'api.fetch-state'
    ]);

    Route::get('api/fetch/home-town', [
       'uses' => 'API\ApiController@fetchHomeTown',
       'as' => 'api.fetch-home-town'
    ]);
    */





