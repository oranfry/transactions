<?php

namespace transactions\linetype;

abstract class transfer extends \jars\Linetype
{
    public function __construct()
    {
        $this->table = 'transfer';

        $this->simple_strings('date');

        $this->fields['from'] = fn ($records) => $records['/']->fromjar;
        $this->fields['to'] = fn ($records) => $records['/']->tojar;
        $this->simple_float('amount', 2);
        $this->fields['account'] = fn ($records) : string => 'jartransfer';

        $this->unfuse_fields['fromjar'] = fn ($line) => $line->from;
        $this->unfuse_fields['tojar'] = fn ($line) => $line->to;
    }
}
