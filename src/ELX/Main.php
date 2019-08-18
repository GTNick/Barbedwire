<?php  

declare(strict_types=1);

namespace ELX\Main;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\Level;
use pocketmine\entity\EntityEffect;
use pocketmine\entity\EntityEventInstance;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\entity\Living;

class Main extends PluginBase implements Listener{
          public function onLoad(){
                    $this->getLogger()->info("Plugin Loading");
          }
          public function onDisable(){
                    $this->getLogger()->info("Plugin Disabled");
          }
          
          public function onEnable(){
                    $this->getServer()->getPluginManager()->registerEvents($this,$this); 
                    $this->getLogger()->info("Plugin Enabled");
          }
          public function onMove(PlayerMoveEvent $event){
                    $player = $event->getPlayer();
                    if ($player->getLevel()->getBlock($player->asVector3())->getId() == BLOCK::COB_WEB){
                    $player->addEffect(new EffectInstance(Effect::getEffect(EFFECT::WITHER), 20 * 2));
                    }else{
                   
                    $player->removeEffect(getEffect(EFFECT::WITHER));
                    }
          }
}
