<?php

namespace Transactions\Linetype;

class JarTransaction extends Transaction
{
    public function __construct()
    {
        parent::__construct();

        $this->simple_string('jar');
    }

    function validate($line): array
    {
        $errors = parent::validate($line);

        if (!@$line->jar) {
            $errors[] = 'no jar';
        }

        return $errors;
    }
}
