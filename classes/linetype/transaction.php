<?php

namespace transactions\linetype;

use simplefields\traits\SimpleFields;

class transaction extends \jars\Linetype
{
    use SimpleFields;

    public function __construct()
    {
        $this->table = 'transaction';

        $this->simple_date('date');
        $this->simple_string('description');
        $this->simple_float('amount', 2);
    }

    public function validate($line): array
    {
        $errors = parent::validate($line);

        if (@$line->date == null) {
            $errors[] = 'no date';
        }

        if (@$line->amount == null) {
            $errors[] = 'no amount';
        }

        return $errors;
    }
}
