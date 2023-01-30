<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{
    public $name;
    public $email;
    public $password;

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
    ];

    public function register()
    {
        $this->validate();
    
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        session()->flash('message', '登録完了しました');

        return to_route('livewire-test.index');

    }

    public function render()
    {
        return view('livewire.register');
    }
}
