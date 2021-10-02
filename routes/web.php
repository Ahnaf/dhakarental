<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



/*---- Admin ----*/

use App\Http\Controllers\Admin\Auth\AdminloginController;
use App\Http\Controllers\Admin\Auth\AdminRegisterController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Auth\AdminLogoutController;
Use App\Http\Controllers\Admin\Auth\AdminChangepasswordController;
use App\Http\Controllers\Admin\Auth\AdminProfileController;
use App\Http\Controllers\Admin\Module\ModuleController;
use App\Http\Controllers\Admin\Permission\PermissionController;
use App\Http\Controllers\Admin\Role\RoleController;
use App\Http\Controllers\Admin\Activitylog\ActivitylogController;
use App\Http\Controllers\Admin\Databasebackup\DatabasebackupController;
use App\Http\Controllers\Admin\Carowner\CarownerController;
use App\Http\Controllers\Admin\Car\CarController;
use App\Http\Controllers\Admin\Invoice\InvoiceController;

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



/*---- Admin Route ----*/


Route::get('/', [AdminloginController::class, 'loginView'])->name('adminlogin.view');
Route::post('/adminlogin', [AdminloginController::class, 'adminLogin'])->name('adminlogin.submit');

Route::prefix('admin')->group(function () {
Route::middleware(['auth:admin'])->group(function () {
    Route::post('/logout', AdminLogoutController::class)->name('logout.destory');

    Route::get('/changepassword', [AdminChangepasswordController::class, 'changePasswordView'])->name('admin.changepassview');

    Route::post('/changepassword', [AdminChangepasswordController::class, 'storeChangePassword'])->name('admin.storepassword');

    Route::get('/profile', [AdminProfileController::class, 'profileView'])->name('admin.profileview');

    Route::post('/profile', [AdminProfileController::class, 'updateProfile'])->name('admin.profilestore');

    Route::middleware(['auth.gate'])->group(function () {

        /*---- Admin Route ----*/

        Route::get('/adminlist', [AdminRegisterController::class, 'adminList'])->name('admin.listindex');

        Route::get('/addadmin', [AdminRegisterController::class, 'adminUserAdd'])->name('admin.registeradmin');

        Route::post('/storeadmin', [AdminRegisterController::class, 'storeAdmin'])->name('admin.storeadmin');

        Route::get('/adminedit/{id}', [AdminRegisterController::class, 'editAdminView'])->name('admin.editadmin');

        Route::post('/updatestoreadmin', [AdminRegisterController::class, 'updateAdminStore'])->name('admin.updatestoreadmin');

        Route::post('/deleteadmin', [AdminRegisterController::class, 'deleteAdmin'])->name('admin.deleteadmin');

        /*---- Dashboard Route ----*/

        Route::get('/dashboard', [DashboardController::class, 'dashboardIndex'])->name('admin.dashboard');

        /*---- Module Route ----*/

        Route::get('/modulelist', [ModuleController::class, 'moduleList'])->name('admin.modulelist');

        Route::post('/moduleadd', [ModuleController::class, 'moduleStore'])->name('admin.modulesubmit');

        Route::post('/moduledelete', [ModuleController::class, 'deleteModule'])->name('admin.moduledelete');

        Route::post('/moduleedit', [ModuleController::class, 'updateModule'])->name('admin.moduleedit');

        /*---- Permission Route ----*/

        Route::get('/permissionlist', [PermissionController::class, 'permissionView'])->name('admin.permissionlist');

        Route::post('/permissionadd', [PermissionController::class, 'storePermission'])->name('admin.permissionsubmit');

        Route::post('/permissiondelete', [PermissionController::class, 'deletePermission'])->name('admin.permissiondelete');

        Route::post('/permissiondeletelist', [PermissionController::class, 'deletePermissionList'])->name('admin.permissiondeletelist');

        Route::post('/permissionupdate', [PermissionController::class, 'permissionUpdate'])->name('admin.permissionupdate');

        /*---- Role Route ----*/

        Route::get('/rolelist', [RoleController::class, 'roleList'])->name('admin.rolelist');

        Route::get('/roleadd', [RoleController::class, 'roleStoreViw'])->name('admin.roleadd');

        Route::post('/roleadd', [RoleController::class, 'storeRole'])->name('admin.rolestore');

        Route::get('/roleedit/{id}', [RoleController::class, 'updateRoleView'])->name('admin.roleupdateview');

        Route::post('/roleupdate', [RoleController::class, 'storeUpdateRole'])->name('admin.roleupdatestore');

        Route::post('/roledelete', [RoleController::class, 'deleteRole'])->name('admin.roledelete');

        /*---- Activity Log ----*/

        Route::get('/activityloglist', [ActivitylogController::class, 'activityLogList'])->name('admin.activityloglist');

        Route::post('/deleteactivity', [ActivitylogController::class, 'deleteActivityLog'])->name('admin.deleteactivity');

        Route::post('/deleteactivitylist', [ActivitylogController::class, 'deleteActivityLogList'])->name('admin.deleteactivitylist');

        /*---- DB Backup Route ----*/

        Route::get('/dbbackuplist', [DatabasebackupController::class, 'dbBackupList'])->name('admin.dbbackuplist');

        Route::get('/dbbackupstore', [DatabasebackupController::class, 'storeDbBackup'])->name('admin.dbbackupstore');

        Route::get('/downloaddbbackup/{name}', [DatabasebackupController::class, 'downloadBackup'])->name('admin.dbbackupdownload');

        Route::post('/deletedbbackup', [DatabasebackupController::class, 'deleteDbBackuoFile'])->name('admin.deletedbbackupfile');

        /*---- Car Route ----*/

        Route::get('/carlist', [CarController::class, 'carList'])->name('admin.carlist');

        Route::get('/caradd', [CarController::class, 'addCarView'])->name('admin.caradd');

        Route::post('/caradd', [CarController::class, 'storeCar'])->name('admin.carstore');

        Route::get('/cardetails/{id}', [CarController::class, 'carDetails'])->name('admin.cardetails');

        Route::post('/cardelete', [CarController::class, 'deleteCar'])->name('admin.cardelete');

        Route::post('/carstatus', [CarController::class, 'changeStatus'])->name('admin.carstatus');

        Route::get('/editcar/{id}', [CarController::class, 'carEditView'])->name('admin.caredit');

        Route::post('/editcar', [CarController::class, 'updateCarStore'])->name('admin.carupdate');

        Route::post('/editgallery', [CarController::class, 'editGallery'])->name('admin.cargalleryupdate');

        Route::post('/editattach', [CarController::class, 'editAttach'])->name('admin.carattachupdate');

        Route::get('/carfilter', [CarController::class, 'carFilter'])->name('admin.carFilter');

        /*---- Car Owner Route ----*/

        Route::get('/contactslist', [CarownerController::class, 'carOwnerList'])->name('admin.carownerlist');

        Route::get('/addcontacts', [CarownerController::class, 'addCarOwner'])->name('admin.addcarowner');

        Route::post('/addcontacts', [CarownerController::class, 'storeContacts'])->name('admin.addcontactstore');

        Route::get('/overview/{id}', [CarownerController::class, 'carOwnerOverview'])->name('admin.carowneroverview');

        Route::get('/contactsprofile/{id}', [CarownerController::class, 'carOwnerProfile'])->name('admin.carownerprofile');

        Route::post('/contactsprofile', [CarownerController::class, 'carOwnerUpdateStore'])->name('admin.updatecontactstore');

        Route::post('/contactsdelete', [CarownerController::class, 'deleteContact'])->name('admin.deletecontact');

        /*---- Invoice Route ----*/

        Route::get('/invoicelist', [InvoiceController::class, 'invoiceIndex'])->name('admin.invoicelist');

        Route::get('/addinvoice', [InvoiceController::class, 'addInvoiceView'])->name('admin.addinvoiceview');

        Route::post('/storeinvoice', [InvoiceController::class, 'storeInvoice'])->name('admin.storeinvoice');

        Route::post('/deleteinvoice', [InvoiceController::class, 'deleteInvoice'])->name('admin.deleteinvoice');

        Route::get('/editinvoice/{id}', [InvoiceController::class, 'editInvoiceView'])->name('admin.editinvoice');

        Route::post('/updateinvoice', [InvoiceController::class, 'updateInvoice'])->name('admin.updateinvoice');

        Route::post('/deleteinvoiceitem', [InvoiceController::class, 'deleteInvoiceItem'])->name('admin.deleteinvoiceitem');

        Route::get('/invoicedetails/{id}', [InvoiceController::class, 'invoiceDetail'])->name('admin.invoicedetails');

        // Route::get('/invoicepdf/{id}', [InvoiceController::class, 'makePdf'])->name('admin.invoicepdf');



    });

});
});
