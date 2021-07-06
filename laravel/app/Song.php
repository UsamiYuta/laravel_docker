<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Song extends Model
{
    /**
     * 状態定義
     */
    const STATUS = [
        1 => [ 'label' => '　1　', 'class' => 'label-primary' ],
        2 => [ 'label' => '　2　', 'class' => 'label-primary' ],
        3 => [ 'label' => '　3　', 'class' => 'label-primary' ],
    ];

    /**
     * 状態のラベル
     * @return string
     */
    
    public function getStatusLabelAttribute()
    {
        // 状態値
        $status = $this->attributes['status'];

        // 定義されていなければ空文字を返す
        if (!isset(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['label'];
    }
    
    public function getStatusClassAttribute()
    {
        // 状態値
        $status = $this->attributes['status'];

        // 定義されていなければ空文字を返す
        if (!isset(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['class'];
    }
    
    public function getFormattedDueDateAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['due_date'])
            ->format('Y/m/d');
    }
}