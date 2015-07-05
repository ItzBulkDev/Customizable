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
$this->getServer->getPluginManager->registerEvents($this, $this);
$this->getServer->info(TextFormat::BLUE."Customizable" . TextFormat::YELLOW . ": " . TextFormat::GREEN . "Enabled!");
$this->getServer->info(TextFormat::BLUE."Customizable" . TextFormat::YELLOW . ": " . TextFormat::GREEN . "Created by ItzBulkDev");
$whitelistMsg = $config->get("Whitelist-Message");
$bannedMsg = $config->get("Banned-Message");
$fullMsg = $config->get("Server-Full-Message");
}

public function onDisable(){
$this->saveDefaultConfig();
$this->getServer->info(TextFormat::BLUE."Customizable" . TextFormat::YELLOW . ": " . TextFormat::RED . "Disabled!");
$this->getServer->info(TextFormat::BLUE."Customizable" . TextFormat::YELLOW . ": " . TextFormat::RED . "Created by ItzBulkDev");
$whitelistMsg = $config->get("Whitelist-Message");
}

public function onPlayerJoin(PlayerJoinEvent $event){
  $p = $event->getPlayer();
  $pn = $p->getName();
    if($this->server->isWhitelisted(strtolower($p))){
      return true;
    }else{
      $p->kick($whitelistMsg);
    }else{
      if(count($this->server->getOnlinePlayers()) > $this->server->getMaxPlayers()){ 
        $p->kick($fullMsg);
      }
      }
}
}

