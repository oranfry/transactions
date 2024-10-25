<?php

namespace Transactions\Linetype;

use simplefields\traits\SimpleFields;

class JarBankTransaction extends BankTransaction
{
    use SimpleFields;

    public function __construct()
    {
        parent::__construct();

        $this->simple_string('jar');
    }
}
