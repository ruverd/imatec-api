<?php

namespace App\Console\Commands;

use App\Mail\StockProductMax;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class StockProductPurchase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stock:product_purchase';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Estoque: Requisição de Compras';

    /**
     * StockProductPurchase constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Mail::send(new StockProductMax());
    }
}
