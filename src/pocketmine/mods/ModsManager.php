<?php

namespace pocketmine\mods;

use pocketmine\mods\Addon;
use pocketmine\mods\ResourcePack;
use pocketmine\Server;

class ModsManager {
	
	const MODS_DIR = "mods/"; // Mods folder located in server root
	
	/** @var ResourcePack[] */
	private $resourcePacks = [];
	/** @var Addon[] */
	private $addons = [];
	/** @var boolean */
	private $isModsRequired = false;

    public ResourcePack $pack;
	
	public function __construct() {
		$server = Server::getInstance();
		$this->isModsRequired = $server->getConfigBoolean("mods-required", false);
		$modsConfig = $server->getConfigString("mods-enabled", "false");
		if (empty($modsConfig)) {
			return;
        }

        $mods = array_diff(scandir(self::MODS_DIR), ["..", "."]);
        $modsName = $mods;

		foreach ($modsName as $modName) {
			if (!is_file(self::MODS_DIR . $modName)) {
				$server->getLogger()->warning("Mod with name" . " $modName " . "doesn't exists.");
			} else {
                try {
                    $resourcePack = new ResourcePack(self::MODS_DIR . $modName, $modName);
                    if (!isset($this->resourcePacks[$resourcePack->getPackId()])) {
                        $this->resourcePacks[$resourcePack->getPackId()] = $resourcePack;
                        $server->getLogger()->info("Loaded: " . $modName);
                    } else {
                        $server->getLogger()->warning("Resource pack: " . $modName . " Error: UUID duplication");
                    }
                } catch (\Exception $e) {
                    $server->getLogger()->warning("Resource pack: " . $modName . " Error: " . $e->getMessage());
                }
            }
		}
	}
	
	/**
	 * @return boolean
	 */
	public function isModsRequired() {
		return $this->isModsRequired;
	}
	
	/**
	 * @return ResourcePack[]
	 */
	public function getResourcePacks() {
		return $this->resourcePacks;
	}
	
	/**
	 * @return Addon[]
	 */
	public function getAddons() {
		return $this->addons;
	}
	
	/**
	 * @return ResourcePack
	 */
	public function getResourcePackById($id) {
		return isset($this->resourcePacks[$id]) ? $this->resourcePacks[$id] : null;
	}
	
}
