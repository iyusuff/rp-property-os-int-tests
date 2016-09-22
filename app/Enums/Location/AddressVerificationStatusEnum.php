<?php
/**
 * Created by PhpStorm.
 * User: DHarter
 * Date: 4/11/2016
 * Time: 12:03 PM
 */

namespace App\Enums\Location;

use App\Enums\EnumAbstract;

/**
 * Class AddressVerificationStatus
 * @method static AddressVerificationStatusEnum EXACT()
 * @method static AddressVerificationStatusEnum INVALID()
 * @method static AddressVerificationStatusEnum VALID_ENHANCED()
 */
class AddressVerificationStatusEnum extends EnumAbstract
{
    const EXACT = 'exact';                      //There was an exact match found.
    const INVALID = 'invalid';                  // There was no match found.
    const VALID_ENHANCED = 'valid_enhanced';    // A match was found but an enhanced version of the
                                                // address being verified was additionally found.
}
