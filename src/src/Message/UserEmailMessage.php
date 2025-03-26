<?php

namespace App\Message;

use App\Entity\User;
use Symfony\Component\Messenger\Attribute\AsMessage;

#[AsMessage('async')]
class UserEmailMessage
{
  public function __construct(
      private User $user,
  ) {
  }

  public function getUser(): User
  {
    return $this->user;
  }
}