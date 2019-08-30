<?php

namespace App\Jobs;

use App\Order_internal_detail as OrderModel;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ProcessOrderThumbnails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $order;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(OrderModel $order) 
    {
        $this->order = $order;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $order = $this->order;

        $orderdetail = new OrderModel();
        $orderdetail->order_internal_id = $order->order_internal_id;
        $orderdetail->stored_id = $order->stored_id;
        $orderdetail->prodect_id = $order->prodect_id;
        $orderdetail->product_parcode = $order->product_parcode;
        $orderdetail->color_id = $order->color_id;
        $orderdetail->style_id = $order->style_id;
        $orderdetail->size_id = $order->size_id;
        $orderdetail->number_size = $order->number_size;
        $orderdetail->pro_count = $order->pro_count;
        $orderdetail->pro_price = $order->pro_price;
        $orderdetail->pro_price_total = $order->pro_price_total;

        $orderdetail->save();
    }
}
