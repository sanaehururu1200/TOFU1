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


class TOFU1 extends PluginBase implements Listener{
	
public function onEnable(){
$this->getServer()->getPluginManager()->registerEvents($this,$this);
$this->getLogger()->info(TextFormat::GREEN . "TOFU1を読み込みました(製作者:はるる早苗)");
$this->getLogger()->info(TextFormat::BLUE . "https://github.com/sanaehururu1200/TOFU1");
$this->getLogger()->info(TextFormat::RED . "二次配布はしないでください。");
//config
if(!file_exists($this->getDataFolder())){//configを入れるフォルダが有るかチェック
    mkdir($this->getDataFolder(), 0744, true);//なければフォルダを作成
}
$this->config = new Config($this->getDataFolder() . "TOFU1.yml", Config::YAML);
}

//参加時にconfig作成

//ブロックタップ時の処理
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


//WORLDEDITの残骸
//いつか追加するかも
/*
//コマンド実行時の処理
public function onCommand(CommandSender $sender, Command $command, $label, array $args) {
	$pname=$sender->getName();
	switch (strtolower($command->getName())) {
		case "c":
			if($this->config->exists($pname."pos1")){
			$this->config->set($pname."pos1",null);
			}
			if($this->config->exists($pname."pos2")){
			$this->config->set($pname."pos2",null);
			}
			$this->config->save();
			$sender->sendMessage("[TOFUEDIT]データをクリアしました。");
			return true;
			break;
	
	
	
		//p1
		case "p1":
			if(!isset($args[0]) and !isset($args[1]) and !isset($args[2])) return false;
			

			
			//変数を分かりやすく
			$x=$args[0];
			$y=$args[1];
			$z=$args[2];
			
			//配列作成
			$data = array(
			"x" => "$x",
			"y" => "$y",
			"z" => "$z",
			);
			
			//debug
		foreach ($data as $pos) {
		if (ctype_digit($pos)) {
			$sender->sendMessage("[TOFUデバッグ]OK");
			} else {
        return false;
			}
		}	 		
			
			//シリアライズ(テキスト出力のため)
			$data1 = serialize($data);
			
			//保存
			$this->config->set($pname."pos1x", "$x");
			$this->config->save();
			
			$this->config->set($pname."pos1y", "$y");
			$this->config->save();
			
			$this->config->set($pname."pos1z", "$z");
			$this->config->save();
			
			$sender->sendMessage("[TOFUデバッグ]保存内容\n".$data1);
			
			return true;
			break;	
			
			
			
		//p2
		case "p2":
			if(!isset($args[0]) and !isset($args[1]) and !isset($args[2])) return false;
			
			//変数を分かりやすく
			$x=$args[0];
			$y=$args[1];
			$z=$args[2];
			
			//配列作成
			$data = array(
			"x" => "$x",
			"y" => "$y",
			"z" => "$z",
			);
			
			//シリアライズ(テキスト出力のため)
			$data1 = serialize($data);
			
			//保存
			$this->config->set($pname."pos2x", "$x");
			$this->config->save();
			
			$this->config->set($pname."pos2y", "$y");
			$this->config->save();
			
			$this->config->set($pname."pos2z", "$z");
			$this->config->save();
			
			$sender->sendMessage("[TOFUデバッグ]保存内容\n".$data1);
			
			return true;
			break;	
			
		
			
			//fill
			case "b":
			if(!isset($args[0])) return false;
			
			//POS1がnullではないか確認
			//短縮予定
			$p1sx=$this->config->get($pname."pos1x");
			if($p1sx==null){
			$sender->sendMessage("[TOFUEDIT]POS1のXが設定されていません");
			return true;
			}
			$p1sy=$this->config->get($pname."pos1y");
			if($p1sy==null){
			$sender->sendMessage("[TOFUEDIT]POS1のYが設定されていません");
			return true;
			}
			$p1sz=$this->config->get($pname."pos1z");
			if($p1sz==null){
			$sender->sendMessage("[TOFUEDIT]POS1のZが設定されていません");
			return true;
			}
			
			//POS2がnullではないか確認
			$p2sx=$this->config->get($pname."pos2x");
			if($p2sx==null){
			$sender->sendMessage("[TOFUEDIT]POS2のXが設定されていません");
			return true;
			}
			$p2sy=$this->config->get($pname."pos2y");
			if($p2sy==null){
			$sender->sendMessage("[TOFUEDIT]POS2のYが設定されていません");
			return true;
			}
			$p2sz=$this->config->get($pname."pos2z");
			if($p2sz==null){
			$sender->sendMessage("[TOFUEDIT]POS2のZが設定されていません");
			return true;
			}

			if($p1sx > $p2sx){
			$psx=$p1sx-$p2sx;
			}else{
			$psx=$p1sx-$p2sx;
			}

			for ($i = $p1sx; $i == $p2sx ; $i++) {
			echo $i;
			}
			
			return true;
			break;	

			}

	
	return false;
}
*/
}