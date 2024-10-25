<?php

namespace Transactions\Linetype;

use simplefields\traits\SimpleFields;

abstract class Transfer extends \jars\Linetype
{
    use SimpleFields;

    public function __construct()
    {
        $this->table = 'transfer';

        $this->simple_date('date');

        $this->fields['from'] = fn ($records): string => $records['/']->fromjar;
        $this->fields['to'] = fn ($records): string => $records['/']->tojar;
        $this->simple_float('amount', 2);
        $this->fields['account'] = fn ($records): string => 'jartransfer';

        $this->unfuse_fields['fromjar'] = fn ($line): string => $line->from;
        $this->unfuse_fields['tojar'] = fn ($line): string => $line->to;
    }
}
