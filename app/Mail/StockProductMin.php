<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class StockProductMin extends Mailable
{
    use Queueable, SerializesModels;

    protected
        $product;

    /**
     * Create a new message instance.
     *
     * @param $product
     */
    public function __construct($product)
    {
        $this->product = $product;
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
        $subject = "Solicitação de Compra - " .$this->product->name;

        return $this->view('mail.stock_product_min')
            ->to($address,$name)
            ->subject($subject)
            ->with([
                'product' => $this->product->name,
                'min' => $this->product->min,
                'purchase' => $this->product->purchase,
                'qtd' => $this->product->qtd,
            ]);
    }
}
