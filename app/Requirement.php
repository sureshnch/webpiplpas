<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\FilterByUser;

/**
 * Class Requirement
 *
 * @package App
 * @property enum $customer_name
 * @property integer $job_id
 * @property string $job_title
 * @property enum $job_type
 * @property text $description
 * @property enum $location
 * @property enum $department
 * @property enum $industry
 * @property enum $job_function
 * @property string $closing_date
 * @property integer $positions
 * @property string $skills
 * @property enum $experience_from_years
 * @property enum $experience_from_months
 * @property enum $experience_to_years
 * @property enum $experience_to_months
 * @property enum $salary_range
 * @property enum $availabity
 * @property integer $referal_fee
 * @property string $point_of_contact
 * @property string $email
 * @property double $code
 * @property integer $phone_number
 * @property string $skype_id
 * @property text $comment_box
 * @property string $created_by
*/
class Requirement extends Model
{
    use SoftDeletes, FilterByUser;

    protected $fillable = ['customer_name', 'job_id', 'job_title', 'job_type', 'description', 'location', 'department', 'industry', 'job_function', 'closing_date', 'positions', 'skills', 'experience_from_years', 'experience_from_months', 'experience_to_years', 'experience_to_months', 'salary_range', 'availabity', 'referal_fee', 'point_of_contact', 'email', 'code', 'phone_number', 'skype_id', 'comment_box', 'created_by_id'];
    public static $searchable = [
        'customer_name',
        'job_id',
        'job_title',
        'job_type',
        'location',
        'job_function',
        'closing_date',
        'experience_from_years',
        'experience_from_months',
        'experience_to_years',
        'experience_to_months',
        'salary_range',
        'availabity',
        'referal_fee',
        'point_of_contact',
        'email',
        'phone_number',
        'skype_id',
    ];
    

    public static $enum_customer_name = ["Please Select" => "Please Select"];

    public static $enum_job_type = ["Please Select" => "Please Select"];

    public static $enum_location = ["Please Select" => "Please Select"];

    public static $enum_department = ["Please Select" => "Please Select"];

    public static $enum_industry = ["Please Select" => "Please Select"];

    public static $enum_job_function = ["Please Select" => "Please Select"];

    public static $enum_experience_from_years = ["Please Select" => "Please Select"];

    public static $enum_experience_from_months = ["Please Select" => "Please Select"];

    public static $enum_experience_to_years = ["Please Select" => "Please Select"];

    public static $enum_experience_to_months = ["Please Select" => "Please Select"];

    public static $enum_salary_range = ["Please Select" => "Please Select"];

    public static $enum_availabity = ["Please Select" => "Please Select"];

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setJobIdAttribute($input)
    {
        $this->attributes['job_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setClosingDateAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['closing_date'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['closing_date'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getClosingDateAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setPositionsAttribute($input)
    {
        $this->attributes['positions'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setReferalFeeAttribute($input)
    {
        $this->attributes['referal_fee'] = $input ? $input : null;
    }

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
    public function setPhoneNumberAttribute($input)
    {
        $this->attributes['phone_number'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCreatedByIdAttribute($input)
    {
        $this->attributes['created_by_id'] = $input ? $input : null;
    }
    
    public function assigned_to_users()
    {
        return $this->belongsToMany(User::class, 'requirement_user');
    }
    
    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
    
}
