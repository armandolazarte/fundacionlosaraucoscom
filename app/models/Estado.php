<?php

class Estado extends Eloquent
{
    protected $table = 'estados';

    public function nombreconcepto()
    {
        return $this->hasOne('Concepto', 'id', 'concepto');
    }
}