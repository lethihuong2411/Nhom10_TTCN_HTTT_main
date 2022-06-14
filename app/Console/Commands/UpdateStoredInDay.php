<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Store;
use App\Models\HistoryStoredInDay;

class UpdateStoredInDay extends Command
{
    /**
     * Tên và chữ ký của lệnh console
     *
     * @var string
     */
    protected $signature = 'update:stored';

    /**
     * Mô tả lệnh giao diện điều khiển.
     *
     * @var string
     */
    protected $description = 'Cập nhật sản phẩm theo ngày, Lưu trữ lịch sử sản phẩm';

    /**
     * Tạo một phiên bản lệnh mới. 
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Thực hiện lệnh console.
     *
     * @return int
     */
    public function handle()
    {
        $stored_in_day = Store::whereRaw('DATEDIFF(now(), created_at)')
                                ->get();
            foreach ($stored_in_day as $s_i_d ) {
                
                $history_stored = new HistoryStoredInDay();
                $stored = Store::find($s_i_d->id);

                $history_stored->id_stored = $s_i_d->id;
                $history_stored->stored_product_in_day = $stored->stored_product;
                $history_stored->created_at = $stored->created_at; 
                $history_stored->save();
                
                $stored->all_product_in_store = '0';
                $stored->created_at = now();
                $stored->save();
            }
        $this->info('Success!');    
    }
}
