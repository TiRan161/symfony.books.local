<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191122162533 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $tableAuthors = $schema->createTable('authors');
        $tableAuthors->addColumn('id','integer',['autoincrement' => true]);
        $tableAuthors->addColumn('name','string');
        $tableAuthors->addColumn('surname', 'string');
        $tableAuthors->setPrimaryKey(['id']);

        $tableBooks = $schema->createTable('books');
        $tableBooks->addColumn('id', 'integer', ['autoincrement' => true]);
        $tableBooks->addColumn('created_at', 'date');
        $tableBooks->addColumn('title', 'string');
        $tableBooks->addColumn('author_id', 'integer');
        $tableBooks->setPrimaryKey(['id']);
        $tableBooks->addForeignKeyConstraint($schema->getTable('authors'), ['author_id'],
            ['id'], ['NO ACTION', 'RESTRICT'], 'fk_book_author');

    }

    public function down(Schema $schema) : void
    {
        $schema->dropTable('authors');
        $schema->dropTable('books');
        // this down() migration is auto-generated, please modify it to your needs

    }
}
