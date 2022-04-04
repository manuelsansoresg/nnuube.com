<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TitleRating extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_user_id', 'user_id', 'rate'
    ];

    public static function saveEdit($title_id, $rate)
    {
        $get_rate = TitleRating::where('title_user_id', $title_id)->first();
        $data_rate = array(
            'title_user_id' => $title_id,
            'user_id' => Auth::user()->id,
            'rate' => $rate,
            
        );
        if ($get_rate === null) {
            $get_rate = new TitleRating($data_rate);
            $get_rate->save();
        } else {
            $get_rate->fill($data_rate);
            $get_rate->update();
        }

        return $get_rate;
    }

    public static function getRateByTitle($title_id)
    {
        $rate = TitleRating::select(DB::raw('COUNT(rate) as rating_count, SUM(rate) as rating_total'))
                ->where('title_user_id', $title_id)->first();
        if ($rate !== null) {
            try {
                round(($rate->rating_total / $rate->rating_count), 1);
            } catch (\Exception $e) {
                //throw $th;
            }
            
        }
        return 0;
    }
}
