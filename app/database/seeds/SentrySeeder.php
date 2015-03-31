<?php

//use App\Models\User;
class SentrySeeder extends Seeder {

    public function run()
    {


        DB::table('users')->delete();
        DB::table('groups')->delete();
        DB::table('users_groups')->delete();

        Sentry::getUserProvider()->create(array(
            'email'       => 'admin@admin.com',
            'password'    => "admin",
            'first_name'  => 'admin',
            'last_name'   => 'admin',
            'activated'   => 1,
        ));

        Sentry::getGroupProvider()->create(array(
            'name'        => 'Super Admin',
            'permissions' => array('admin' => 1),
        ));

        Sentry::getGroupProvider()->create(array(
            'name'        => 'Office Admin',
            'permissions' => array('admin' => 1),
        ));

        Sentry::getGroupProvider()->create(array(
            'name'        => 'Project Manager',
            'permissions' => array('admin' => 1),
        ));

        Sentry::getGroupProvider()->create(array(
            'name'        => 'Team Leader',
            'permissions' => array('admin' => 1),
        ));

        Sentry::getGroupProvider()->create(array(
            'name'        => 'Developer',
            'permissions' => array('admin' => 1),
        ));

        Sentry::getUserProvider()->create(array(
            'email'       => 'ashok@admin.com',
            'password'    => "admin",
            'first_name'  => 'Ashok',
            'last_name'   => 'Adhikari',
            'activated'   => 1,
        ));



        Sentry::getUserProvider()->create(array(
            'email'       => 'santosh@admin.com',
            'password'    => "santosh",
            'first_name'  => 'Santosh',
            'last_name'   => 'Dhungana',
            'activated'   => 1,
        ));

        Sentry::getUserProvider()->create(array(
            'email'       => 'dinesh@admin.com',
            'password'    => "dinesh",
            'first_name'  => 'Dinesh',
            'last_name'   => 'Sharma',
            'activated'   => 1,
        ));

        Sentry::getUserProvider()->create(array(
            'email'       => 'asheem@admin.com',
            'password'    => "asheem",
            'first_name'  => 'Asheem',
            'last_name'   => 'Manandhar',
            'activated'   => 1,
        ));

               // Assign user permissions
        $adminUser  = Sentry::getUserProvider()->findByLogin('admin@admin.com');
        $adminGroup = Sentry::getGroupProvider()->findByName('Super Admin');
        $adminUser->addGroup($adminGroup);

        $adminUser  = Sentry::getUserProvider()->findByLogin('ashok@admin.com');
        $adminGroup = Sentry::getGroupProvider()->findByName('Office Admin');
        $adminUser->addGroup($adminGroup);

        $adminUser  = Sentry::getUserProvider()->findByLogin('santosh@admin.com');
        $adminGroup = Sentry::getGroupProvider()->findByName('Project Manager');
        $adminUser->addGroup($adminGroup);

        $adminUser  = Sentry::getUserProvider()->findByLogin('dinesh@admin.com');
        $adminGroup = Sentry::getGroupProvider()->findByName('Team Leader');
        $adminUser->addGroup($adminGroup);

        $adminUser  = Sentry::getUserProvider()->findByLogin('asheem@admin.com');
        $adminGroup = Sentry::getGroupProvider()->findByName('Developer');
        $adminUser->addGroup($adminGroup);
    }

}