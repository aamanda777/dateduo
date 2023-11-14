<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class SalvarEscolhasCasal extends AbstractMigration
{
    public function change(): void
    {
        $tabela = $this->table('escolhas_casal');
        $tabela->addColumn('id_casal', 'integer')
            ->addColumn('entrada_membro_1', 'string')
            ->addColumn('prato_principal_membro_1', 'string')
            ->addColumn('sobremesa_membro_1', 'string')
            ->addColumn('bebida_membro_1', 'string')
            ->addColumn('entrada_membro_2', 'string')
            ->addColumn('prato_principal_membro_2', 'string')
            ->addColumn('sobremesa_membro_2', 'string')
            ->addColumn('bebida_membro_2', 'string')
            ->addColumn('criado_em', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
            ->create();
    }
}
