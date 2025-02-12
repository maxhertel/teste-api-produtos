<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
           // Cria um usuário padrão
           User::create([
            'name' => 'Usuário Teste',
            'email' => 'usuario@exemplo.com',
            'password' => Hash::make('senha123'), // Senha criptografada
        ]);

        $this->command->info('Usuário padrão criado com sucesso!');
    }
}
