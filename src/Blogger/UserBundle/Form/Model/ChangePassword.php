<?php

/*
 * Copyright (C) 2014 KULDIP PIPALIYA <kuldipem@gmail.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace Blogger\UserBundle\Form\Model;

use Symfony\Component\Security\Core\Validator\Constraints as SecurityAssert;
use Symfony\Component\Validator\Constraints as Assert;

class ChangePassword {

    /**
     *
     * @SecurityAssert\UserPassword(message="Your current password is invalid !") 
     */
    protected $oldPassword;

    /**
     *
     * @Assert\Length(min=6, max=18, minMessage="Password should be 6 character long.", maxMessage="Password can't long than 18 character.") 
     */
    protected $newPassword;

    public function getOldPassword() {
        return $this->oldPassword;
    }

    public function getNewPassword() {
        return $this->newPassword;
    }

    public function setOldPassword($oldPassword) {
        $this->oldPassword = $oldPassword;
    }

    public function setNewPassword($newPassword) {
        $this->newPassword = $newPassword;
    }

}
