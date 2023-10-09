<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
use App\Models\Role;
use PragmaRX\Google2FAQRCode\Google2FA;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Create Admin User
        $adminRole = Role::where('slug', 'admin')->first();

        $adminUser = new User();
        $adminUser->name = 'Admin';
        $adminUser->email = 'admin@admin.com';
        $adminUser->password = bcrypt('1234');
        $adminUser->is_active = 1;
        $adminUser->role()->associate($adminRole);
        $adminUser->save();

        $adminProfile = new Profile();
        $adminProfile->user_id = $adminUser->id;
        $adminProfile->designation = 'Tester';
        $adminProfile->phone_number = '(60) 55-55555555';
        $adminProfile->gender = 'male';
        $adminProfile->dob = '25/05/1998';
        $adminProfile->save();

        // Generate and store a 2FA secret for the Admin user
        // $google2fa = new Google2FA();
        // $adminUser->google2fa_secret = $google2fa->generateSecretKey();
        // $adminUser->save();

        // Create Customer User
        $customerRole = Role::where('slug', 'customer')->first();

        $customerUser = new User();
        $customerUser->name = 'Customer';
        $customerUser->email = 'customer@customer.com';
        $customerUser->password = bcrypt('1234');
        $customerUser->is_active = 1;
        $customerUser->role()->associate($customerRole);
        $customerUser->save();

        $customerProfile = new Profile();
        $customerProfile->user_id = $customerUser->id;
        $customerProfile->designation = 'Tester';
        $customerProfile->phone_number = '(60) 55-55555555';
        $customerProfile->gender = 'male';
        $customerProfile->dob = '25/08/1996';
        $customerProfile->save();

         // Generate and store a 2FA secret for the Customer user
        //  $customerUser->google2fa_secret = $google2fa->generateSecretKey();
        //  $customerUser->save();
    }
}
