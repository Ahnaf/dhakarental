<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Module;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $moduleDashboardAdmin = Module::updateOrCreate([
            'name' => 'Dashboard',
            'description' => 'Dashboard'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Access Dashboard',
            'slug' => 'admin.dashboard',
        ]);



        $moduleDashboardAdmin = Module::updateOrCreate([
            'name' => 'Admin List',
            'description' => 'Admin List'
        ]);


        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Admin List',
            'slug' => 'admin.listindex',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Admin Add View',
            'slug' => 'admin.registeradmin',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Admin Add',
            'slug' => 'admin.storeadmin',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Delete Admin',
            'slug' => 'admin.deleteadmin',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Edit View',
            'slug' => 'admin.editadmin',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Update Store',
            'slug' => 'admin.updatestoreadmin',
        ]);


        $moduleDashboardAdmin = Module::updateOrCreate([
            'name' => 'Module',
            'description' => 'Module'
        ]);



        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Module',
            'slug' => 'admin.modulelist',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Module add',
            'slug' => 'admin.modulesubmit',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Module delete',
            'slug' => 'admin.moduledelete',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Module edit',
            'slug' => 'admin.moduleedit',
        ]);


        $moduleDashboardAdmin = Module::updateOrCreate([
            'name' => 'Permissions',
            'description' => 'Permissions'
        ]);


        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Permissions ',
            'slug' => 'admin.permissionlist',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Permission Add',
            'slug' => 'admin.permissionsubmit',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Permission Delete',
            'slug' => 'admin.permissiondelete',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Permission Delete List',
            'slug' => 'admin.permissiondeletelist',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Permission Update',
            'slug' => 'admin.permissionupdate',
        ]);


        $moduleDashboardAdmin = Module::updateOrCreate([
            'name' => 'Role',
            'description' => 'Role'
        ]);


        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Role ',
            'slug' => 'admin.rolelist',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Role add view',
            'slug' => 'admin.roleadd',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Role Store',
            'slug' => 'admin.rolestore',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Role Update View',
            'slug' => 'admin.roleupdateview',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Role Update Store',
            'slug' => 'admin.roleupdatestore',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Role Delete',
            'slug' => 'admin.roledelete',
        ]);

        $moduleDashboardAdmin = Module::updateOrCreate([
            'name' => 'Activitylog',
            'description' => 'Activitylog'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Activitylog',
            'slug' => 'admin.activityloglist',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Delete Activity',
            'slug' => 'admin.deleteactivity',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Delete Activity List',
            'slug' => 'admin.deleteactivitylist',
        ]);

        $moduleDashboardAdmin = Module::updateOrCreate([
            'name' => 'DB Backup',
            'description' => 'Database Backup'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'DB Backup List',
            'slug' => 'admin.dbbackuplist',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'DB Backup Store',
            'slug' => 'admin.dbbackupstore',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Download Backup',
            'slug' => 'admin.dbbackupdownload',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Delete File',
            'slug' => 'admin.deletedbbackupfile',
        ]);

        $moduleDashboardAdmin = Module::updateOrCreate([
            'name' => 'Contacts',
            'description' => 'Contacts'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Contacts List',
            'slug' => 'admin.carownerlist',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Contacts Overview',
            'slug' => 'admin.carowneroverview',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Contacts Profile Update',
            'slug' => 'admin.carownerprofile',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Contacts Profile Update',
            'slug' => 'admin.carownerprofile',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Update Contacts',
            'slug' => 'admin.updatecontactstore',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Add Contacts View',
            'slug' => 'admin.addcarowner',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Contacts Update Store',
            'slug' => 'admin.updatecontactstore',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Delete Contact',
            'slug' => 'admin.deletecontact',
        ]);

        $moduleDashboardAdmin = Module::updateOrCreate([
            'name' => 'Cars',
            'description' => 'Cars'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Car List',
            'slug' => 'admin.carlist',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Car Add View',
            'slug' => 'admin.caradd',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Store Car',
            'slug' => 'admin.carstore',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Car Details',
            'slug' => 'admin.cardetails',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Car Delete',
            'slug' => 'admin.cardelete',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Car Edit View',
            'slug' => 'admin.caredit',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Car Update Store',
            'slug' => 'admin.carupdate',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Edit Gallery',
            'slug' => 'admin.cargalleryupdate',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Update Attachments',
            'slug' => 'admin.carattachupdate',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Car Status Change',
            'slug' => 'admin.carstatus',
        ]);

        $moduleDashboardAdmin = Module::updateOrCreate([
            'name' => 'Invoices',
            'description' => 'Invoices'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Invoice List',
            'slug' => 'admin.invoicelist',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Add Invoice View',
            'slug' => 'admin.addinvoiceview',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Delete Invoice',
            'slug' => 'admin.deleteinvoice',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Edit Invoice View',
            'slug' => 'admin.editinvoice',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Update Invoice',
            'slug' => 'admin.updateinvoice',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Confirm Invoice',
            'slug' => 'admin.invoiceconfirm',
        ]);

        $moduleDashboardAdmin = Module::updateOrCreate([
            'name' => 'Request For Car',
            'description' => 'Request For Car'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Request car list',
            'slug' => 'admin.requestcarlist',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Car Request List Hold',
            'slug' => 'admin.requestcarlisthold',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Car Request Confirm',
            'slug' => 'admin.requestcarlistconfirm',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Car Request Details',
            'slug' => 'admin.requestcardetails',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleDashboardAdmin->id,
            'name' => 'Car Request Delete',
            'slug' => 'admin.requestcardelete',
        ]);

        



    }
}
