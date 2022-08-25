<?php

namespace ColorChat\Events;

use ColorChat\Main;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;

class ColorMessageEvent implements Listener {

    public function onChat(PlayerChatEvent $event): void {
        $player = $event->getPlayer();
        if(!isset(Main::getPlayers()[$player->getName()])) return;
        $event->setMessage(Main::getPlayers()[$player->getName()].$event->getMessage());
    }

}