<?php

require_once __DIR__ . "/../vendor/autoload.php";

use srag\DIC\CrsMemberGalleryRoleColor\DICTrait;
use srag\UNIBAS\Plugins\CrsMemberGalleryRoleColor\Utils\CrsMemberGalleryRoleColorTrait;

/**
 * Class ilCrsMemberGalleryRoleColorUIHookGUI
 *
 * @author studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class ilCrsMemberGalleryRoleColorUIHookGUI extends ilUIHookPluginGUI {

	use DICTrait;
	use CrsMemberGalleryRoleColorTrait;
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
					preg_match("/<dt>" . self::plugin()->translate("username", "", [], false) . "<\/dt>\n\t<dd>(.+)<\/dd>/", $html, $matches);
					if (is_array($matches) && count($matches) >= 2) {
						$user_login = $matches[1];
						$user_id = intval(ilObjUser::getUserIdByLogin($user_login));

						// Get course
						$course_ref_id = intval(filter_input(INPUT_GET, "ref_id"));
						$course = new ilObjCourse($course_ref_id);

						// Get role
						$roles = $course->getMembersObject()->getAssignedRoles($user_id);
						$role_id = current($roles);
						if (!empty($role_id)) {
							$role = ilObjRole::_getTranslation(ilObjRole::_lookupTitle($role_id));

							// Role
							$role_html_pos = stripos($html, "</dl></div>");
							if ($role_html_pos !== false) {
								$role_tpl = self::plugin()->template("role.html");
								$role_tpl->setVariable("ROLE_TITLE", self::plugin()->translate("role"));
								$role_tpl->setVariable("ROLE", $role);
								$html = substr($html, 0, ($role_html_pos - 1)) . $role_tpl->get() . substr($html, $role_html_pos);
							}

							// Role color
							$role_color_background = $this->getRoleColorBackground($user_id, $course->getMembersObject());
							$role_color_font = $this->getRoleColorFont($user_id, $course->getMembersObject());
							$role_color_tpl = self::plugin()->template("role_color.html");
							$role_color_tpl->setVariable("BACKGROUND_COLOR", $role_color_background);
							$role_color_tpl->setVariable("FONT_COLOR", $role_color_font);
							$role_color_tpl_html = $role_color_tpl->get();
							$html = str_replace('<div class="caption">', $role_color_tpl_html, $html);

							// Fix title
							//$title_tpl =self::plugin()->template("title.html");
							//$title_tpl_html = $title_tpl->get();
							$title_tpl_html = file_get_contents(self::plugin()->directory() . "/templates/title.html");
							$html = str_replace('<dt>', $title_tpl_html, $html);
						}

						return [ "mode" => self::REPLACE, "html" => $html ];
					}
				}
			}
		}

		return [ "mode" => self::KEEP, "html" => "" ];
	}


	/**
	 * @param int                  $user_id
	 * @param ilCourseParticipants $members
	 *
	 * @return string
	 */
	protected function getRoleColorBackground(int $user_id, ilCourseParticipants $members): string {
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
	 * @param int                  $user_id
	 * @param ilCourseParticipants $members
	 *
	 * @return string
	 */
	protected function getRoleColorFont(int $user_id, ilCourseParticipants $members): string {
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
