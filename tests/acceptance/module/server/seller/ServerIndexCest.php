<?php
/**
 * Server module for HiPanel
 *
 * @link      https://github.com/hiqdev/hipanel-module-server
 * @package   hipanel-module-server
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015-2019, HiQDev (http://hiqdev.com/)
 */

namespace ahnames\hipanel\tests\acceptance\module\server\seller;

use Codeception\Example;
use hipanel\helpers\Url;
use hipanel\tests\_support\Page\IndexPage;
use hipanel\tests\_support\Step\Acceptance\Seller;

class ServerIndexCest
{
    private IndexPage $index;

    public function _before(Seller $I)
    {
        $this->index = new IndexPage($I);
    }

    /**
     * @dataProvider ensureICanSeeBulkServerSearchBox
     */
    public function ensureIndexPageWorks(Seller $I, Example $serverIndexColumns): void
    {
        $I->login();
        $I->needPage(Url::to('@server'));
        $this->ensureICanSeeBulkServerSearchBox($serverIndexColumns);
    }

    private function ensureICanSeeBulkServerSearchBox($serverIndexColumns): void
    {
        $this->index->containsBulkButtons([
            'Basic actions',
        ]);

        foreach ($serverIndexColumns as $key => $columns) {
            $this->index->containsColumns($columns, $key);
        }
    }

    protected function bulkServerSearchProvider(): array
    {
        return [
            'common' => [
                'Name',
                'Client',
                'Reseller',
                'IPs',
                'Tariff',
                'Hardware Summary',
            ],
            'short' => [
                'IPs',
                'Client',
                'DC',
                'Name',
                'Hardware Summary',
            ],
            'admin' => [
                'DC',
                'Name',
                'Type',
                'IP',
                'MAC',
                'Hardware Summary',
            ],
        ];
    }
}
