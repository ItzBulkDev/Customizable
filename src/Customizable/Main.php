<?php

//Created By ItzBulkDev

namespace Customizable;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\player\PlayerKickEvent;

class Main extends PluginBase implements Listener{

public function onEnable(){
$this->saveDefaultConfig();
$config = $this->getConfig();
$this->getServer()->getPluginManager()->registerEvents($this, $this);
$this->getLogger()->info(TextFormat::BLUE."Customizable" . TextFormat::YELLOW . ": " . TextFormat::GREEN . "Enabled!");
$this->getLogger()->info(TextFormat::BLUE."Customizable" . TextFormat::YELLOW . ": " . TextFormat::GREEN . "Created by ItzBulkDev");
$whitelistMsg = $config->get("Whitelist-Message");
$bannedMsg = $config->get("Banned-Message");
$fullMsg = $config->get("Server-Full-Message");
}

public function onDisable(){
$this->saveDefaultConfig();
$this->getLogger()->info(TextFormat::BLUE."Customizable" . TextFormat::YELLOW . ": " . TextFormat::RED . "Disabled!");
$this->getLogger()->info(TextFormat::BLUE."Customizable" . TextFormat::YELLOW . ": " . TextFormat::RED . "Created by ItzBulkDev");
}

public function onPlayerJoin(PlayerJoinEvent $event){
  $p = $event->getPlayer();
  $pn = $p->getName();
    if($this->getServer()->isWhitelisted(strtolower($p)) == false){
    $p->kick($WhitelistMsg);
    }else{
      if(count($this->getServer()->getOnlinePlayers()) > $this->getServer()->getMaxPlayers()){ 
        $p->kick($fullMsg);
      }
      }
}
}

