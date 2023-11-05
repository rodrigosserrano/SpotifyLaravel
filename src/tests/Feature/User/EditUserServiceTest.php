<?php
namespace Tests\Feature;

use App\Entities\User;
use App\Enums\UserStatusEnum;
use App\Livewire\Account\User\EditInfoUser;
use Illuminate\Support\Facades\Hash;
use Livewire\Livewire;

uses()->group('livewire', 'edit-user')->beforeEach(fn () =>
    $this->user = User::factory()->createOne(['user_status_id' => UserStatusEnum::Pending->value, 'password' => Hash::make($this->password = '1234567890123'), 'has_password' => true])
);

test('Edit user - Valid CPF and birth date', function (): void
{
    Livewire::actingAs($this->user)
        ->test(EditInfoUser::class)
        ->set('form.cpf', fake()->cpf(false))
        ->set('form.birth_date', fake()->date(max: '2004-01-01'))
        ->call('submitFormEdit')
        ->assertHasNoErrors([
            'form.cpf',
            'form.birth_date'
        ]);
});

test('Edit user - Invalid CPF and valid birth date', function (): void
{
    Livewire::actingAs($this->user)
        ->test(EditInfoUser::class)
        ->set('form.cpf', fake()->numerify('###########'))
        ->set('form.birth_date', fake()->date(max: '2004-01-01'))
        ->call('submitFormEdit')
        ->assertHasErrors([
            'form.cpf',
        ])->assertHasNoErrors([
            'form.birth_date',
        ]);
});

test('Edit user - Valid CPF and invalid birth date', function (string $date): void
{
    Livewire::actingAs($this->user)
        ->test(EditInfoUser::class)
        ->set('form.cpf', fake()->cpf(false))
        ->set('form.birth_date', $date)
        ->call('submitFormEdit')
        ->assertHasNoErrors([
            'form.cpf',
        ])
        ->assertHasErrors([
            'form.birth_date',
        ]);
})->with([
    'Greater than 2005' => [
        fn () => '2007-10-10'
    ],
    'Today' => [
        fn () => now()->format('Y-m-d')
    ],
]);

test('Edit user - Invalid CPF and invalid birth date', function (): void
{
    Livewire::actingAs($this->user)
        ->test(EditInfoUser::class)
        ->set('form.cpf', fake()->numerify('###########'))
        ->set('form.birth_date', now()->format('Y-m-d'))
        ->call('submitFormEdit')
        ->assertHasErrors([
            'form.birth_date',
            'form.cpf',
        ]);
});
