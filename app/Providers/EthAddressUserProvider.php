<?php
namespace App\Providers;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;

class EthAddressUserProvider extends EloquentUserProvider
{
    public function validateCredentials(UserContract $user, array $credentials)
    {

        $ethAddress = $credentials['eth_address'];

        return $user->getAuthPassword() == $ethAddress;
    }
}