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
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\Config;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\item\Item;
use pocketmine\utils\Random;
use pocketmine\level\particle\RedstoneParticle;
class TOFU1 extends PluginBase implements Listener {
    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(TextFormat::GREEN . "TOFU1を読み込みました(製作者:はるる早苗)");
        $this->getLogger()->info(TextFormat::BLUE . "https://github.com/sanaehururu1200/TOFU1");
        $this->getLogger()->info(TextFormat::RED . "二次配布はしないでください。");
    }
    //参加時にconfig作成
    //ブロックタップ時の処理
    public function onBlockTap(PlayerInteractEvent $event) {
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
    public function onMove(PlayerMoveEvent $event) {
        $player = $event->getPlayer();
        $level = $player->getLevel();
        $x = $player->x;
        $y = $player->y - 1;
        $z = $player->z;
        $vec = new Vector3($x, $y, $z);
        $block = $level->getBlock($vec);
        if ($block->getID() == 133) {
            $dir = $player->getDirectionVector();
            $player->setMotion($dir);
        }
        $Item = $player->getInventory()->getItemInHand();
        $id = $Item->getID();
        if ($id == 266) {
            $dir = $player->getDirectionVector();
            $player->setMotion($dir);
        }
        if ($id == 41) {
            $dir = $player->getDirectionVector();
            $player->setMotion($dir);
        }
        if ($block->getID() == 165) {
            $MotionJ = new Vector3(0, 0, 0);
            $jump = 1;
            $MotionJ->y = $jump;
            $player->setMotion($MotionJ);
        }
        if ($block->getID() == 42) {
            $MotionA = new Vector3(0, 0, 0);
            $dir = $player->getDirection();
            $move = 3;
            if ($dir === 0) {
                $MotionA->x = $move;
            }
            if ($dir === 1) {
                $MotionA->z = $move;
            }
            if ($dir === 2) {
                $MotionA->x = - $move;
            }
            if ($dir === 3) {
                $MotionA->z = - $move;
            }
            $player->setMotion($MotionA);
        }
    }
}
