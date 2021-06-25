<?php
namespace App\Services;
use App\Model\User;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialGoogleAccountService {
	public function createOrGetUser(ProviderUser $providerUser) {
		$account = User::whereProvider('google')->whereProviderId($providerUser->getId())->first();
		if ($account) {
			return $account;
		} else {
			$user = User::whereEmail($providerUser->getEmail())->first();
			if (!$user) {
				$name = explode(" ", $providerUser->getName());

				$user = User::create([
					'provider_id' => $providerUser->getId(),
					'provider' => 'google',
					'email' => $providerUser->getEmail(),
					'first_name' => $name[0],
					'last_name' => isset($name[1]) ? $name[1] : '',
					'password' => bcrypt(rand(1, 10000)),
				]);
			}
			return $user;
		}
	}
}
