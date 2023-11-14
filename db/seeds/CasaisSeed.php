<?php

declare(strict_types=1);


use Phinx\Seed\AbstractSeed;

class CasaisSeed extends AbstractSeed
{
    public function run(): void
    {
        $data = [
            [
                'nome_membro_1' => 'Amanda',
                'nome_membro_2' => 'Vini',
                'email' => 'amanda@gmail.com',
                'usuario' => 'amanda',
                'senha' => password_hash('a1234', PASSWORD_DEFAULT),
            ],
            [
                'nome_membro_1' => 'Carlos',
                'nome_membro_2' => 'Ana',
                'email' => 'carlos_ana@gmail.com',
                'usuario' => 'carlos_ana',
                'senha' => password_hash('a1234', PASSWORD_DEFAULT),
            ],
            [
                'nome_membro_1' => 'Pedro',
                'nome_membro_2' => 'Larissa',
                'email' => 'pedro_larissa@gmail.com',
                'usuario' => 'pedro_larissa',
                'senha' => password_hash('a1234', PASSWORD_DEFAULT),
            ],
            [
                'nome_membro_1' => 'Fernando',
                'nome_membro_2' => 'Juliana',
                'email' => 'fernando_juliana@gmail.com',
                'usuario' => 'fernando_juliana',
                'senha' => password_hash('a1234', PASSWORD_DEFAULT),
            ],
        ];
        $table = $this->table('casais');
        $table->insert($data)->save();
    }
}
