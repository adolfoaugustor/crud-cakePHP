<?php
use Migrations\AbstractMigration;

class CreateCategories extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('categories');
        $table->addColumn('title', 'string',[
            'default' => null,
            'limit'   => 255,
            'null'    => false
        ]);
        $table->addColumn('description', 'text',[
            'default' => null,
            'null'    => true
        ]);
        $table->create();
    }
}
