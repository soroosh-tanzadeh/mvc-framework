<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class UsersMigration extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $table = $this->table('users');
        $table->addColumn('name', 'string')
            ->addColumn('username', 'string', ["limit" => 70])
            ->addColumn('password', 'string')
            ->addColumn('email', 'string')
            ->addIndex(['email', 'username'], ["unique" => true])
            ->create();
    }
}
