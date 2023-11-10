<?php

use Phinx\Migration\AbstractMigration;

class CriarTabelaCasais extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('casais');
        $table->addColumn('nome_membro_1', 'string')
            ->addColumn('nome_membro_2', 'string')
            ->addColumn('email', 'string') // Remova a opção 'unique' daqui
            ->addColumn('usuario', 'string') // Remova a opção 'unique' daqui
            ->addColumn('senha', 'string', ['limit' => 255, 'length' => 5])
            ->addIndex(['email'], ['unique' => true]) // Adicione esta linha para criar uma restrição única
            ->addIndex(['usuario'], ['unique' => true]) // Adicione esta linha para criar uma restrição única
            ->addTimestamps()
            ->create();
    }
}
