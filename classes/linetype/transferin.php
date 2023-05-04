<?php

namespace transactions\linetype;

class transferin extends transfer
{
    public function __construct()
    {
        parent::__construct();

        $this->table = 'transfer';

        unset($this->fields['to']);

        $this->fields['jar'] = fn ($records): string => $records['/']->tojar;
        $this->unfuse_fields['tojar'] = fn ($line): string => $line->jar;

        $this->fields['description'] = fn ($records): string => 'From ' . $records['/']->fromjar;
    }

    public function validate($line): array
    {
        $errors = parent::validate($line);

        if (!@$line->date) {
            $errors[] = 'no date';
        }

        if (!@$line->from) {
            $errors[] = 'no from jar';
        }

        if (!@$line->jar) {
            $errors[] = 'no jar';
        }

        if ((float) @$line->amount == 0) {
            $errors[] = 'no amount';
        }

        if ($line->amount < 0) {
            $errors[] = 'amount is negative';
        }

        return $errors;
    }
}
