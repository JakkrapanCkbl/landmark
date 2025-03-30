<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;


    protected $fillable = [
        'id', 'jobcode', 'clientcode', 'reportcode','projectname', 
        'jobsize', 'jobtype', 'client', 'client_note', 'customer_company', 'customer_address', 
        'customer', 'prop_type', 'prop_size', 'proplocation', 'lcduedate',
        'headvaluer_n', 'valuer', 'valuer_n', 'percentfinish',
        'startdate', 'inspectiondate', 'lcduedate', 'clientduedate', 'created_at', 'updated_at',
        'propd_id', 'province_code', 'amphure_code', 'district', 'obj_id', 'marketvalue', 'marketvalue_unit',
        'lat', 'lng', 'valuationfee', 'remark', 'easydiff',
        'valuationfee_case', 'urgent', 'canceled', 'withcd', 'room_sum',
        'default_coordinates', 'job_status', 'job_gps', 'obj_method',  
        'prop_type2', 'prop_type2_note', 
        'link_checked', 'link_checked_by', 'link_checked_date',
        'print_checked', 'print_checked_by', 'print_checked_date', 
        'file_checked', 'file_checked_by', 'file_checked_date',
        'job_checked', 'checker', 'report_checked_date', 
        'approve_checked', 'headvaluer', 'approve_checked_date', 
        'land_size'
    ];

}
