<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/**
 * Comando Artisan = php artisan make:model Client -m
 */
class Client extends Model
{
    public const TYPE_INDIVIDUAL = 'individual'; // físico
    public const TYPE_LEGAL      = 'legal'; // jurídico
    public const MARITAL_STATUS  = [
        1 => 'Solteiro',
        2 => 'Casado',
        3 => 'Divorciado'
    ];

    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'document_number',
        'email',
        'phone',
        'defaulter',
        'date_birth',
        'sex',
        'marital_status',
        'physical_desability',
        'company_name', // nome fantasia
        'client_type'
    ];

    public static function getClientType($type)
    {
        return $type == Client::TYPE_LEGAL ? $type : Client::TYPE_INDIVIDUAL;
    }
}
