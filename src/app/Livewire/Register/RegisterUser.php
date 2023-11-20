<?php

namespace App\Livewire\Register;

use App\Dto\User\RegisterUserDTO;
use App\Entities\User;
use App\Exceptions\DtoInvalidDataException;
use App\Livewire\Forms\Register\RegisterForm;
use Exception;
use Illuminate\Contracts\Foundation\Application as ApplicationContract;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Validation\Validator;
use Livewire\Component;

class RegisterUser extends Component
{
    public RegisterForm $form;

    /**
     * @throws \Exception
     */
    public function submitFormRegister(): void
    {
        try {
            $this->form->save();
            $this->redirect(route('login'));
        } catch (Exception $e) {
            $this->withValidator(fn (Validator $validator) =>
                $validator->after(function ($validator) use ($e) {
                    if ($e instanceOf DtoInvalidDataException) {
                        $validator->errors()->add('register-user', $e->getDtoInfo());
                    }
                })
            )->validate();
        }
    }

    public function render(): View|Application|Factory|ApplicationContract
    {
        return view('livewire.register.register-user');
    }
}
