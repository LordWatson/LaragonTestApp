<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use Database\Seeders\AssignRolesToUsersSeeder;
use Database\Seeders\UserPermissionSeeder;
use Database\Seeders\UserRoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminAccessTest extends TestCase
{
    /**
     * Checks a non admin user cannot access the /users url
     */
    public function test_non_admin_user_cannot_access_users_admin_page(): void
    {
        // Create user
        $user = User::factory()->create();

        // Seed user roles, permissions, and assign them
        $this->seed([UserPermissionSeeder::class, UserRoleSeeder::class, AssignRolesToUsersSeeder::class]);

        $response = $this
            ->actingAs($user)
            ->get('/users');

        $response->assertStatus(403);
    }
    /**
     * Checks an admin user cannot access the /users url
     */
    public function test_admin_user_cannot_access_users_admin_page(): void
    {
        // Create admin user
        $user = User::factory()->create([
            'email' => 'admin@admin.com'
        ]);

        // Seed user roles, permissions, and assign them
        $this->seed([UserPermissionSeeder::class, UserRoleSeeder::class, AssignRolesToUsersSeeder::class]);

        $response = $this
            ->actingAs($user)
            ->get('/users');

        $response->assertOk();
    }
}
