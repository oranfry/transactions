<?php

namespace OranFry\Transactions\Linetype;

use \OranFry\SimpleFields\Traits\SimpleFields;

class BankTransaction extends \OranFry\Jars\Core\Linetype
{
    use SimpleFields;

    public function __construct()
    {
        parent::__construct();

        $this->table = 'banktransaction';

        $this->simple_date('date');
        $this->simple_float('amount');
        $this->simple_string('other_party');
        $this->simple_string('description');
        $this->simple_string('reference');
        $this->simple_string('particulars');
        $this->simple_string('analysis_code');
        $this->simple_string('extra');
    }
}
