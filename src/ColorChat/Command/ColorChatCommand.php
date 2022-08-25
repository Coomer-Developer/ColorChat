<?php

namespace ColorChat\Command;

use ColorChat\FormAPI\MenuForm;
use ColorChat\Main;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat;

class ColorChatCommand extends Command {

    public function execute(CommandSender $sender, string $commandLabel, array $args){
        if(!$sender instanceof Player) return;
        if(!$sender->hasPermission("use.colorchat.command")) return;
        $form = new MenuForm(function (Player $player, $data){
            if($data === null) return;
            Main::getPlayers()[$player->getName()] = $data;
        });
        foreach(TextFormat::COLORS as $color => $format){
            $form->addButton($format."!Click to select¡", -1, "", $format);
        }
        $sender->sendForm($form);
    }

}
