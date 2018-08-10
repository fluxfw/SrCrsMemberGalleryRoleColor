<?php
require_once __DIR__ . "/../vendor/autoload.php";

/**
 * CrsMemberGalleryRoleColor UIHook-GUI
 */
class ilCrsMemberGalleryRoleColorUIHookGUI extends ilUIHookPluginGUI {

	const COLOR_DARK_GRAY = "#808080";
	const COLOR_LIGHT_GRAY = "#C0C0C0";
	const COLOR_WHITE = "#ffffff";
	/**
	 * @var ilCtrl
	 */
	protected $ctrl;
	/**
	 * @var ilLanguage
	 */
	protected $lng;
	/**
	 * @var ilCrsMemberGalleryRoleColorPlugin
	 */
	protected $pl;
	/**
	 * @var ilRbacReview
	 */
	protected $rbacreview;


	/**
	 *
	 */
	public function __construct() {
		global $DIC;

		$this->ctrl = $DIC->ctrl();
		$this->lng = $DIC->language();
		$this->pl = ilCrsMemberGalleryRoleColorPlugin::getInstance();
		$this->rbacreview = $DIC->rbac()->review();
	}


	/**
	 * @param string $a_comp
	 * @param string $a_part
	 * @param array  $a_par
	 *
	 * @return array
	 */
	public function getHTML($a_comp, $a_part, $a_par = []): array {
		if ($this->ctrl->getCmdClass() === strtolower(ilUsersGalleryGUI::class)
			&& (empty($this->ctrl->getCmd()) || $this->ctrl->getCmd() === "view")) {
			if ($a_par["tpl_id"] === "src/UI/templates/default/Card/tpl.card.html" && $a_part === "template_get") {
				$html = $a_par["html"];

				// Get User
				$matches = [];
				preg_match("/<dt>" . $this->lng->txt("username") . "<\/dt>\n\t<dd>(.+)<\/dd>/", $html, $matches);
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
							$role_tpl = $this->pl->getTemplate("role.html");
							$role_tpl->setVariable("ROLE_TITLE", $this->pl->txt("role"));
							$role_tpl->setVariable("ROLE", $role);
							$html = substr($html, 0, ($role_html_pos - 1)) . $role_tpl->get() . substr($html, $role_html_pos);
						}

						// Role color
						$role_color = $this->getRoleColor($user_id, $course->getMembersObject());
						$role_color_tpl = $this->pl->getTemplate("role_color.html");
						$role_color_tpl->setVariable("COLOR", $role_color);
						$role_color_tpl_html = $role_color_tpl->get();
						$html = str_replace('<div class="caption">', $role_color_tpl_html, $html);

						// Fix title
						//$title_tpl = $this->pl->getTemplate("title.html");
						//$title_tpl_html = $title_tpl->get();
						$title_tpl_html = file_get_contents($this->pl->getDirectory() . "/templates/title.html");
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
	protected function getRoleColor(int $user_id, ilCourseParticipants $members): string {
		switch (true) {
			case $members->isAdmin($user_id):
				$color = self::COLOR_DARK_GRAY;
				break;

			case $members->isTutor($user_id):
				$color = self::COLOR_LIGHT_GRAY;
				break;

			case $members->isMember($user_id):
			default:
				$color = self::COLOR_WHITE;
				break;
		}

		return $color;
	}
}
