<?php

namespace ColorChat\Events;

use ColorChat\Main;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\utils\TextFormat;

class ColorMessageEvent implements Listener {

    public function onJoin(PlayerJoinEvent $event): void{
        $player = $event->getPlayer();
        if(isset(Main::$players[$player->getName()])){
            return;
        }else{
            Main::$players[$player->getName()] = TextFormat::WHITE;
        }
    }

    public function onChat(PlayerChatEvent $event): void {
        $player = $event->getPlayer();
        $event->setMessage(Main::$players[$player->getName()].$event->getMessage());
    }

}