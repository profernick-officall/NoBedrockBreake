<?php

/**
 * @author profernick
 * @name   NoBedrockBreake
 * @main profernick\NoBedrockBreake
 * @api 4.0.0
 * @version 1.0.0
 */

namespace profernick;

use pocketmine\event\EventPriority;
use pocketmine\plugin\PluginBase;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\player\GameMode;
use pocketmine\block\VanillaBlocks;

class NoBedrockBreake extends PluginBase{

    public function onEnable(): void{
        $this->getServer()->getPluginManager()->registerEvent(BlockBreakEvent::class, function(BlockBreakEvent $event) : void{
            if($event->getBlock()->isSameType(VanillaBlocks::BEDROCK()) &&
               $event->getPlayer()->getGamemode() == GameMode::CREATIVE()){
                $event->cancel();
            }
        }, EventPriority::NORMAL, $this, true);
    }

}