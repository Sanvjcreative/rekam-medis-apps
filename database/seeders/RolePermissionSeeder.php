<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = [
            'view pasien',
            'create pasien',
            'edit pasien',
            'delete pasien',
            'view pemeriksaan',
            'create pemeriksaan',
            'edit pemeriksaan',
            'delete pemeriksaan',
            'view rekam medis',
            'create rekam medis',
            'edit rekam medis',
            'delete rekam medis',
            'view petugas',
            'create petugas',
            'edit petugas',
            'delete petugas',
            'view poli',
            'create poli',
            'edit poli',
            'delete poli',
            'view obat',
            'create obat',
            'edit obat',
            'delete obat',
            'view laporan',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create roles and assign permissions
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(Permission::all());

        $petugasRole = Role::create(['name' => 'petugas']);
        $petugasRole->givePermissionTo([
            'view pasien',
            'create pasien',
            'edit pasien',
            'view pemeriksaan',
            'create pemeriksaan',
            'edit pemeriksaan',
            'view rekam medis',
            'create rekam medis',
            'edit rekam medis',
        ]);

        $pasienRole = Role::create(['name' => 'pasien']);
        $pasienRole->givePermissionTo([
            'view rekam medis',
        ]);

        // Create default users
        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@rekammedis.com',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole('admin');

        $petugas = User::create([
            'name' => 'Petugas',
            'email' => 'petugas@rekammedis.com',
            'password' => Hash::make('password'),
        ]);
        $petugas->assignRole('petugas');

        $pasien = User::create([
            'name' => 'Pasien',
            'email' => 'pasien@rekammedis.com',
            'password' => Hash::make('password'),
        ]);
        $pasien->assignRole('pasien');
    }
}
