<?php

/**
 * Copyright (c) 2020 PJZ9n.
 *
 * This file is part of JoinMessage.
 *
 * JoinMessage is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * JoinMessage is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with JoinMessage. If not, see <http://www.gnu.org/licenses/>.
 */

declare(strict_types=1);

namespace pjz9n\joinmessage;

use pocketmine\event\EventPriority;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\plugin\MethodEventExecutor;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener
{
    public function onEnable(): void
    {
        $this->getServer()->getPluginManager()->registerEvent(
            PlayerJoinEvent::class,
            $this,
            EventPriority::NORMAL,
            new MethodEventExecutor("sendJoinMessage"),
            $this
        );
    }

    public function sendJoinMessage(PlayerJoinEvent $event): void
    {
        $player = $event->getPlayer();
        $name = $player->getName();
        $player->sendMessage("こんにちは！" . $name . "さん");
    }
}
