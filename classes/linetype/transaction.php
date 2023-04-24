<?php

namespace transactions\linetype;

class transaction extends \jars\Linetype
{
    public function __construct()
    {
        $this->table = 'transaction';

        $this->simple_string('date');
        $this->simple_string('description');
        $this->simple_float('amount', 2);
    }

    public function validate($line)
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
