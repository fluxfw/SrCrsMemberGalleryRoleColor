<?php
require_once __DIR__ . "/../vendor/autoload.php";

/**
 * CrsMemberGalleryRoleColor UIHook-GUI
 */
class ilCrsMemberGalleryRoleColorUIHookGUI extends ilUIHookPluginGUI {

	use srag\DIC\DICTrait;
	const PLUGIN_CLASS_NAME = ilCrsMemberGalleryRoleColorPlugin::class;
	const COLOR_ADMIN_BACKGROUND = "#A5D7D2";
	const COLOR_ADMIN_FONT = "#000000";
	const COLOR_TUTOR_BACKGROUND = "#D2EBE9";
	const COLOR_TUTOR_FONT = "#000000";
	const COLOR_MEMBER_BACKGROUND = "#FFFFFF";
	const COLOR_MEMBER_FONT = "#000000";


	/**
	 *
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
	public function getHTML($a_comp, $a_part, $a_par = []): array {
		if (self::dic()->ctrl()->getCmdClass() === strtolower(ilUsersGalleryGUI::class)
			&& (empty(self::dic()->ctrl()->getCmd()) || self::dic()->ctrl()->getCmd() === "view")) {
			if ($a_par["tpl_id"] === "src/UI/templates/default/Card/tpl.card.html" && $a_part === "template_get") {
				$html = $a_par["html"];

				// Get User
				$matches = [];
				preg_match("/<dt>" . self::translate("username", "", [], false) . "<\/dt>\n\t<dd>(.+)<\/dd>/", $html, $matches);
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
							$role_tpl = self::template("role.html");
							$role_tpl->setVariable("ROLE_TITLE", self::translate("role"));
							$role_tpl->setVariable("ROLE", $role);
							$html = substr($html, 0, ($role_html_pos - 1)) . $role_tpl->get() . substr($html, $role_html_pos);
						}

						// Role color
						$role_color_background = $this->getRoleColorBackground($user_id, $course->getMembersObject());
						$role_color_font = $this->getRoleColorFont($user_id, $course->getMembersObject());
						$role_color_tpl = self::template("role_color.html");
						$role_color_tpl->setVariable("BACKGROUND_COLOR", $role_color_background);
						$role_color_tpl->setVariable("FONT_COLOR", $role_color_font);
						$role_color_tpl_html = $role_color_tpl->get();
						$html = str_replace('<div class="caption">', $role_color_tpl_html, $html);

						// Fix title
						//$title_tpl =self::template("title.html");
						//$title_tpl_html = $title_tpl->get();
						$title_tpl_html = file_get_contents(self::directory() . "/templates/title.html");
						$html = str_replace('<dt>', $title_tpl_html, $html);
					}

					return [ "mode" => self::REPLACE, "html" => $html ];
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
