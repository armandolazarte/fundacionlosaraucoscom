<?php

class Pago extends Eloquent
{
    protected $table = 'pagos';

    public function formaPago()
    {
        return $this->hasOne('FormaPago', 'id', 'forma_pago');
    }
}