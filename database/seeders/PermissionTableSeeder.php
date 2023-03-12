<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Database\Seeds\PermissionsTableSeeder;
class PermissionTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{
$permissions = [
'role-list',
'role-create',
'role-edit',
'role-delete',
'appear-users',
'appear-roles',
'add-card',
'add-slider',
'add-category',
'add-product',
'add-offer',
'add-colors',
'add-size',
'add-shipping',
'add-coupon',

];
foreach ($permissions as $permission) {
Permission::create(['name' => $permission]);
}
}
}