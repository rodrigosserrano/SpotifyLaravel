<?php
namespace Tests\Feature;

use App\Entities\User;
use App\Livewire\LoginComponent;
use Illuminate\Support\Facades\Hash;
use Livewire\Livewire;

uses()->group('livewire');

test('Login manual', function () {
    $user = User::factory()->createOne(['password' => Hash::make('123')]);

    // TODO: make test with Livewire
})->only();
