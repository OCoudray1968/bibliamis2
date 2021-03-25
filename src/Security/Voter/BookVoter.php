<?php

namespace App\Security\Voter;

use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

class BookVoter extends Voter
{
    protected function supports($attribute, $subject)
    {
       
        return in_array($attribute, ['BOOK_MANAGE'])
            && $subject instanceof \App\Entity\Book;
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUser();
        if (!$user instanceof UserInterface) {
            return false;
        }

        switch ($attribute) {
             case 'BOOK_MANAGE':
                return $user->isVerified() && $user == $subject->getUser();
            
        }

        return false;
    }
}
