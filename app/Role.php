<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\FilterByUser;

/**
 * Class Role
 *
 * @package App
 * @property string $title
 * @property string $created_by
*/
class Role extends Model
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
    
    public function permission()
    {
        return $this->belongsToMany(Permission::class, 'permission_role');
    }
    
    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
    
}
