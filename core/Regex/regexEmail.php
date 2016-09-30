<?php
namespace Regex;
/**
 * Permet de tester la validité du mail avant l'envoie
 * @author Fernette Developpement
 */
class regex {
    public function email($mail) {
		return preg_match("/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,5}$/", $mail);
    }
}