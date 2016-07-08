<?php

namespace TOFU1;


use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\level\Level;
use pocketmine\block\Block;
use pocketmine\math\Vector3;
use pocketmine\event\player\PlayerInteractEvent;


class TOFU1 extends PluginBase implements Listener{
	
public function onEnable(){
$this->getServer()->getPluginManager()->registerEvents($this,$this);
$this->getLogger()->info(TextFormat::GREEN . "TOFU1を読み込みました(製作者:はるる早苗)");
$this->getLogger()->info(TextFormat::BLUE . "https://github.com/sanaehururu1200/TOFU1");
$this->getLogger()->info(TextFormat::RED . "二次配布はしないでください。");
}


public function onBlockTap(PlayerInteractEvent $event){
$level = $this->getServer()->getDefaultLevel();
$block = $event->getBlock();
$Player = $event->getPlayer();
$item = $Player->getInventory()->getItemInHand();
$id = $item->getID();

    if ($id == 277) {
    $Air = Block::get(0);
	$vector = new Vector3($block->x, $block->y, $block->z);
	$level->setBlock($vector, $Air);
    }
	 
}

}