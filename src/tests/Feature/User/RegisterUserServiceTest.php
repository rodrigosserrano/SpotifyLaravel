<?php
namespace Tests\Feature;

use App\Entities\User;
use App\Enums\UserStatusEnum;
use Illuminate\Support\Facades\Hash;
use Livewire\Livewire;

uses()->group('livewire', 'register-user');

test('Access register page when logged', function () {
    $user = User::factory()->createOne(['user_status_id' => UserStatusEnum::Pending->value, 'password' => Hash::make($this->password = '1234567890123'), 'has_password' => true]);

    $this->actingAs($user)
        ->get(route('register'))
        ->assertRedirect(route('account'));
});

test('', function () {
    
});
