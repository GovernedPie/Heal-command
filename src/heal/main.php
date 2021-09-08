<?php

namespace heal;

use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Server;
use pocketmine\utils\TextFormat;

class main extends PluginBase{
    public function onEnable(){
        $this->getLogger()->info("Heal Enabled");
    }
    public function onLoad(){
    $this->getLogger()->info("Heal Loading");
    }
    public function onDisable(){
        $this->getLogger()->info("Heal Disabled");
    }
    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool{
        switch ($cmd->getName()){
            case "heal":
                if(!$sender instanceof Player) return false;
                if (!$sender->isOp()){
                    $sender->sendMessage(TextFormat::RED . "You do not have permission to run this command!");
                    return false;
                }
                $sender->setHealth($sender->getHealth() + 6);
        }

        return false;
    }

}