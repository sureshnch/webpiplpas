<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\FilterByUser;

/**
 * Class Resume
 *
 * @package App
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property double $code
 * @property integer $mobile_number
 * @property string $pancard
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $educational_qualification
 * @property enum $primary_skills
 * @property string $sub_skills
 * @property enum $work_experience_years
 * @property enum $work_experience_months
 * @property string $relevant_experience
 * @property string $notice_period
 * @property string $prefered_location
 * @property enum $current_ctc_lacks
 * @property enum $current_ctc_thousands
 * @property enum $expected_ctc_lacks
 * @property enum $expected_ctc_thousands
 * @property string $upload_resume
 * @property text $comment_box
 * @property string $created_by
*/
class Resume extends Model
{
    use SoftDeletes, FilterByUser;

    protected $fillable = ['first_name', 'last_name', 'email', 'code', 'mobile_number', 'pancard', 'address', 'city', 'state', 'country', 'educational_qualification', 'primary_skills', 'sub_skills', 'work_experience_years', 'work_experience_months', 'relevant_experience', 'notice_period', 'prefered_location', 'current_ctc_lacks', 'current_ctc_thousands', 'expected_ctc_lacks', 'expected_ctc_thousands', 'upload_resume', 'comment_box', 'created_by_id'];
    public static $searchable = [
        'first_name',
        'email',
        'mobile_number',
        'pancard',
        'city',
        'state',
        'country',
        'educational_qualification',
        'sub_skills',
        'work_experience_years',
        'notice_period',
        'prefered_location',
        'current_ctc_lacks',
        'upload_resume',
    ];
    

    public static $enum_primary_skills = ["Please Select" => "Please Select"];

    public static $enum_work_experience_years = ["Please Select" => "Please Select"];

    public static $enum_work_experience_months = ["Please Select" => "Please Select"];

    public static $enum_current_ctc_lacks = ["Please Select" => "Please Select"];

    public static $enum_current_ctc_thousands = ["Please Select" => "Please Select"];

    public static $enum_expected_ctc_lacks = ["Please Select" => "Please Select"];

    public static $enum_expected_ctc_thousands = ["Please Select" => "Please Select"];

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setCodeAttribute($input)
    {
        if ($input != '') {
            $this->attributes['code'] = $input;
        } else {
            $this->attributes['code'] = null;
        }
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setMobileNumberAttribute($input)
    {
        $this->attributes['mobile_number'] = $input ? $input : null;
    }

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
