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
        if(!$sender->hasPermission("use.colorchat.command") && !$sender->getServer()->isOp($sender->getName())) return;
        $form = new MenuForm(function (Player $player, $data){
            if($data === null) return;
            Main::$players[$player->getName()] = $data;
            $player->sendMessage(TextFormat::colorize("&7You Have Selected {$data}Color"));
        });
        $form->setTitle(TextFormat::colorize("&l&b > ColorChat Selector < "));
        foreach(TextFormat::COLORS as $color => $format){
            $form->addButton(TextFormat::BOLD.$format."Click To Select", -1, "", $format);
        }
        $sender->sendForm($form);
    }

}