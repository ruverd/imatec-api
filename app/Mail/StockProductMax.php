<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class StockProductMax extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * StockProductMax constructor.
     */
    public function __construct()
    {

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'ruverd@gmail.com';
        $name = 'Ruver Dornelas';
        $subject = "Excedente de Produto - teste" ;

        return $this->view('mail.stock_product_max')
            ->to($address,$name)
            ->subject($subject)
            ->with([
                'product' => 'teste',
                'max' => 3,
                'qtd' => 5,
            ]);
    }
}
