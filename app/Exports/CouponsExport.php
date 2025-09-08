<?php

namespace App\Exports;

use App\Models\Coupon;

use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings; 
use Maatwebsite\Excel\Concerns\ShouldAutoSize; 

class CouponsExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $coupons;

    public function __construct($coupons)
    {
        $this->coupons = $coupons;
    }

 
    public function collection()
    {
        return $this->coupons->map(function ($coupon) {
            return [
                'id' => $coupon->id,
                'code' => $coupon->code,
                'user_name' => $coupon->user ? $coupon->user->name : '-',
                'name' => $coupon->group->name,
                'points' => $coupon->group->points,
                'type_group' => $coupon->group->type_group,
                'status' => $coupon->status ?? '-', 
                'created_at' => $coupon->created_at->format('Y-m-d H:i'),
            ];
        });
    }

    

    public function headings(): array
    {
        return [
            'ID',
            'Code',
            'User Name',
            'group name',
            'Coupon Price',
            'type_group',
            'Code Status',
            'Date Created'
        ];
    }

}

