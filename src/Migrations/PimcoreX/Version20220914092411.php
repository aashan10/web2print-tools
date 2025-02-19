<?php

/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Commercial License (PCL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 *  @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 *  @license    http://www.pimcore.org/license     GPLv3 and PCL
 */

namespace Web2PrintToolsBundle\Migrations\PimcoreX;

use Doctrine\DBAL\Schema\Schema;
use Pimcore\Db;
use Pimcore\Migrations\BundleAwareMigration;
use Web2PrintToolsBundle\FavoriteOutputDefinition\Dao;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20220914092411 extends BundleAwareMigration
{
    protected function getBundleName(): string
    {
        return 'Web2PrintToolsBundle';
    }

    public function up(Schema $schema): void
    {
        $db = Db::get();
        $this->addSql('alter table ' . $db->quoteIdentifier(DAO::TABLE_NAME) . ' modify o_classid varchar(50) null');
        $this->addSql('alter table ' . $db->quoteIdentifier(DAO::TABLE_NAME) . ' modify description varchar(255) null');
    }

    public function down(Schema $schema): void
    {
        $db = Db::get();
        $this->addSql('alter table ' . $db->quoteIdentifier(DAO::TABLE_NAME) . ' modify o_classid varchar(50) not null');
        $this->addSql('alter table ' . $db->quoteIdentifier(DAO::TABLE_NAME) . ' modify description varchar(255) not null;');
    }
}
