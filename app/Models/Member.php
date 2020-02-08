<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'RECORDNO',
        'OFFICECODE',
        'PFTITLE1',
        'PFNAME1',
        'PLNAME1',
        'HDAMT',
        'Investor_type',
        'ISINCODE',
        'HOLDERTYPE',
        'COOWNER',
        'BIRTHDATE',
        'HOLDERADDRESS1',
        'HOLDERADDRESS2',
        'HOLDERADDRESS3',
        'TELNO',
        'HDREGISTERDATE',
        'INTTITLE1',
        'INTNAME1',
        'CONDITIONINTNAME',
        'INTTITLE2',
        'INTNAME2',
        'BANKCODE',
        'BANKBRANCHCODE',
        'ACCOUNTTYPE',
        'ACCOUNTNO',
        'TAXPAYMENT',
        'TAXID',
        'HDBONDRECEIVING',
        'BATCHNAME',
        'REMARK',
        'SIGNATURE',
        'PARTICIPANTID',
        'NATIONALITYCODE',
        'POSTAL_ZIPCODE',
        'REFERENCETYPE',
        'REFERENCENO',
        'BROKERAGEACCOUNTID'
    ];
}
