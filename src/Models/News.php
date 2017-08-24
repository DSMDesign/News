<?php namespace Southcoastweb\News\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\User;

class News extends Model {

    use SoftDeletes;

	protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
