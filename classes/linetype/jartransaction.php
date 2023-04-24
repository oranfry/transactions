<?php

namespace transactions\linetype;

class jartransaction extends transaction
{
    public function __construct()
    {
        parent::__construct();

        $this->simple_strings('jar');
    }

    function validate($line)
    {
        $errors = parent::validate($line);

        if (!@$line->jar) {
            $errors[] = 'no jar';
        }

        return $errors;
    }
}
