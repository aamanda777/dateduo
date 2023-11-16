<?php
use Phinx\Migration\AbstractMigration;

class CriarTabelaCasais extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('casais');
        $table->addColumn('nome_membro_1', 'string')
            ->addColumn('nome_membro_2', 'string')
            ->addColumn('email', 'string')
            ->addColumn('usuario', 'string')
            ->addColumn('senha', 'string', ['limit' => 255])
            ->addIndex(['email'], ['unique' => true])
            ->addIndex(['usuario'], ['unique' => true])
            ->addTimestamps()
            ->create();
    }
}
