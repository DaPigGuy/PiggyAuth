<?php

namespace PiggyAuth\Commands;

use PiggyAuth\Main;

use pocketmine\command\CommandSender;
use pocketmine\Player;

/**
 * Class LogoutCommand
 * @package PiggyAuth\Commands
 */
class LogoutCommand extends PiggyAuthCommand
{
    /**
     * LogoutCommand constructor.
     * @param string $name
     * @param Main $plugin
     */
    public function __construct($name, $plugin)
    {
        parent::__construct($name, $plugin);
        $this->setDescription("Logout your account");
        $this->setUsage("/logout");
        $this->setPermission("piggyauth.command.logout");
    }

    /**
     * @param CommandSender $sender
     * @param string $currentAlias
     * @param array $args
     * @return bool
     */
    public function execute(CommandSender $sender, string $currentAlias, array $args)
    {
        if (!$this->testPermission($sender)) {
            return true;
        }
        if (!$sender instanceof Player) {
            $sender->sendMessage($this->getPlugin()->getLanguageManager()->getMessage($sender, "use-in-game"));
            return false;
        }
        $this->getPlugin()->logout($sender, false);
        return true;
    }
}
