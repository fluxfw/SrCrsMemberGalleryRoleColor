<?php

require_once __DIR__ . "/../vendor/autoload.php";

use srag\DIC\CrsMemberGalleryRoleColor\DICTrait;

/**
 * Class ilCrsMemberGalleryRoleColorUIHookGUI
 *
 * @author studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class ilCrsMemberGalleryRoleColorUIHookGUI extends ilUIHookPluginGUI {

	use DICTrait;
	const PLUGIN_CLASS_NAME = ilCrsMemberGalleryRoleColorPlugin::class;
	const COLOR_ADMIN_BACKGROUND = "#A5D7D2";
	const COLOR_ADMIN_FONT = "#000000";
	const COLOR_TUTOR_BACKGROUND = "#D2EBE9";
	const COLOR_TUTOR_FONT = "#000000";
	const COLOR_MEMBER_BACKGROUND = "#FFFFFF";
	const COLOR_MEMBER_FONT = "#000000";
	const CARD_TEMPLATE_ID = "src/UI/templates/default/Card/tpl.card.html";
	const TEMPLATE_GET = "template_get";
	const INIT = "init";
	const OBJECT_TYPE_CRS = "crs";
	const OBJECT_TYPE_GRP = "grp";
	/**
	 * @var bool[]
	 */
	protected static $load = [];


	/**
	 * ilCrsMemberGalleryRoleColorUIHookGUI constructor
	 */
	public function __construct() {

	}


	/**
	 * @param string $a_comp
	 * @param string $a_part
	 * @param array  $a_par
	 *
	 * @return array
	 */
	public function getHTML(/*string*/
		$a_comp, /*string*/
		$a_part, /*array*/
		$a_par = []): array {
		if (!self::$load[self::INIT]) {

			if (self::dic()->ctrl()->getCmdClass() === strtolower(ilUsersGalleryGUI::class)
				&& (empty(self::dic()->ctrl()->getCmd()) || self::dic()->ctrl()->getCmd() === "view")) {

				if ($a_par["tpl_id"] === self::CARD_TEMPLATE_ID && $a_part === self::TEMPLATE_GET) {

					self::$load[self::INIT] = true;

					$html = $a_par["html"];

					// Get User
					$matches = [];
					preg_match("/<dt>" . self::dic()->language()->txt("username") . "<\/dt>\n\t<dd>(.+)<\/dd>/", $html, $matches);
					if (is_array($matches) && count($matches) >= 2) {
						$user_login = $matches[1];
						$user_id = intval(ilObjUser::getUserIdByLogin($user_login));

						// Get course
						$container_ref_id = intval(filter_input(INPUT_GET, "ref_id"));

						switch (self::dic()->objDataCache()->lookupType(self::dic()->objDataCache()->lookupObjId($container_ref_id))) {
							case self::OBJECT_TYPE_GRP:
								$container = new ilObjGroup($container_ref_id);
								break;
							case self::OBJECT_TYPE_CRS:
								$container = new ilObjCourse($container_ref_id);
								break;
							default:
								return parent::getHTML($a_comp, $a_part, $a_par);
						}

						// Get role
						$roles = $container->getMembersObject()->getAssignedRoles($user_id);
						$role_id = current($roles);
						if (!empty($role_id)) {
							$role = ilObjRole::_getTranslation(self::dic()->objDataCache()->lookupTitle($role_id));

							// Role
							$role_html_pos = stripos($html, "</dl></div>");
							if ($role_html_pos !== false) {
								$role_tpl = self::plugin()->template("role.html");
								$role_tpl->setVariable("ROLE_TITLE", self::dic()->language()->txt("role") . ":");
								$role_tpl->setVariable("ROLE", $role);
								$html = substr($html, 0, ($role_html_pos - 1)) . self::output()->getHTML($role_tpl) . substr($html, $role_html_pos);
							}

							// Role color
							$role_color_background = $this->getRoleColorBackground($user_id, $container->getMembersObject());
							$role_color_font = $this->getRoleColorFont($user_id, $container->getMembersObject());
							$role_color_tpl = self::plugin()->template("role_color.html");
							$role_color_tpl->setVariable("BACKGROUND_COLOR", $role_color_background);
							$role_color_tpl->setVariable("FONT_COLOR", $role_color_font);
							$role_color_tpl_html = self::output()->getHTML($role_color_tpl);
							$html = str_replace('<div class="caption">', $role_color_tpl_html, $html);

							// Fix title
							//$title_tpl =self::plugin()->template("title.html");
							//$title_tpl_html = self::output()->getHTML($title_tpl);
							$title_tpl_html = file_get_contents(self::plugin()->directory() . "/templates/title.html");
							$html = str_replace('<dt>', $title_tpl_html, $html);
						}

						return [ "mode" => self::REPLACE, "html" => $html ];
					}
				}
			}
		}

		return parent::getHTML($a_comp, $a_part, $a_par);
	}


	/**
	 * @param int            $user_id
	 * @param ilParticipants $members
	 *
	 * @return string
	 */
	protected function getRoleColorBackground(int $user_id, ilParticipants $members): string {
		switch (true) {
			case $members->isAdmin($user_id):
				$color = self::COLOR_ADMIN_BACKGROUND;
				break;

			case $members->isTutor($user_id):
				$color = self::COLOR_TUTOR_BACKGROUND;
				break;

			case $members->isMember($user_id):
			default:
				$color = self::COLOR_MEMBER_BACKGROUND;
				break;
		}

		return $color;
	}


	/**
	 * @param int            $user_id
	 * @param ilParticipants $members
	 *
	 * @return string
	 */
	protected function getRoleColorFont(int $user_id, ilParticipants $members): string {
		switch (true) {
			case $members->isAdmin($user_id):
				$color = self::COLOR_ADMIN_FONT;
				break;

			case $members->isTutor($user_id):
				$color = self::COLOR_TUTOR_FONT;
				break;

			case $members->isMember($user_id):
			default:
				$color = self::COLOR_MEMBER_FONT;
				break;
		}

		return $color;
	}
}
