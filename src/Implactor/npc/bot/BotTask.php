<?php
/*
*
*  _____                 _            _             
* |_   _|               | |          | |            
*   | |  _ __ ___  _ __ | | __ _  ___| |_ ___  _ __ 
*   | | | '_ ` _ \| '_ \| |/ _` |/ __| __/ _ \| '__|
*  _| |_| | | | | | |_) | | (_| | (__| || (_) | |   
* |_____|_| |_| |_| .__/|_|\__,_|\___|\__\___/|_|   
*                 | |                               
*                 |_|                               
*
* Implactor (1.4.x | 1.5.x)
* A plugin with some features for Minecraft: Bedrock!
* --- = ---
*
* Team: ImpladeDeveloped
* 2018 (c) Zadezter
*
*/
declare(strict_types=1);
namespace Implactor\npc\bot;

use pocketmine\entity\Entity;
use pocketmine\scheduler\Task;
use Implactor\MainIR;
use Implactor\npc\bot\BotHuman;

class BotTask extends Task{
	
	/** @var MainIR $plugin */
	/** @var Entity $entity */
	private $plugin, $entity;
	
	public function __construct(MainIR $plugin, Entity $entity){
		$this->plugin = $plugin;
		$this->entity = $entity;
		parent::__construct($plugin);
	}
	
	//- COMING SOON: 2 Bot Features -\\
	public function onRun(int $tick): void{
		$entity = $this->entity;
		if($entity instanceof BotHuman){
			$this->plugin->getScheduler()->scheduleRepeatingTask(new BotSneakTask($this->plugin, $entity), 50);
			$this->plugin->getScheduler()->scheduleRepeatingTask(new BotUnsneakTask($this->plugin, $entity), 50);
			$this->plugin->getScheduler()->scheduleRepeatingTask(new BotWalkingTask($this->plugin, $entity), 100);
			$this->plugin->getScheduler()->scheduleRepeatingTask(new BotParticle($this->plugin, $entity), 20);
			$this->plugin->getScheduler()->scheduleRepeatingTask(new BotParticleTask($this->plugin, $entity), 20);
			
     }
	}
}
