<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use App\Permission;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        //清空权限相关的表
        Permission::truncate();
        Role::truncate();
        User::truncate();
        DB::table('role_user')->delete();
        DB::table('Permission_role')->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        //创建初始管理员用户  
        $wangyulin = User::create([
        	'name'=>'wangyulin',
        	'email'=>'wangyulin@163.com',
        	'password'=>bcrypt('secret')

        ]);
        //创建初始的角色
        $admin = Role::create([
        	'name'=>'admin',
        	'display_name'=>'管理员',
        	'description'=>'super admin role'
        ]);
        //创建相应的初始权限
        $manage_user = Permission::create([
        	'name'=>'manage_user',
        	'display_name'=>'用户管理',
        	'description'=>'管理用户的权限'
        ]);

        //给角色赋予相应的权限
        $admin->attachPermission($manage_user);

        //给用户赋予相应的角色
        $wangyulin->attachRole($admin);
    }
}
