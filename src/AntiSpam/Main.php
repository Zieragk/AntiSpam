<?php

namespace AntiSpam;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\player\Player;

class Main extends PluginBase implements Listener {

    
    private array $cooldown = [];

    public function onEnable(): void {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("AntiSpam activado");
    }

    public function onChat(PlayerChatEvent $event): void {
        $player = $event->getPlayer();
        $name = $player->getName();
        $currentTime = time();

        
        if (isset($this->cooldown[$name])) {
            $lastTime = $this->cooldown[$name];
            $diff = $currentTime - $lastTime;

            
            if ($diff < 2) {
                $player->sendMessage("§cNo tan rápido gey §f, §eEspera un momento");
                $event->cancel();
                return;
            }
        }

        
        $this->cooldown[$name] = $currentTime;
    }
}