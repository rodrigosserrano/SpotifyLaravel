<?php

namespace Tests\Feature;

use Laravel\Socialite\Facades\Socialite;

test('Login with Google Socialite', function () {
    $abstractUser = \Mockery::mock('Laravel\Socialite\Two\User');
    $abstractUser
        ->shouldReceive('getId')
        ->andReturn(fake()->numerify('#####################'))
        ->shouldReceive('getName')
        ->andReturn(fake()->name())
        ->shouldReceive('getEmail')
        ->andReturn(fake()->unique()->safeEmail())
        ->shouldReceive('getAvatar')
        ->andReturn(fake()->imageUrl(category: 'person'));

    Socialite::shouldReceive('driver->user')->andReturn($abstractUser);

    $this->get('/oauth/google/callback')->assertRedirect('/account');
});
