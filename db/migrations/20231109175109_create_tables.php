<?php
use Phinx\Migration\AbstractMigration;

class CreateTables extends AbstractMigration
{
    public function change()
    {
        // Criação da tabela 'perfis_casal'
        $perfisCasal = $this->table('perfis_casal');
        $perfisCasal->addColumn('nome', 'string')
                    ->addTimestamps()
                    ->create();

        // Criação da tabela 'usuarios'
        $usuarios = $this->table('usuarios');
        $usuarios->addColumn('parceiro1_nome', 'string', ['null' => false])
                 ->addColumn('parceiro2_nome', 'string', ['null' => false])
                 ->addColumn('usuario_casal', 'string', ['null' => false])
                 ->addColumn('senha', 'string', ['null' => false])
                 ->addColumn('perfil_casal_id', 'integer')
                 ->addColumn('admin', 'boolean', ['default' => false])
                 ->addForeignKey('perfil_casal_id', 'perfis_casal', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
                 ->addIndex(['usuario_casal'], ['unique' => true])
                 ->addTimestamps()
                 ->create();
    }
}
