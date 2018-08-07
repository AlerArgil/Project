<?php
namespace App\Repositories;

use App\Photo;
use App\Ribbon;
class PhotoRepository
{
    /**
     * Получить все задачи заданного пользователя.
     *
     * @param  User  $user
     * @return Collection
     */
    public function forRibbon(Ribbon $ribbon)
    {
        return Photo::where('ribbon_id', $ribbon->id)
            ->orderBy('created_at', 'asc')
            ->get();
    }
    public function AllRibbon()
    {
        return Photo::get();
    }

}
/**
 * Created by PhpStorm.
 * User: moi rodnie
 * Date: 27.07.2018
 * Time: 13:18
 */