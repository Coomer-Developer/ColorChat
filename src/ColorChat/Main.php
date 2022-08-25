<?php

namespace ColorChat;

use ColorChat\Command\ColorChatCommand;
use ColorChat\Events\ColorMessageEvent;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase {

    public static Main $plugin;

    public static array $players = [];

    protected function onEnable(): void {
        self::$plugin = $this;
        $this->getServer()->getPluginManager()->registerEvents(new ColorMessageEvent(), $this);
        $this->getServer()->getCommandMap()->register("colorchat", new ColorChatCommand("colorchat", "Open ColorChat Form", null, ["cc"]));
    }

    public static function getPlugin(): Main {
        return self::$plugin;
    }

}