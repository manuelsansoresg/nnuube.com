<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TitleUser extends Model
{
    use HasFactory;
    protected $table = 'title_user';
    protected $fillable = [
        'user_id', 'descripcion', 'palabras_clave', 'titulo', 'heart', 'status_pay', 'token', 'imagen', 'slug',
        'sitio','facebook','twitter','instagram'];
        
    public static function random()
    {
        $user = TitleUser::select('id', 'titulo', 'imagen', 'slug')
            ->orderBy('heart', 'desc')
            ->limit(200)->get();

        return $user;
    }

    public static function search($title)
    {
      
        $title_user = TitleUser::where('titulo', 'like', "%$title%")
                        ->paginate(20);
        return $title_user;
    }

    public static function activateTitle($request)
    {
        $token = $request->token;
        $title = TitleUser::where('token', $token)->first();
        if ($title != null) {
            $title->status_pay = 1;
            $title->token      = '';
            $title->update();
        }
        return $title;
    }

}
