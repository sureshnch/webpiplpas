<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\FilterByUser;

/**
 * Class Permission
 *
 * @package App
 * @property string $title
 * @property string $created_by
*/
class Permission extends Model
{
    use FilterByUser;

    protected $fillable = ['title', 'created_by_id'];
    public static $searchable = [
    ];
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCreatedByIdAttribute($input)
    {
        $this->attributes['created_by_id'] = $input ? $input : null;
    }
    
    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
    
}
