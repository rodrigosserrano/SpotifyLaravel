<?php

namespace App\Livewire\Forms\Account\User;

use App\Dto\User\EditUserDTO;
use App\Services\User\EditUserService;
use Exception;
use Livewire\Attributes\Rule;
use Livewire\Form;

class EditInfoUserForm extends Form
{
    #[Rule('required|cpf|max:11', as: 'cpf', message: 'O campo :attribute não é válido.')]
    public string $cpf = '';

    #[Rule('date|before:01/01/2005', as: 'data de nascimento', message: 'O campo :attribute não é válido.')]
    public string $birth_date = '';

    /**
     * @throws Exception
     */
    public function saveChanges(): void
    {
        ((new EditUserService())->execute(new EditUserDTO(
            cpf: $this->cpf,
            birth_date: $this->birth_date,
        )));
    }
}
