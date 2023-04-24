<?php

namespace transactions\linetype;

class transferout extends transfer
{
    public function __construct()
    {
        parent::__construct();

        $this->table = 'transfer';
        $this->fields['superjar'] = fn ($records) => $records['/']->fromjar == 'vault' ? 'longterm' : 'daily';

        unset($this->fields['from']);

        $this->fields['jar'] = fn ($records) => $records['/']->fromjar;
        $this->unfuse_fields['fromjar'] = fn ($line) => $line->jar;

        $this->fields['amount'] = fn ($records) : string => bcsub('0', $records['/']->amount ?? '0', 2);
        $this->unfuse_fields['amount'] = fn ($line) : string => bcsub('0', $line->amount ?? '0', 2);

        $this->fields['description'] = fn ($records) : string => 'To ' . $records['/']->tojar;
    }

    public function validate($line)
    {
        $errors = parent::validate($line);

        if (!@$line->date) {
            $errors[] = 'no date';
        }

        if (!@$line->jar) {
            $errors[] = 'no jar';
        }

        if (!@$line->to) {
            $errors[] = 'no to jar';
        }

        if ((float) @$line->amount == 0) {
            $errors[] = 'no amount';
        }

        if ($line->amount > 0) {
            $errors[] = 'amount is positive';
        }

        return $errors;
    }
}
