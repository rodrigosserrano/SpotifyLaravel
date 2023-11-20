<?php
namespace Tests\Feature;

use App\Entities\User;
use App\Enums\UserStatusEnum;
use Illuminate\Support\Facades\Hash;
use Livewire\Livewire;

uses()->group('livewire', 'register-user')
    ->beforeEach(function (): void
    {
        $this->user = User::factory()->createOne([
            'user_status_id' => UserStatusEnum::Pending->value,
            'password' => Hash::make('1234567890123'),
            'has_password' => true
        ]);
    });

test('Access register page when logged', function (): void
{
    $this->actingAs($this->user)
        ->get(route('register'))
        ->assertRedirect(route('account'));
});

test('With existing email', function (): void
{
    Livewire::test('register.register-user')
        ->set('form.first_name', fake()->firstName())
        ->set('form.last_name', fake()->lastName())
        ->set('form.email', $this->user->email)
        ->set('form.cpf', fake()->cpf(false))
        ->set('form.password', '123456780abc')
        ->set('form.password_confirmation', '123456780abc')
        ->set('form.birth_date', fake()->date(max: '2004-01-01'))
        ->call('submitFormRegister')
        ->assertHasErrors();
});

test('With existing cpf', function (): void
{
    Livewire::test('register.register-user')
        ->set('form.first_name', fake()->firstName())
        ->set('form.last_name', fake()->lastName())
        ->set('form.email', fake()->email)
        ->set('form.cpf', $this->user->cpf)
        ->set('form.password', '123456780abc')
        ->set('form.password_confirmation', '123456780abc')
        ->set('form.birth_date', fake()->date(max: '2004-01-01'))
        ->call('submitFormRegister')
        ->assertHasErrors();
});

test('Invalid passwords', function (): void
{
    Livewire::test('register.register-user')
        ->set('form.first_name', fake()->firstName())
        ->set('form.last_name', fake()->lastName())
        ->set('form.email', fake()->email)
        ->set('form.cpf', fake()->cpf(false))
        ->set('form.password', '123456780abc')
        ->set('form.password_confirmation', '111111111111')
        ->set('form.birth_date', fake()->date(max: '2004-01-01'))
        ->call('submitFormRegister')
        ->assertHasErrors();
});

test('Correct data', function (): void
{
    Livewire::test('register.register-user')
        ->set('form.first_name', fake()->firstName())
        ->set('form.last_name', fake()->lastName())
        ->set('form.email', fake()->email)
        ->set('form.cpf', fake()->cpf(false))
        ->set('form.password', '123456780abc')
        ->set('form.password_confirmation', '123456780abc')
        ->set('form.birth_date', fake()->date(max: '2004-01-01'))
        ->call('submitFormRegister')
        ->assertHasNoErrors();
});
