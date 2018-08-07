<?php
namespace App\Repositories;

use App\User;
use App\Ribbon;

class RibbonRepository
{
    /**
     * Получить все задачи заданного пользователя.
     *
     * @param  User  $user
     * @return Collection
     */
    public function forUser(User $user)
    {
        return Ribbon::where('user_id', $user->id)
            ->orderBy('created_at', 'asc')
            ->get();
    }
    public function AllUser()
    {
        return Ribbon::get();
    }
}
/**
 * Created by PhpStorm.
 * User: moi rodnie
 * Date: 27.07.2018
 * Time: 13:18
 */