<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class images extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'describe',
        'files_path',
        'files_name',
        'user_id'
    ];
    public function user()
{
    return $this->belongsTo(User::class);
}
}