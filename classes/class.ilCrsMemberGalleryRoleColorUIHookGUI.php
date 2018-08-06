<?php
require_once __DIR__ . "/../vendor/autoload.php";

/**
 * CrsMemberGalleryRoleColor UIHook-GUI
 */
class ilCrsMemberGalleryRoleColorUIHookGUI extends ilUIHookPluginGUI {

	protected $ctrl;


	/**
	 *
	 */
	public function __construct() {
		global $DIC;

		$this->ctrl = $DIC->ctrl();
	}


	/**
	 * @param string $a_comp
	 * @param string $a_part
	 * @param array  $a_par
	 *
	 * @return array
	 */
	public function getHTML($a_comp, $a_part, $a_par = []) {
		if ($this->ctrl->getCmdClass() === strtolower(ilUsersGalleryGUI::class)
			&& (empty($this->ctrl->getCmd()) || $this->ctrl->getCmd() === "view")) {
			if ($a_par["tpl_id"] === "src/UI/templates/default/Card/tpl.card.html" && $a_part === "template_get") {
				// TODO
			}
		}

		return array( "mode" => self::KEEP, "html" => "" );
	}


	/**
	 * @param string $a_comp
	 * @param string $a_part
	 * @param array  $a_par
	 */
	public function modifyGUI($a_comp, $a_part, $a_par = []) {

	}
}
